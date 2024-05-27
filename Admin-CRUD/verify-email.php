<?php 
session_start();


$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "attendance";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

if(isset($_GET['token'])){

    $token = $_GET['token'];
    $query = "SELECT  verification_code,verification_status FROM admin_login where verification_code = '$token' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);
        // echo $row['verification_code'];
        if($row['verification_status'] == 0){
            $clicked_token= $row['verification_code'];
            $query = "UPDATE admin_login SET verification_status='1' WHERE  verification_code='$clicked_token' LIMIT 1";
            $result = mysqli_query($conn, $query);
            if($result){
                $_SESSION['status'] = 'Your account has been verified';
                header('location:login.php');
                exit(0);    
            }
            else{
                $_SESSION['status'] = 'Email verification failed';
                header('location:login.php');
                exit(0);    
            }
        }
        else
        {
            $_SESSION['status'] = 'Email already verified !!!!!!';
            header('location:login.php');
            exit(0);    
        }
    }
    
    else{
        
    $_SESSION['status'] = 'This token does not exixts';
    header('location:login.php');
    }



}
else{

    $_SESSION['status'] = 'NOT Allowed';
    header('location:login.php');

}

?>