<?php
session_start();
//connect to the database attendance with table admin_login 
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "attendance";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Login Page </title>
</head>

<body>
<div class="alert">
        <?php
        if (isset($_SESSION['status'])) {
            echo "<h2 style=color:antiquewhite; font-family:sans-serif;'>" . $_SESSION['status'] . "</h2>";
            unset($_SESSION['status']);
        }
        ?>
          </div>

    <?php
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($name) or empty($password) or empty($subject)) {
            array_push($errors, "All fields are required");
        }

        $sql = "SELECT email FROM admin_login WHERE email = '$email' LIMIT 1";
        $errors = array();


        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["user"] = "yes";
                header("Location:admin_dashboard.php");
                die();
            } else {
                echo "<div class='alert alert-danger' style='color:white;''>Password does not match</div>";
            }
        } else {
            echo "<div class='alert alert-danger' style='color:white;'>Email does not match</div>";
        }
    }
    ?>

    <?php

    ?>

   
  
    <div class="container" id="container">
        <div class="form-container sign-up">

            <form action="sign_up.php" method="post">
                <h1 style="color: antiquewhite; margin-bottom:20px;">Create Account</h1>
                <input type=" text" placeholder="Name" name="name">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <input type="submit" name="signup" value="SIGN UP">

            </form>
        </div>


        <div class="form-container sign-in">
            <form action="login.php" method="post">
                <h1 style="color: antiquewhite;"> Admin login</h1>
                <hr width="80%" style="color: antiquewhite;  margin-bottom:10px;">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">
                <a href="#">Forget Your Password?</a>
                <input type="submit" value="login" name="login" class="btn btn-primary">
            </form>
        </div>


        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Register here </h1>
                    <button><a href="login.php" style="color:black;">login</a></button>
                    <button><a href="/Attendance Management System/teacher-CRUD/login.php" style="color:black;">If Teacher</a></button>


                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Don't have account?</h1>
                    <button class="hidden" id="register">Sign Up</button>

                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>