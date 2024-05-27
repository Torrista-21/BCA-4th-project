<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("location:login.php");
}
?>

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

include('header.php');

?>
<div class="division1">
  <h1> Subject information</h1>
  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right; margin-bottom:20px;">Add Subjects</button>
  <a href="admin_dashboard.php"><button class="btn btn-primary" style="float:left;">Back</button></a>
  <form action="search_subject.php" method="post">
    <input type="text" name="search" id="search-text" placeholder="Search Subjects" style="background:transparent; width:20%; transform:translateY(24px); height:40px; border:2px solid antiquewhite; border-radius:10px;" >
    <input type="submit" name="submit" id="search" class="btn btn-info" style=" transform:translateY(20px); height:40px; width:100px; border:2px solid antiquewhite; border-radius:10px; ">  
  </form>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Teacher</th>
      <th scope="col">Code</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php

  $query = "SELECT * FROM  `tbl_subjects`";
  $serialnumber = 0;
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("query failed");
  } else {
    while ($row = mysqli_fetch_assoc($result)) {
      $serialnumber++;
  ?>
      <tr>
        <td><?php echo $serialnumber ?> </td>
        <td><?php echo $row['name']; ?> </td>
        <td><?php echo $row['teacher']; ?> </td>
        <td><?php echo $row['code']; ?> </td>
        <td><a href="edit_subject.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa-solid fa-plus"></i></a>
          <a href="delete_subject.php?id=<?php echo $row['id']; ?> " class="btn btn-danger" style="margin-left: 20px" ;><i class="fa-solid fa-trash"></i></a>
        </td>
      </tr>

  <?php

    }
  }

  ?>
</table>

<form method="post" action="insert_subjects_data.php">


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h1>Add Subject</h1>
        </div>

        <div class="modal-body">
          <div id="forms">
            <div class="form-group">
              <label for="name" style="float: left; font-size:20px; margin-bottom:10px; color:rgba(23,58,92,255) ">Subject Name</label>
              <input type="text" class="form-control" name="name" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255); ">
            </div>
            <div class="form-group">
              <label for="teacher" style="float: left; font-size:20px; margin-bottom:10px; color:rgba(23,58,92,255) ">Subject Teacher</label>
              <input type="text" class="form-control" name="teacher" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255); ">
            </div>
            <div class="form-group">
              <label for="code" style="float: left; font-size:20px; margin-bottom:10px; color:rgba(23,58,92,255)">Subject Code</label>
              <input type="text" class="form-control" name="code" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255); ">
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" name="add_subject" value="add" class="btn btn-primary" style="float:right; color:rgba(23,58,92,255); border: 2px solid rgba(23,58,92,255)">
          </div>
        </div>

      </div>
    </div>
  </div>
</form>


<?php include('footer.php'); ?>