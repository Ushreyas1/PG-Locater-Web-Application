<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require '../db/db.php';
$con = new DB();
session_start();
$pass = '';
$condition = true;
$mail = new PHPMailer(true);
$_SESSION['run'] = false;
if(isset($_POST['command'])){
    $command = $_POST['command'];
}
if(!empty($command))
{
    try {                    
        $mail->isSMTP();                                          
        $mail->Host       = "smtp.gmail.com";                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'locaterpgrooms@gmail.com';                    
        $mail->Password   = 'pgrooms2021';                              
        $mail->SMTPSecure = 'tls';           
        $mail->Port       = 587;                                   
        $mail->setFrom('locaterpgrooms@gmail.com', 'pg locater');
        $command = $_POST['command'];       
            if($command == 'recover')
            {
                $reciever = $_POST['mail'];
                $query = "SELECT email_id from owner where email_id='$reciever'";
                $owner = $con->executeSelectrows($query);
                $query = "SELECT password from owner where email_id='$reciever'";
                $pass = $con->executeSelect($query);  
                $query = "SELECT email_id from user where email_id='$reciever'";
                $user = $con->executeSelectrows($query);
                if($user > 0){
                    $query = "SELECT password from user where email_id='$reciever'";
                    $pass = $con->executeSelect($query);
                }
                if(($user > 0)||($owner > 0))
                {
                    
                    $mail->addAddress($reciever);
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Password Recovery';
                    $pass = $pass[0]['password'];
                    $body = "Your password is: $pass";
                    $mail->Body    = $body;
                    $mail->AltBody = $body;
                    $mail->send();
                    $condition = false;
                    $_SESSION["run"] = true;
                    $_SESSION["value"] = "We have sent password to your email account. If you don't see it within a few minutes, make sure that the email isn't in your spam/junk bin.";
   
                            header("Location: message.php");                       
                }
                if($condition)
                {
                    $_SESSION["value"] = "You gave an invalid email. Make sure you have entered the proper mail address";
                    header("Location: message.php");
                }
            }
        }
     catch (Exception $e) {
        $_SESSION["value"] = "No Internet";
        header("Location: message.php");
       
    }
    //"We have sent password to your email account. If you don't see it within a few minutes, make sure that the email isn't in your spam/junk bin.";
                   
}
?>

