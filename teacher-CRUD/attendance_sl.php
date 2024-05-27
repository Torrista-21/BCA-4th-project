
<?php include('header.php');
@session_start();
if(!isset($_SESSION["name"])){
    header("location:login.php");
}
 ?>
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
$flag = 0;
if (isset($_POST['submit'])) {
    foreach ($_POST['status'] as $id=>$status) {
        $student_name = $_POST['student_name'][$id];
        $roll_no = $_POST['roll_no'][$id];
        $date = date("Y-m-d ");
        
        $query = "INSERT INTO `tbl_sl-attendance`(`student_name`,`roll_no`,`status`,`date`)VALUES('$student_name', '$roll_no','$status', '$date')";
        $result = mysqli_query($conn, $query);

        if ($result) {
          $flag=1;
        }
    }
}

?>

<div class="division1">
    <h1 class="header" style="font-size: 70px;"> Attendance Panel</h1>

</div>
<h1>
    <div class="well text-center"><?php echo date("Y-m-d "); ?>
</div>
</h1>
<?php if($flag) { ?>
<div class="alert alert-success">Attendance data successfully inserted</div>

<?php } ?>

<form action="attendance_sl.php" method="post">

    <div class="modal-body">
        <div id="forms">

            <table class="table ">
                <thead class="thead-dark">
                    <tr style="text-align: center;">
                        <th scope="col">#</th>
                        <th scope="col">FullName</th>
                        <th scope="col">Roll_no</th>
                        <th scope="col">Attendance</th>
                    </tr>
                    <?php

                    $query = "SELECT * FROM  `tbl_students`";
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
                                <td><?php echo $serialnumber; ?> </td>

                                <td><?php echo $row['fullname']; ?>
                                    <input type="hidden" value="<?php echo $row['fullname']; ?>" name="student_name[]">
                                </td>

                                <td><?php echo $row['Roll_no']; ?>
                                    <input type="hidden" value="<?php echo $row['Roll_no']; ?>" name="roll_no[]">
                                </td>
                                <td>

                                    <input type="radio" id="radiobutton"name="status[<?php echo $counter; ?>]" <?php if (isset($_POST['status'][$counter]) == "Present")
                                                                                                echo "checked=checked"; ?> value="Present">Present
                                    <input type="radio" id="radiobutton"name ="status[<?php echo $counter; ?>]" <?php if (isset($_POST['status'][$counter]) && $_POST['status'][$counter] == "Absent")
                                                                                                    echo "checked=checked"; ?> value="Absent">Absent
                                </td>
                            </tr>

                    <?php

                            $counter++;
                        }
                    }

                    ?>
        </div>
        <div class="modal-footer">
        <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
   
        </div>
    </div>


    </tbody>
    </table>

</form>


<?php include('footer.php'); ?>
<?php include('footer.php'); ?>