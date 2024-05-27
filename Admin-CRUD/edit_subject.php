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
    
    $query = "SELECT * FROM  `tbl_subjects` WHERE `id` = '$id'";
    
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
    if(isset($_POST['edit_subject'])){
        if(isset($_GET['new_id'])){
            $new_id = $_GET['new_id'];
        }
    
        $Ename = $_POST['name']; 
        $Eteacher = $_POST['Teacher']; 
        $Ecode = $_POST['code']; 
    
        $query = "update `tbl_subjects` set `name`  =  '$Ename', `teacher`= '$Eteacher', `code` = '$Ecode'
        WHERE `id` = '$new_id'";
        
        $result = mysqli_query($conn, $query);
    
        if(!$result){
            die("query failed" );
        }
        else{
            header('location:admin_subjects.php?e_msg=updated successfully');
        }
    }

    ?>
<form action="edit_subject.php?new_id=<?php echo $id; ?>" method="post">
                                    <div class="form-group">
                                      <label for="name" style="float: left; font-size:30px; margin-bottom:10px;">Name</label>
                                      <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>

                                    <div class="form-group">
                                      <label for="teacher" style="float: left; font-size:30px; margin-bottom:10px;">teacher</label>
                                      <input type="text" class="form-control" name="Teacher" value="<?php echo $row['teacher'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="code" style="float: left; font-size:30px; margin-bottom:10px;">code</label>
                                      <input type="text" class="form-control" name="code" value="<?php echo $row['code'] ?>" style="background-color: transparent; color:antiquewhite;
                                      margin-bottom:12px;">
                                    </div>
                                    
                                  
                                      <input type="submit" name="edit_subject" value="Update Subject" class="btn btn-primary"style="width:40%; margin-top:50px; ">
                                   
</form>


<?php include('footer.php'); 
