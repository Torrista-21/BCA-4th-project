<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("location:login.php");
}
?>

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

include('header.php');

?>

<div class="division1">
  <h1> Student information</h1>
  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right; margin-bottom:20px ">Add Student</button>
  <a href="admin_dashboard.php"><button class="btn btn-primary" style="float:left;">Back</button></a>

  <form action="search_student.php" method="post">
    <input type="text" name="search" id="search" placeholder="Search Students" style="background:transparent; width:20%; transform:translateY(25px); height:40px; border:2px solid antiquewhite; border-radius:10px;">
    <input type="submit" name="submit" id="search" class="btn btn-info"style=" transform:translateY(20px); height:40px; width:100px; border:2px solid antiquewhite; border-radius:10px;">  
 
  </form>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr style="text-align: center;">
      <th scope="col" >#</th>
      <th scope="col" >FullName"</th>
      <th scope="col" >Ph_number"</th>
      <th scope="col" >D.O.B"</th>
      <th scope="col">Roll_no</th>
      <th scope="col" >Address</th>
      <th scope="col" >Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $query = "SELECT * FROM  `tbl_students`";
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
          <td><?php echo $row['fullname']; ?> </td>
          <td><?php echo $row['ph_number']; ?> </td>
          <td><?php echo $row['Birthdate']; ?> </td>
          <td><?php echo $row['Roll_no']; ?> </td>
          <td><?php echo $row['Address']; ?> </td>
          <td><?php echo $row['email']; ?> </td>
          <td><a href="edit_students.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa-solid fa-plus"></i></a>
            <a href="delete_page_students.php?id=<?php echo $row['id']; ?> " class="btn btn-danger" style="margin-left: 20px" ;><i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>

    <?php

      }
    }

    ?>
  </tbody>
</table>

<form action="insert_students-data.php" method="post">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div id="forms">

            <h1>Add Student</h1>

            <div class="form-group">
              <label for="NAME" style="float: left; font-size:20px; margin-bottom:10px; color:  rgba(23,58,92,255)">Name</label>
              <input type="text" class="form-control" name="fullname" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255); ">
            </div>


            <div class="form-group">
              <label for="ph_num" style="float: left; font-size:20px; margin-bottom:10px; color:  rgba(23,58,92,255)">Phone </label>
              <input type="tel" max="10" class="form-control" name="ph_number" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255); ">
            </div>


            <div class="form-group">
              <label for="dob" style="float: left; font-size:20px; margin-bottom:10px; color:  rgba(23,58,92,255)">D.O.B</label>
              <input type="date" class="form-control" name="Birthdate" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255); ">
            </div>

            <div class="form-group">
              <label for="Roll_no" style="float: left; font-size:20px; margin-bottom:10px; color:  rgba(23,58,92,255)">Roll-no</label>
              <input type="number" class="form-control" name="Roll_no" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255); ">
            </div>

            <div class="form-group">
              <label for="address" style="float: left; font-size:20px; margin-bottom:10px; color:  rgba(23,58,92,255)">address</label>
              <input type="text" class="form-control" name="Address" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255); ">
            </div>
            <div class="form-group">
              <label for="email" style="float: left; font-size:20px; margin-bottom:10px; color:  rgba(23,58,92,255)">Email</label>
              <input type="email" class="form-control" name="email" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255); ">
            </div>


          </div>
          <div class="modal-footer">
            <input type="submit" name="add_students" value="ADD" class="btn btn-primary" style="float:right; color:rgba(23,58,92,255); border: 2px solid rgba(23,58,92,255)">
          </div>>
        </div>
      </div>

    </div>
  </div>
  </div>
</form>




<?php include('footer.php'); ?>