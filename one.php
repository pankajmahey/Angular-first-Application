<?php

    require_once 'PHPMailer/PHPMailer.php';
    require_once 'PHPMailer/SMTP.php';
    require_once 'PHPMailer/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;


$mail = new PHPMailer;

$mail->isSMTP();        

$mail->Host = "smtp.gmail.com";

$mail->SMTPAuth = true;                      

$mail->Username = "";   // Enter Your Email Address Here       

$mail->Password = "";       // Enter Your App Password Here           

$mail->SMTPSecure = "ssl";                       

$mail->Port = 465;                    

$mail->SetFrom = "";     // Enter Your Email Address Here 

// $mail->addAddress('receiver1@gmail.com');   // Set the E-mail where you want to send E-mail
// $mail->addAddress('receiver2@gfg.com');  // Set the E-mail where you want to send E-mail for second receiver

$mail->isHTML(true); // this is used to send html tags in message 

if(isset($_POST['sendmail'])){

    $target = './images/'.basename($_FILES['myfile']['name']); // first save that image

    $file = $_FILES['myfile']['name'];
    
    if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target)){
         'file uploaded';
    }
    else{
        echo 'not uploaded';
    }

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['body'];
    $mail->addAttachment('./images/'.$_FILES['myfile']['name'], $_FILES['myfile']['name']); // this is used to send file | image to email

    $mail->addAddress("reciever1@gmail.com");
    $mail->send();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .one{
            width: 300px;
            margin: 100px 35%;
            border: 2px solid black;
            text-align: center;
        }
        .one input{
            width: 90%;
            margin: 10px 5%;
        }
    </style>
</head>
<body>
    <div class="one">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Send Mail Using PHPMailer</h3>
            <input type="text" name="subject" placeholder="subject">
            <input type="text" name="body" placeholder="body">
            <input type="file" name="myfile">
            <input type="submit" name="sendmail" value="Submit">
        </form>
    </div>
</body>
</html>
