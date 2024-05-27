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

if(isset($_POST['add_subject'])){
    $name = $_POST['name'];
    $teacher = $_POST['teacher'];
    $code = $_POST['code'];

    if(empty($name) OR empty($teacher)  OR empty($code) ){
        array_push($errors,"please enter all fields");
    }
    
    else{
            $query = "INSERT INTO `tbl_subjects`(`name` ,`teacher` ,`code` ) VALUES('$name' ,'$teacher','$code')";

            $result = mysqli_query($conn, $query);

                    if(!$result){
                        die("Query failed");
                                }
                    else{
                    header('location:admin_subjects.php?insert_msg=your data has been added sucessfully');

                        }
        }
}


?>