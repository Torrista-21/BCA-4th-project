
<?php include('header.php'); 

 include('db_connection.php'); 
 @session_start();
if(!isset($_SESSION["name"])){
    header("location:login.php");
}

?>

<?php include('footer.php'); ?>
<div class="division1">
    <h1>Notifications and Updates</h1>
    <a href="teacher's_dashboard.php"><button class="btn btn-primary" style=" float:right; margin-bottom:20px;" >Back</button></a>
<table class="table" style="margin-top:100px;">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Notiifications</th>
            <th scope="col">Description</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
        </tr>
        <?php

$query = "SELECT * FROM `tbl_notifications`";
$serialnumber = 0;
$result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)){
            $serialnumber++;
            ?>
             <tr>
                 <td><?php echo $serialnumber ?> </td>
                 <td><?php echo $row['updates'];?> </td>
                 <td><?php echo $row['description'];?> </td>
                 <td><?php echo $row['from_date'];?> </td>
                 <td><?php echo $row['to_date'];?> </td>
                </tr>
                <?php
        }
        ?>
</thead>
</table>



<?php
if(isset($_POST['add_update'])){
    $update = $_POST['update'];
    $description = $_POST['description'];
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    
    $query = "INSERT INTO `tbl_notifications` (`updates`, `description`, `from_date`,`to_date`) 
                VALUES ('$update', '$description', '$fromdate','$todate')";

    $result = mysqli_query($conn, $query);
    if(!$result){
        die("error");
    } 
    else{
      header("location:admin_notification.php");
    }           
}

?>