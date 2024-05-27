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
?>
<?php include('header.php'); ?>
<a href="admin_dashboard.php"><button class="btn btn-primary" style="float:left;" >Back</button></a>

<?php
if (isset($_POST['submit'])) {
    $search = $_POST['search'];

    $sql = "Select * FROM `tbl_teachers1` where name='$search' or subject_name='$search' or email= '$search' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result)>0) {
            echo ' <table class="table">
            <thead class="thead-dark">
              <tbody>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">EMAIL</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone No.</th>
            </tr>
            </thead>';
            while($row=mysqli_fetch_assoc($result)){
 ?>
                  <tr>
                          <td><?php echo $row['name'];?> </td>
                          <td><?php echo $row['email'];?> </td>   
                            <td><?php echo $row['subject_name'];?> </td>
                          <td><?php echo $row['address'];?> </td>
                          <td><?php echo $row['number'];?> </td>
                    </tr>
                    <?php
            }
        }
        else{
           
            echo' <h1><div class="alert alert-danger md-7" >Data not found!!!!</div></h1>';
         }
    }
    else{
        header('location:admin_teacher.php');
        die();
    }
   
}
?>


<?php include('header.php'); ?>
<a href="admin_dashboard.php"><button class="btn btn-primary" style="float:left;" >Back</button></a>

