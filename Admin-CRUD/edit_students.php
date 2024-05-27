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

<?php include('header.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query = "SELECT * FROM  `tbl_students` WHERE `id` = '$id'";
    
    $result = mysqli_query($conn, $query); 
    
    if(!$result){
        die("query failed");
    }
    
    else{
        $row = mysqli_fetch_assoc($result); 
        
    }
}
 ?>

    <?php 
    if(isset($_POST['edit_students'])){
        if(isset($_GET['new_id'])){
            $new_id = $_GET['new_id'];
        }
    
        $Ename = $_POST['name']; 
        $Ephone = $_POST['phone']; 
        $Ebirth = $_POST['birth']; 
        $Eroll_no= $_POST['roll_no']; 
        $Eaddress = $_POST['address']; 
        $Eemail = $_POST['email']; 


        $query = "update `tbl_students` set `fullname`  =  '$Ename',`ph_number` = '$Ephone' , `Birthdate` = '$Ebirth',
        `Roll_no` = '$Eroll_no', `Address` = '$Eaddress',`email`= '$Eemail'
        WHERE `id` = '$new_id'";
        
        $result = mysqli_query($conn, $query);
    
        if(!$result){
            die("query failed" );
        }
        else{
            header('location:admin_student.php?e_msg=updated successfully');
        }
    
      }

    ?>
    
<form action="edit_students.php?new_id=<?php echo $id; ?>" method="post">
                                    <div class="form-group">
                                      <label for="Name" style="float: left; font-size:30px; margin-bottom:10px;">Name</label>
                                      <input type="text" class="form-control" name="name" value="<?php echo $row['fullname'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="phone" style="float: left; font-size:30px; margin-bottom:10px;">Phone_number</label>
                                      <input type="tel"  class="form-control" name="phone" value="<?php echo $row['ph_number'] ?>" style="background-color: transparent; color:antiquewhite;
                                     margin-bottom:12px;">
                                   </div>
                                    
                                   <div class="form-group">
                                     <label for="birth" style="float: left; font-size:30px; margin-bottom:10px;">Birthdate</label>
                                     <input type="date" class="form-control"  name="birth" value="<?php echo $row['Birthdate'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>
                                    <div class="form-group">
                                      <label for="roll_no" style="float: left; font-size:30px; margin-bottom:10px;">Roll_no</label>
                                      <input type="text" class="form-control" name="roll_no" value="<?php echo $row['Roll_no'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="address"style="float: left; font-size:30px; margin-bottom:10px;">address</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo $row['Address'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                     </div>
                                    <div class="form-group">
                                      <label for="email" style="float: left; font-size:30px; margin-bottom:10px;">Email</label>
                                      <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>
                                      
                                      <input type="submit" name="edit_students" value="edit" class="btn btn-primary"style="width:40%; margin-top:50px; ">
                                   
</form>


<?php include('footer.php'); 
