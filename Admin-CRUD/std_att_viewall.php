<?php
//connect to the database attendance
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
<button class="btn btn-primary" style="margin-left:95% ;"> 
<a  href="admin_show_stdInfo.php" style="color:whitesmoke; text-decoration:none;"> back</button></a>

<form action="admin_show_stdInfo.php" method="post">

        <table class="table" style="text-align: center;">
                    <thead class="thead-dark">
                            <tr>
                                <th scope="col">Student</th>
                                <th scope="col">Roll_no</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                      
                            </tr>  
                            
                            <?php 
                            $query = "SELECT * FROM `tbl_sl-attendance`";
                           
                            $result = mysqli_query($conn, $query);
                             if(!$result){
                              die("query failed" );
                                 }

                                 else{
                               while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                    
                                <tr style="text-align:center ;">
                                    <td><?php echo $row['id'];?> </td>

                                    <td><?php echo $row['student_name'];?> 
                                    <input type="hidden" value="<?php echo $row['student_name'];?>" name="student_name[]">
                                    </td>

                                    <td><?php echo $row['date'];?></td>
                                   
                                    <td>
                                    <?php echo $row['status'];?>
                                    </td>
                                </tr>
                                    <?php

                                            }
                                        } 

                                    ?>
                    
                            </thead>
                </table>


        </form>


        <?php include('footer.php');