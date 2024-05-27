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
    $subject= $_POST['subject'];
    $address = $_POST['address'];
    $number = $_POST['number'];

    $errors = array();

if(empty($name) OR empty($email) OR empty($password) OR empty($subject) OR empty($address)OR empty($number)   ){
    array_push($errors,"please enter all fields");
}

else{

        $query = "INSERT INTO `tbl_teachers1`(`name`,`email`,`password`,`subject_name`,`address`,`number` ) VALUES('$name' ,'$email','$password','$subject','$address', '$number')";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query failed");
                    }


            else{
                header('location:admin_teacher.php?insert_msg=your data has been added sucessfully');
                }
     }   

}

    

?>