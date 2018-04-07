<?php
/**
 * Created by PhpStorm.
 * User: vincent
 * Date: 01/04/2018
 * Time: 11:52
 */
require __DIR__ . '/vendor/autoload.php';

use \Project\Mailer\Client\ApiClient;
use \Project\Mailer\Common\Entity\Mail as Mail;
use \Project\Mailer\Common\Transformer\MailTransformer as Transformer;

$data['from'] = $_POST['mailFrom'];
$data['to'] = explode(";", $_POST['mailTo']);

if (isset($_POST['mailSubject'])) {
    $data['subject']  = $_POST['mailSubject'];
} else {
    $data['subject'] = "";
}

if (isset($_POST['mailMessage'])) {
    $data['message'] = $_POST['mailMessage'];
} else {
    $data['message'] = "";
}

$mail = new Mail($data);

$client = ApiClient::getInstance();

$client->sendMail($mail);

header('Location: index.php');

