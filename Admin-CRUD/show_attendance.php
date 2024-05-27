<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
?>

<?php include('header.php'); ?>

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
<h1>
    <div class="well text-center"><?php echo date("Y-m-d"); ?>
</div>
<div class="division1">
    <h1 class="header" style="font-size: 70px;"> Attendance History</h1>
    <a href="admin_dashboard.php"><button class="btn btn-primary" style="float:left;">Back</button></a>
<form action="search.php" method="post">
  </form>
   
</div>
</h1>


    <div class="modal-body">
        <div id="forms">

            <table class="table ">
                <thead class="thead-dark">
                    <tr style="text-align: center;">
                        <th scope="col">#</th>
                        <th scope="col">FullName</th>
                        <th scope="col">Roll_no</th>
                        <th scope="col">Status</th>
                    </tr>
                    <?php

                    $query = "SELECT * FROM  `tbl_sl-attendance`" ;
                    $serialnumber = 0;
                    $counter = 0;
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        die("query failed");
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $serialnumber++;
                    ?>
                    
                            <tr style="text-align:center ;">
                                <td><?php echo $serialnumber?> </td>

                                <td><?php echo $row['student_name']; ?>
                                </td>

                                <td><?php echo $row['roll_no']; ?>
                                <td>
                               <strong>  <?php echo $row['status']; ?></strong>
                                </td>
                            </tr>

                    <?php

                            $counter++;
                        }
                    }

                    ?>
        </div>
    </div>


    </tbody>
    </table>

</form>
