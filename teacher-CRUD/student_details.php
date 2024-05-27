
<?php include('db_connection.php'); 
@session_start();
if(!isset($_SESSION["name"])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/js/dataTables.min.js">
    <link rel="stylesheet" href="student_details.css">
  <title>Student details</title>
</head>
<body>
  
</body>
</html>

<div class="division1">
  <h1> Student information</h1>
  <a href="teacher's_dashboard.php"><button class="btn btn-primary" style="float:left;">Back</button></a>

  <form action="search_student.php" method="post">
      <input type="submit" name="submit" id="search" class="btn btn-info"style=" transform:translateY(25px); height:40px; width:100px; border:2px solid antiquewhite; border-radius:10px; float:right;">  
    <input type="text" name="search" id="search" placeholder="Search Students" style="background:transparent; width:20%; transform:translateY(25px); height:40px; border:2px solid antiquewhite; border-radius:10px; float:right;">
 
  </form>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr style="text-align: center;">
      <th scope="col" >#</th>
      <th scope="col" >FullName"</th>
      <th scope="col">Roll_no</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $query = "SELECT * FROM  `tbl_students`";
    $serialnumber = 0;
    $result = mysqli_query($conn, $query);
    if (!$result) {
      die("query failed");
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        $serialnumber++;
    ?>
        <tr id="table-data-hover">
          <td> <?php echo $serialnumber; ?> </td>
          <td><a href="searchResults.php?data=<?php echo $row['id'] ?>" "><?php echo $row['fullname']; ?></a></td>
          <td><?php echo $row['Roll_no']; ?> </td>
         
             
        </tr>

    <?php

      }
    }

    ?>
  </tbody>
</table>
