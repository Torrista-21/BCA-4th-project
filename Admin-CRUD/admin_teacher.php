
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
  <h1> informnation</h1>
  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">add teachers</button>
</div>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">Password</th>
                  <th scope="col">Address</th>c
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
                          <td><?php echo $row['id'];?> </td>
                          <td><?php echo $row['name'];?> </td>
                          <td><?php echo $row['email'];?> </td>
                          <td><?php echo $row['password'];?> </td>
                          <td><?php echo $row['address'];?> </td>
                          <td><a href="edit_page.php?id=<?php echo $row['id'];?>" class="btn btn-success"><i class="fa-solid fa-plus"></i></a>
                          <a href="delete_page.php?id=<?php echo $row['id'];?> "class="btn btn-danger" style="margin-left: 20px";><i class="fa-solid fa-trash"></i></a></td>
                    </tr>

               <?php

                    }
                  } 

                ?>
              </tbody>
            </table>
                  

<form method="post" action="insert_data_db.php">


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add teacher</h5>
                  
                          <span aria-hidden="true">&times;</span>
                        </button>
          </div>

          <div class="modal-body">
               <div id="forms">

                   <h1>Add Teacher</h1>

                                  <div class="form-group">
                                      <label for="NAME">name</label>
                                      <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" class="form-control" name="email">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="password" class="form-control" name="password"> 
                                    </div>
                                      
                                     <div class="form-group">
                                         <label for="address">address</label>
                                         <input type="text" class="form-control" name="address">
                                      </div>
                              
                </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="submit" name="add_teachers" value="add" class="btn btn-primary">
                        </div>
          </div>

       </div>
    </div>
  </div>
</form>


<?php include('footer.php'); ?>