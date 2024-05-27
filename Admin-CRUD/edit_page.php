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
    
    $query = "SELECT * FROM  `tbl_teachers1` WHERE `id` = '$id'";
    
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
    if(isset($_POST['edit_teachers'])){
        if(isset($_GET['new_id'])){
            $new_id = $_GET['new_id'];
        }
    
        $Ename = $_POST['name']; 
        $Eemail = $_POST['email']; 
        $Epassword = $_POST['password']; 
        $Esubject = $_POST['subject']; 
        $Eaddress = $_POST['address']; 
        $Ephone = $_POST['phone']; 
    
        $query = "update `tbl_teachers1` set `name`  =  '$Ename', `email`= '$Eemail', `password` = '$Epassword',
        `subject_name` = '$Esubject', `address` = '$Eaddress',`number` = '$Ephone'
        WHERE `id` = '$new_id'";
        
        $result = mysqli_query($conn, $query);
    
        if(!$result){
            die("query failed" );
        }
        else{
            header('location:admin_teacher.php?e_msg=updated successfully');
        }
    }

    ?>
<form action="edit_page.php?new_id=<?php echo $id; ?>" method="post">
                                    <div class="form-group">
                                      <label for="NAME" style="float: left; font-size:30px; margin-bottom:10px;">name</label>
                                      <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="email" style="float: left; font-size:30px; margin-bottom:10px;">Email</label>
                                      <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="password" style="float: left; font-size:30px; margin-bottom:10px;">Password</label>
                                      <input type="password" class="form-control"  name="password" value="<?php echo $row['password'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="subject" style="float: left; font-size:30px; margin-bottom:10px;">Subject_name</label>
                                      <input type="text" class="form-control" name="subject" value="<?php echo $row['subject_name'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="address"style="float: left; font-size:30px; margin-bottom:10px;">address</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                     </div>
                                    <div class="form-group">
                                      <label for="phone" style="float: left; font-size:30px; margin-bottom:10px;">Phone_number</label>
                                      <input type="number" class="form-control" name="phone" value="<?php echo $row['number'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>
                                      
                                      <input type="submit" name="edit_teachers" value="edit" class="btn btn-primary"style="width:40%; margin-top:50px; ">
                                   
</form>


<?php include('footer.php'); 
