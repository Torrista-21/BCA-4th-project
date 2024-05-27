

<?php
 include('db_connection.php'); 
 include('header.php');
 @session_start();
if(!isset($_SESSION['name'])){
    header("location:login.php");
}

?>
<div class="division1">
  <h1> Teacher Profile</h1>


  <?php
  $data = $_SESSION['name'];
  $query = "SELECT * FROM  `tbl_teachers1` where name='$data'";

  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("query failed ");
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
  ?>

</div>

<form method="post" action="teacher_profile.php">

  <div class="form-group">
    <label for="Name" style="float: left; font-size:30px; margin-bottom:10px;">Name</label>
    <input type="text" class="form-control" value="<?php echo $row['name'] ?>" style="background-color: transparent; color:antiquewhite; margin-bottom:12px;">
  </div>
  <div class="form-group">
    <label for="phone" style="float: left; font-size:30px; margin-bottom:10px;">Phone_number</label>
    <input type="tel" class="form-control" value="<?php echo $row['number'] ?>" style="background-color: transparent; color:antiquewhite ; margin-bottom:12px;">
  </div>
  <div class="form-group">
    <label for="birth" style="float: left; font-size:30px; margin-bottom:10px;">Subject NAme</label>
    <input type="text" class="form-control" value="<?php echo $row['subject_name'] ?>" style="background-color: transparent; color:antiquewhite ; margin-bottom:12px;">

  </div>
  <div class="form-group">
    <label for="birth" style="float: left; font-size:30px; margin-bottom:10px;">Address</label>
    <input type="text" class="form-control" value="<?php echo $row['address'] ?>" style="background-color: transparent; color:antiquewhite; margin-bottom:12px;">

  </div>



</form>
<?php

    }
  }

?>

<?php include('footer.php'); ?>