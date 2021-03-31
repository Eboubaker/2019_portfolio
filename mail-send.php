<?php

require "src/lib/phpmailer/autoload.php";

if(strlen(serialize($_POST))>800){
    echo "Sorry!, Message Was Too Long!";
    exit(0);
}
$name = $email = $message = NULL;
if(isset($_POST["name"])&&!empty($_POST["name"]))
    $name = $_POST["name"];
if(isset($_POST["email"])&&!empty($_POST["email"]))
    $email = $_POST["email"];
if(isset($_POST["message_body"])&&!empty($_POST["message_body"]))
    $message = $_POST["message_body"];
$message = str_replace('\n','<br>',$message);
$message = strip_tags($message,'<a><br><br/><strong><em><code><pre><img><h1><h2><h3><h4><h5><h6><p>');
$message = "<p>Contact Name:<strong>$name</strong> | Contact E-mail: <strong>$email</strong></p><h3>Message Content:</h3><p>$message<p>";
if($email!=NULL){
    // printf("sending mail \r\n");
    $mail = new \PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();

    //configurate smtp
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "mi.library.djelfa.university@gmail.com";
    $mail->Password = 'Vn"^Ks-QN6kNh`ks';
    // $mail->SMTPDebug = 3;
    $mail->SetFrom('mi.library.djelfa.university@gmail.com');
    $mail->FromName = "My Portfolio Contact";

    //setup messag e data
    $mail->Subject = $name." Sent a Message";
    $mail->Body = $message;
    // if($ishtml)
         $mail->isHTML(true);
    
    // if($attachment_url!=NULL)
    //     $mail->addAttachment($attachment_url);
    //     //$mail->addAttachment($attachment_url,$att_name);
    
    $mail->addAddress("gpscrambor.4862500@gmail.com");

    if ($mail->send()) {
        //print_r("sent");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>
    <script src="src/lib/jquery-3.2.1.slim.min.js"></script>
    <link rel="stylesheet" href="src/lib/font-awesome.min.css">
    <link rel="stylesheet" href="src/lib/bootstrap.min.css">
    <script src="src/lib/popper.min.js"></script>
    <script src="src/lib/bootstrap.min.js" ></script>
    <script src="src/lib/iconify.min.js"></script>
    <title>Email Sent</title>
    <link rel="stylesheet" href="index.css">
</head>
<body class="bg-light">
    <div id="header">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <h3>Portfolio</h3>
                </a>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Return to Portfolio</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container card bg-light d-flex justify-content-center" style="margin-top:100px;min-width:300px;max-width:400px">
        <span style="color:#5937b9" class="mx-auto iconify justify-self-center" data-icon="mdi:email-check" data-inline="false" data-height="70px" data-width="70px"></span>
        <h3>Your Message was Sent to my inbox I will read it within hours Then i will send you my reply.</h3>
        <h4><a href="/"><span class="iconify" data-icon="bx:bx-left-arrow-alt" data-inline="false"></span>Return to Portfoli</a></h4>
        
    </div>
</body>
</html>
