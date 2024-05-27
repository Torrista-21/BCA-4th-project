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
        $Eaddress = $_POST['address']; 
    
        
        $query = "update `tbl_teachers1` set `name`  =  '$Ename', `email`= '$Eemail', `password` = '$Epassword', `address` = '$Eaddress' 
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
                                      <label for="NAME">name</label>
                                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="password" class="form-control" name="password" value="<?php echo $row['password'] ?>"> 
                                    </div>
                                      
                                     <div class="form-group">
                                         <label for="address">address</label>
                                         <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>">
                                      </div>
                                      <input type="submit" name="edit_teachers" value="edit" class="btn btn-primary">
</form>


<?php include('footer.php'); 
