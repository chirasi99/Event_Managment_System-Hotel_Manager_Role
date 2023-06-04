<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservation Calendar </title>

        <link rel="stylesheet" href="./css/style2.css">
        <link rel="stylesheet" type="text/css" href="./css/headers.css">

        <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>


</head>
<body>
        <header>
                <?php include('header-2.php')?>               
        </header>
        
        <div class="calenderContainer">
                <div class="calendar">
                        <div class="calendar-header">
                        <span class="month-picker" id="month-picker">February</span>
                        <div class="year-picker">
                                <span class="year-change" id="prev-year">
                                <pre> < </pre>
                                </span>
                                <span id="year">2021</span>
                                <span class="year-change" id="next-year">
                                <pre> > </pre>
                                </span>
                        </div>
                        </div>
                        <div class="calendar-body">
                        <div class="calendar-week-day">
                                <div>Sun</div>
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                        </div>
                        <div class="calendar-days"></div>
                        </div>
                        <div class="calendar-footer">
                        </div>
                        <div class="month-list"></div>
                </div>
        
                <div class="identifications">
                        <ul type="none">
                                <li><input type="button" value=" " style="background-color: red;">No time slots available</li>
                                <li><input type="button" value="  " style="background-color: yellow;">Some time slots available</li>
                                <li><input type="button" value=" " style="background-color: rgb(229, 127, 89);">Vacation Days</li>
                        </ul>
                </div>
        
        </div>

    <script src="./js/app.js"></script>

</body>
</html>
