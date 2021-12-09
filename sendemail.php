<?php
    use PHPMailer\PHPMailer\PHPMailer;

    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    $mail = new PHPMailer;

    $email = "charlesventures2025@gmail.com";
    $name = "Critical Stock Meet";

    //SMTP Settings
    $mail->SMTPDebug = 0; 

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "ajnarag25@gmail.com";
    $mail->Password = "";
    $mail->Port = 587; //465 for ssl and 587 for tls
    $mail->SMTPSecure = "tls";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress(address:'charlesventures2025@gmail.com');
    $mail->Subject = "Alert";
    $mail->Body = 'We would like to inform you that '.$_SESSION['name']." "."the total quantity is"." ".$_SESSION['quants']."."." ".
    "We also update the current stock for the product the total is now"." ".$_SESSION['result']." ".
    "kindly check your inventory now."." "."We added a total of"." ".$_SESSION['compute'].".";

    if ($mail->send())
        echo "Mail Sent";

    else
        echo('Error sending the email');


?>

