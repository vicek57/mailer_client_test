<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <!-- Custom styles -->
    <link rel="stylesheet" href="src/assets/css/style.css">
    <script src="src/assets/js/init.js"></script>

    <title>Mailer Sender</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center">Mailer Demo</h1>
            <p id="file_info" class="text-center">Fill up the form and send an email</p>
            <form id="mailForm" name="mailForm" method="post" enctype="multipart/form-data" action="getForm.php">
                <div class="input-group">
                    <span class="input-group-addon" id="sender">From</span>
                    <input id="mailFrom" name="mailFrom" type="text" class="form-control" aria-describedby="sender">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="to">To</span>
                    <input id="mailTo" name="mailTo" type="text" class="form-control" aria-describedby="to">
                </div>
                <div id="chips" class="input-group">

                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="subject">Subject</span>
                    <input id="mailSubject" name="mailSubject" type="text" class="form-control" aria-describedby="subject">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="message">Message</span>
                    <input id="mailMessage" name="mailMessage" type="text" class="form-control" aria-describedby="message">
                </div>
                <br>
                <input id="btnSubmit" class="btn btn-lg btn-success btn-block" type="submit" value="Send">
            </form>
        </div>
    </div>
    <div id="emailToast" class="mdl-js-snackbar mdl-snackbar">
        <div class="mdl-snackbar__text"></div>
        <button class="mdl-snackbar__action" type="button"></button>
    </div>
</div>
</body>
</html>