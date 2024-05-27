<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
?>

<?php include('header.php'); ?>

<?php
//connect to the database attendance with table tbl_students 
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "attendance";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}
?>

<?php include('footer.php'); ?>
<div class="division1">
    <h1>Notiifications and Updates</h1>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right; margin-bottom:20px">Make Update</button>
    <a href="admin_dashboard.php"><button class="btn btn-primary" style="float:left;" >Back</button></a>
    <form action="search.php">
    <input type="text" name="search-text" id="search-text" placeholder="Search Notifications" style="background:transparent; width:20%; transform:translateY(24px); height:40px; border:2px solid antiquewhite; border-radius:10px;" >
    <input type="submit" name="search" id="search" class="btn btn-info" style=" transform:translateY(20px); height:40px; width:100px; border:2px solid antiquewhite; border-radius:10px; ">  
  </form>
</div>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Notiifications</th>
            <th scope="col">Description</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Action</th>
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
                 <td><a href="delete_notifications.php?id=<?php echo $row['id'];?> "class="btn btn-danger" style="margin-left: 20px";><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php
        }
        ?>
</thead>
</table>


<form method="post" action="admin_notification.php"> 
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
                         <h1>Add Subject</h1>
          </div>

          <div class="modal-body">
               <div id="forms">
                                  <div class="form-group">
                                      <label for="name" style="float: left; font-size:20px; margin-bottom:10px; color:rgba(23,58,92,255)">Update</label>
                                      <input type="text" class="form-control"  name="update" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255);">
                                    </div>    
                                    <div class="form-group">
                                      <label for="teacher" style="float: left; font-size:20px; margin-bottom:10px; color:rgba(23,58,92,255)">Description</label>
                                      <input type="text"  class="form-control"  name="description" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255);">
                                    </div>   
                                    <div class="form-group">
                                      <label for="date" style="float: left; font-size:20px; margin-bottom:10px; color:rgba(23,58,92,255)">From</label>
                                      <input type="date" class="form-control" min="2024-05-10" max="2025-01-01" name="fromdate" placeholder="From" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255);" >
                                    </div>
                                     <div class="form-group">
                                     <label for="date" style="float: left; font-size:20px; margin-bottom:10px; color:rgba(23,58,92,255)">To</label>
                                       <input type="date" class="form-control" placeholder="To"   min="2024-05-10" max="2025-01-01" name="todate" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255);">
                                    </div>                  
                </div>
                        <div class="modal-footer">
                       
                          <input type="submit" name="add_update" value="add" class="btn btn-primary" style="float:right; color:rgba(23,58,92,255); border: 2px solid rgba(23,58,92,255)">
                        </div>
          </div>

       </div>
    </div>
  </div>
</form>

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

     
      die();
             
}

?>