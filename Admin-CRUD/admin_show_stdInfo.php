<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
?>

<?php 
 //connect to the database attendance with attendacne database

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
 
 <div class="division1">
     <h1 class="header" style="font-size: 70px;"> Attendance Information</h1>
     
    </div>
    <a href="admin_dashboard.php"><button class="btn btn-primary"   >Back</button></a> 

<form action="show_attendance.php" method="post">

    <div class="modal-body">
        <div id="forms">

            <table class="table ">
                <thead class="thead-dark">
                    <tr style="text-align: center;">
                        <th scope="col">#</th>
                        <th scope="col">Dates</th>
                        <th scope="col">Show Attendance</th>
                    </tr>
                    <?php

                    $query = "SELECT  distinct date FROM  `tbl_sl-attendance`";
                    $serialnumber = 0;
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        die("query failed");
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $serialnumber++;
                    ?>
                            <tr style="text-align:center ;">
                                <td><?php echo $serialnumber; ?>
                               </td>
                                <td><?php echo $row['date']; ?>
                                </td>
                                <td>
                                <form action = "show_attendance.php" method="post">
                                  <input type="hidden" value="<?php echo $row['date']; ?>" name="date">
                                  <input type="submit" class="btn btn-primary" value="Show Attendance">
                                </form>
                                </td>
                            </tr>

                    <?php

            
                        }
                    }

                    ?>
        </div>

    </div>


    </tbody>
    </table>
</form>

   


<?php include('footer.php');