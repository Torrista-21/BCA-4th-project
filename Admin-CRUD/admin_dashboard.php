<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="admin_dashboard1.css">

    <title>Admin</title>
</head>
<body>
    <header>
        <h1>ATTENDANCE MANAGEMENT SYSTEM</h1>
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
                    <h2>admin dashboard</h2>
                    <div class="class-info">
                        <h3>BCA 4th sem</h3>
                    </div>
                </div>
                <a href="logout.php"><button id="logout" name="logout" value="logout">
                <i class="fa-solid fa-right-from-bracket" style="font-size: 25px;"></i>
                </a></button>

            </div>
            <hr style="color: white; width: 100%; transform: translateY(-70px); 
            justify-content:center;">
            
            <div id="subjects">
                <div class="subject-5">
                <a href="admin_show_stdInfo.php" style="color:antiquewhite; text-decoration:none" ><h3>Student Report</h3>
                    <img src="./images/icons8-attendance-80 (1).png" style="height: 90px; margin-top:30px"></a>

                </div>
                <div class="subject-5">
                    <a href="admin_teacher.php" style="color:antiquewhite; text-decoration:none" ><h3>teachers</h3>
                    <i class="fa-solid fa-chalkboard-user " style="font-size: 90px; margin-top:30px" ></i></a>
                    
                </div>

                <div class="subject-5">
                    <a href="admin_student.php"  style="color:antiquewhite;  text-decoration:none;"><h3>students</h3>
                    <i class="fa-solid fa-users" style="font-size: 90px; margin-top:30px"></i></a>
                </div>

                <div class="subject-5">
                <a href="admin_subjects.php"  style="color:antiquewhite; text-decoration:none" ><h3>subject</h3>
                    <i class="fa-solid fa-book-open" style="font-size: 90px; margin-top:30px"></i></a>
                </div>

                <div class="subject-5">
                <a href="admin_notification.php"  style="color:antiquewhite; text-decoration:none" ><h3>Notifications</h3>
                <i class="fa-solid fa-bell" style="font-size: 90px; margin-top:30px"></i></a>
                </div>


            </div>
    </main>
</body>
</html>