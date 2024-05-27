<?php
session_start();
if(!isset($_SESSION['user'])){
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
  <h1> Teacher information</h1>
  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right; margin-bottom:30px;">Add Teachers</button>
  <a href="admin_dashboard.php"><button class="btn btn-primary" style="float:left;" >Back</button></a>

  <form action="search.php" method="post">
    <input type="text" name="search" id="search-text" placeholder="Search Teacher" style="background:transparent; width:20%; transform:translateY(24px); height:40px; border:2px solid antiquewhite; border-radius:10px;" >
    <input type="submit" name="submit" id="search" class="btn btn-info" style=" transform:translateY(20px); height:40px; width:100px; border:2px solid antiquewhite; border-radius:10px; ">  
  </form>

</div>
            <table class="table">
              <thead class="thead-dark">
                <tbody>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">Password</th>
                  <th scope="col">Subject Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Phone No.</th>
                  <th scope="col">action</th>
              </tr>
              </thead>
              <tbody>
                <?php 

                  $query = "SELECT * FROM  `tbl_teachers1`";

                  $result = mysqli_query($conn, $query);
                  if(!$result){
                    die("query failed" );
                  }

                  else{
                    while($row = mysqli_fetch_assoc($result)){
                      ?>
                    <tr>
                          <td><?php echo $row['name'];?> </td>
                          <td><?php echo $row['email'];?> </td>
                          <td><?php echo $row['password'];?> </td>
                          <td><?php echo $row['subject_name'];?> </td>
                          <td><?php echo $row['address'];?> </td>
                          <td><?php echo $row['number'];?> </td>
                          <td><a href="edit_page.php?id=<?php echo $row['id'];?>" class="btn btn-success"><i class="fa-solid fa-plus"></i></a>
                          <a href="delete_page.php?id=<?php echo $row['id'];?> "class="btn btn-danger" style="margin-left: 20px";><i class="fa-solid fa-trash"></i></a></td>
                    </tr>

               <?php

                    }
                  } 

                ?>
              </tbody>
            </table>
                  

<form method="post" action="insert_teacher-data_db.php">


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <div class="modal-body">
               <div id="forms">

                   <h1>Add teacher</h1>

                                  <div class="form-group">
                                      <label for="NAME"  style="float: left; font-size:20px; margin-bottom:10px; ">Name</label>
                                      <input type="text" class="form-control" id="name" name="name" style="border-style:none; border-bottom: 1px solid rgba(23,58,92,255); " >
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="email" style="float: left; font-size:20px; margin-top:10px; ">Email</label>
                                      <input type="email" class="form-control" name="email" style=" border-style:none; border-bottom: 1px solid rgba(23,58,92,255);">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="password" style="float: left; font-size:20px; margin-top:10px; ">Password</label>
                                      <input type="password" class="form-control" name="password" style=" border-style:none; border-bottom: 1px solid rgba(23,58,92,255);"> 
                                    </div>
                                      
                                     <div class="form-group">
                                         <label for="subject" style="float: left; font-size:20px; margin-top:10px; ">Subject-Name</label>
                                         <input type="text" class="form-control" name="subject" style=" border-style:none; border-bottom: 1px solid rgba(23,58,92,255);">
                                      </div>
                                      
                                      <div class="form-group">
                                        <label for="address" style="float: left; font-size:20px; margin-top:10px ">address</label>
                                        <input type="text" class="form-control" name="address" style=" border-style:none; border-bottom: 1px solid rgba(23,58,92,255);">
                                      </div>
                                      <div class="form-group" >
                                        <label for="phone" style="float: left; font-size:20px; margin-top:10px; ">Phone-no</label>
                                        <input type="tel"  class="form-control" name="number" style=" border-style:none; border-bottom: 1px solid rgba(23,58,92,255);"> 
                                      </div>
                              
                </div>
                        <div class="modal-footer">
                          <input type="submit" name="add_teachers" value="add" class="btn btn-primary" style="float:right; color:rgba(23,58,92,255); border: 2px solid rgba(23,58,92,255)">
                        </div>
          </div>

       </div>
    </div>
  </div>
</form>


<?php include('footer.php'); ?>