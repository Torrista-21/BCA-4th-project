<?php
session_start();
if(!isset($_SESSION['user'])){
    header("loacion:signin.php");
}
?>
<?php
//connect to the database attendance with table tbl_teachers 
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "attendance";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>

<?php

if (isset($_POST["signup"])) {
   $username = $_POST["name"];
   $email = $_POST["email"];
   $password = $_POST["password"];

   $passwordHash = password_hash($password, PASSWORD_DEFAULT);

   $errors = array();
   
   if (empty($username) OR empty($email) OR empty($password)) {
    array_push($errors,"All fields are required");
   }
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Email is not valid");
   }
   if (strlen($password)<8) {
    array_push($errors,"Password must be at least 8 charactes long");
   }

   $sql = "SELECT * FROM admin_login WHERE email = '$email'";
   $result = mysqli_query($conn, $sql);
   $rowCount = mysqli_num_rows($result);
   if ($rowCount>0) {
    array_push($errors,"Email already exists!");
   }
   if (count($errors)>0) {
    foreach ($errors as  $error) {
        echo "<div class='alert alert-danger'>$error</div>";
    }
   }else{
    
    $sql = "INSERT INTO admin_login (username, email, password) VALUES ( ?, ?, ? )";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt,"sss",$username, $email, $passwordHash);
        mysqli_stmt_execute($stmt);
        header('location:login.php?msg_alert=your data has been iserted');
    }else{
        die("Something went wrong");
    }
   }
  

}
?>