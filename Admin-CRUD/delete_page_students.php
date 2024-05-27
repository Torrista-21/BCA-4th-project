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
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    }

        $query = "delete from `tbl_students` where `id` = '$id'";
        $result = mysqli_query($conn,$query);
            if(!$result){
                die("query failed");
            }
            else{
                header('loaction:admin_student.php');
            }


?>
