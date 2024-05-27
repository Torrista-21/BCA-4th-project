<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("location:login.php");
}
?>
<?php include('header.php'); ?>
<a href="admin_dashboard.php"><button class="btn btn-primary" style="float:left;" >Back</button></a>

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
<?php
if (isset($_POST['submit'])) {
    $search = $_POST['search'];

    $sql = "Select * FROM `tbl_subjects` where name='$search' or teacher='$search' or code= '$search' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result)>0) {
            echo ' <table class="table">
            <thead class="thead-dark">
              <tbody>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">code</th>
                <th scope="col">teacher</th>
            </tr>
            </thead>';
            while($row=mysqli_fetch_assoc($result)){
 ?>
                  <tr>
                          <td><?php echo $row['name'];?> </td>
                          <td><?php echo $row['code'];?> </td>   
                            <td><?php echo $row['teacher'];?> </td>
                    </tr>
                    <?php
            }
        }
        else{
           
            echo' <h1><div class="alert alert-danger md-7" >Data not found!!!!</div></h1>';
         }
    }
    else{
        header('location:admin_subjects.php');
    }
   
}
?>