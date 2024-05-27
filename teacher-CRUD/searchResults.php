<?php include("header.php"); ?>
<?php include("db_connection.php"); ?>


<?php 
$data = $_GET['data'];
$sql = "select * from  `tbl_students` where id=$data";
$result = mysqli_query($conn, $sql);
if($result){
    $row=mysqli_fetch_assoc($result);}
?>
 
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
                                      
                                     
                                   
</form>
<a href="student_details.php"><button class="btn btn-primary" style="float:left;">Back</button></a>


<?php include("header.php"); ?>