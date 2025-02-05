
<?php include('db_connection.php'); 
@session_start();
if(!isset($_SESSION['name'])){
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="teacher_dashboard1.css">
    <title>Teacher</title>
    <style>
        
    </style>
</head>
<body>
    <header>
        <h1 style="font-size: 70px;">ATTENDANCE MANAGEMENT SYSTEM</h1>
    </header>

    <main>
       
        </div>
        <div class="date-section">
            <div class="calender">
                    <div class="left">
                        <p id="date">00</p>
                        <p id="day">Sunday</p>
                    </div>
                    <div class="right">
                        <p id="month">January</p>
                        <p id="year">2024</p>
                    </div>
            </div>    
        
            <script>
                const date = document.getElementById("date");
                const day = document.getElementById("day");
                const month= document.getElementById("month");
                const year = document.getElementById("year");

                const today = new Date();

                const weekDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday" , "Friday", "Saturday"];

                const allMonths = ["January", "February", "March", "April", "May","June", "July", "August", "September", "October" , "November", "December"];

                date.innerHTML = today.getDate();
                day.innerHTML = weekDays[today.getDay()];
                month.innerHTML = allMonths[today.getMonth()];
                year.innerHTML = today.getFullYear();
            </script>
         </div>

        <div id="main-content">
            <div class="admin-dashboard">
                    <h2 style="font-size: 90px;">Welcome 
                    <?php 
                    $name=$_SESSION["name"];
                    echo $name;
                    ?></h2>
                   <h2>Subject: 
                     <?php 
                    $name=$_SESSION["name"];
                    $query = "Select subject_name from `tbl_teachers1` where name='$name'";
                    $result = mysqli_query($conn, $query);
       
                    $user = mysqli_fetch_assoc($result);
                   
                    $subject_name=$user["subject_name"];
                    echo $subject_name;

                    ?>

                   </h2>
                   
                </div>

                <a href="login.php"><button id="logout" name="logout" value="logout">
                <i class="fa-solid fa-right-from-bracket" style="font-size: 25px; color:antiquewhite"></i>
                </button></a>


            </div>
            <hr style="color: white; width: 100%; transform: translateY(-70px); 
            justify-content:center;">
            
            <div id="subjects">
                <div class="subject-5">
                    <a href="attendance_sl.php"  style="color:white; text-decoration:none"><h3>attendance</h3>
                    <img src="./images/icons8-attendance-50.png" style="height: 90px; margin-top:30px"></a>

                </div>
              

                <div class="subject-5">
                <a href="teacher_profile.php"   id="example-modal" style="color:white; text-decoration:none"><h3>profile</h3>
                    <i class="fa-solid fa-user-graduate" style="font-size: 90px; margin-top:30px"></i></a>
                </div>
                <div class="subject-5">
                    <a href="teacher_notification.php"  style="color:white; text-decoration:none"><h3>Notifications</h3>
                    <i class="fa-solid fa-bell" style="font-size: 90px; margin-top:30px"></i></a>
                </div>
                <div class="subject-5">
                    <a href="student_details.php"  style="color:white; text-decoration:none"><h3>Student Details</h3>
                    <i class="fa-regular fa-book-open-reader" style="font-size: 90px; margin-top:30px"></i></a>
                </div>

            </div>
    </main>
</body>
</html>