<?php 
@session_start();
if(!isset($_SESSION['name'])){
    header("location:login.php");
}

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


    $query = "delete from `tbl_sl-attendance` where `id` = '$id'";

    $result = mysqli_query($conn, $query);
    if(!$result){
        die("QUERY failed");
    }
    else{
        header('location:attendance_sl.php?del_msg=your selection has been deleted');
    }
}
?>