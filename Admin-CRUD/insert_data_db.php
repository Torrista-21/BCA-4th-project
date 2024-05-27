
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
if(isset($_POST['add_teachers'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password= $_POST['password'];
    $address = $_POST['address'];

    $errors = array();

if(empty($name) OR empty($address)  OR empty($email) OR empty($password) ){
    array_push($errors,"please enter all fields");
}

else{

        $query = " INSERT INTO `tbl_teachers1`(`name`, `email`,`password`,`address` ) VALUES('$name' , '$email', '$password','$address')";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query failed");
                    }


            else{
                header('location:admin_teacher.php?insert_msg=your data has been added sucessfully');
                }
     }


     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "email not valid ");
     }
        if (strlen($password)<8) {
            array_push($errors, "pasword must be 8 characeters long ");
           }

           $sql = "SELECT * FROM tbl_teachers1 WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors, "email alreay exists ");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO tbl_teachers1 (name, email, password, address ) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$name, $email, $password, $address);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
     

}

    

?>