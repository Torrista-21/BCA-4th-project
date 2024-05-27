<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "attendance";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}


 function sendemail_verify($username ,$email ,$v_code) {

    $mail = new PHPMailer(true);
    $mail->isSMTP();                                           
    $mail->SMTPAuth   = true;   

    $mail->Host       = "smtp.gmail.com";          
    $mail->Username   = "sandeeptorrista51@gmail.com";                     
    $mail->Password   = "mknd ppoc juou hevi";  
                                
    $mail->SMTPSecure = "tls";            
    $mail->Port = 587;                                   

    $mail->setFrom("sandeeptorrista51@gmail.com",'sandeep karki');
    $mail->addAddress($email);
   
    $mail->isHTML(true);                                  
    $mail->Subject = "Email verification of attendance management system";

        $email_templates = "
        <h2>You have registerd with Attendance Management System</h2>
        <h5>Verify your Email address to login wit hthe below given link</h5>
        <br><br>
        <a href='http://localhost/Attendance%20Management%20System/Admin-CRUD/verify-email.php?token=$v_code'>Click here</a> 
        ";

        $mail->Body = $email_templates;
        $mail->send();
        // echo 'Message has been sent';

}




if (isset($_POST["signup"])) {
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $v_code =  md5(rand());

   
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $errors = array();

    if (empty($username) or empty($email) or empty($password)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 charactes long");
    }

    $sql = "SELECT email FROM admin_login WHERE email = '$email' LIMIT 1";
    $flag = 0;
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $_SESSION['status'] = "Email id already exists!!!!";
        header("location:login.php");
    } else {

        $sql = "INSERT INTO admin_login (username, email, password,`verification_code`) VALUES (' $username','$email',$password ,'$v_code')";
        $query_run = mysqli_query($conn, $sql);
        if ($query_run) {

            sendemail_verify("$username","$email","$v_code");

            $_SESSION['status'] = "Registration Successfull:: Verify  with your email";
            header("location:login.php");
        }
         else {
            $_SESSION['status'] = "Registration Failed";
            header("location:login.php");
        }
    }
}


?>