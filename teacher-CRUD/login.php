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

    <?php
    if (isset($_POST['submit'])) {
        $flag = 0;
        $name = $_POST['name'];
        $password = $_POST['password'];
        $subject = $_POST['subject'];

        $errors = array();


        if (empty($name) or empty($password) or empty($subject)) {
            array_push($errors, "All fields are required");
        }

        $sql = "SELECT *  FROM tbl_teachers1 WHERE  name = '$name' AND password= '$password' AND subject_name='$subject'";
        $result = mysqli_query($conn, $sql);

        $user = mysqli_fetch_assoc($result);
        if ($user) {
            $_SESSION["name"] = $user['name'];

            header("Location:teacher's_dashboard.php");
            die();
        } else {
            $flag = 1;
        }
    }
    ?>


    <div class="container" id="container">
        <?php if ($flag == 1) { ?>
            <div class="alert alert-danger">Given information doesnot match
            </div>
        <?php } ?>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Teacher Login</h1>
                    <button><a href="/Attendance Management System/Admin-CRUD/login.php" style="color:black;">If Admin</a></button>

                </div>
            </div>
        </div>
        <div class="form-container sign-in">
            <form action="login.php" method="post">
                <h1 style="color: antiquewhite;">Sign In</h1>
                <hr width="80%" style="color: antiquewhite;  margin-bottom:10px;">
                <input type="text" placeholder="Username" name="name">
                <input type="password" placeholder="password" name="password">
                <input type="text" placeholder="Subject-name" name="subject">
                <a href="#">Forget Your Password?</a>
                <input type="submit" name="submit" id="submit">
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>