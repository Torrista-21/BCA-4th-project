<?php 
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


    $query = "delete from `tbl_notifications` where `id` = '$id'";

    $result = mysqli_query($conn, $query);
    if(!$result){
        die("QUERY failed");
    }
    else{
        header('location:admin_notification.php?del_msg=your selection has been deleted');
    }
}
?>