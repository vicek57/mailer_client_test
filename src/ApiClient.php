<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 01/04/2018
 * Time: 11:24
 */
namespace Project\Mailer\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use JakubOnderka\PhpParallelLint\Exception;
use Project\Mailer\Common\Entity\Mail;
use Psr\Http\Message\ResponseInterface;

class ApiClient
{
    protected static $INSTANCE = null;
    protected $client;

    public static function getInstance()
    {
        if (is_null(self::$INSTANCE)) {
            self::$INSTANCE = new ApiClient();
        }
        return self::$INSTANCE;
    }

    protected function __construct()
    {
        $config = include('../config/config.php');
        $host = $config["database"]["host"];
        $port = $config["database"]["port"];
        $this->client = new GuzzleClient(['base_uri' => "$host:$port"]);
    }

    public function sendMail(Mail $mail) {
        $promise = $this->client->requestAsync('POST', 'mail', json_encode($mail));
        $promise->then(
            function (ResponseInterface $res) {
                echo $res->getStatusCode() . "\n";
            },
            function (RequestException $e) {
                echo $e->getResponse()->getBody()->getContents();
            }
        );

        try {
            $promise->wait();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}