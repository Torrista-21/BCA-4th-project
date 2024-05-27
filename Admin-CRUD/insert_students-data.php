
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
//after connection passing the value in database with post

if(isset($_POST['add_students'])){
    $fullname = $_POST['fullname'];
    $ph_number= $_POST['ph_number'];
    $Birthdate= $_POST['Birthdate'];
    $Roll_no = $_POST['Roll_no'];
    $Address = $_POST['Address'];
    $email= $_POST['email'];


            $query = "INSERT INTO `tbl_students`(`fullname`, `ph_number`,`Birthdate`,`Roll_no`,`Address`,`email` ) 
            VALUES( '$fullname' , '$ph_number', '$Birthdate','$Roll_no', '$Address', '$email' )";

            $result = mysqli_query($conn, $query);

            if(!$result){
                die("Query failed");
                        }


            else{
                header('location:admin_student.php?insert_msg=your data has been added sucessfully');
                }
     }


    

    

?>