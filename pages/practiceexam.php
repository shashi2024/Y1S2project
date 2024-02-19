<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="practiceexam.css">
    <title>Licensexpress</title>
</head>
<body>
    <div class="header"> <!--navigation-->
        <div class="logo-container">
            <img src="img/logo.jpg" alt="Website Logo" height="50px" width="50px">
            <h1>LicenseXpress</h1>
        </div>
        <nav>
            <ul>
                <li><a href="homepageuser.php">Home</a></li>
                <li><a href="AboutUs.html">About Us</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Eservices</a>
                    <div class="dropdown-content">
                        <a href="practiceexam.php">Practice Exam</a>
                    </div>
                </li>
                <li><a href="FAQ.html">FAQs</a></li>
                <li><a href="ContactUs.html">Contact Us</a></li>
                <li id = "left"><a href="#"><img src="img/user.png" alt="user" id="userimg" height="25px" width="25px"></a></li>
                <li id = "left"><a href="signup.html">Sign Up</a></li>
                <li id = "left"><a href="login.html">Login</a></li>
                <li id = "left">
                    <input type="text" name="Search" id="Search" placeholder="Search" class="image-placeholder">
                </li>
            </ul>
        </nav>
    </div>
<fieldset>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="get">
    1.According the Sri Lankan motor traffic law, accidental warning signals are in?<br>
    <input type="radio" name="q1" id="q1a" value="1">1. White colour with Red background<br>
    <input type="radio" name="q1" id="q1b" value="2">2. Black colour with Yellow background<br>
    <input type="radio" name="q1" id="q1c" value="3">3. Red colour with White background<br>
    <input type="radio" name="q1" id="q1d" value="4">4. White colour with Blue background<br><br>

    2.The primary rule of a roundabout is?<br>
    <input type="radio" name="q2" id="q2a" value="1">1. Give away the road to the vehicles coming from left or close to the vehicle<br>
    <input type="radio" name="q2" id="q2b" value="2">2. Give away the road to the vehicles coming from the most jammed direction<br>
    <input type="radio" name="q2" id="q2c" value="3">3. Give away the road to the vehicles coming from right or closely by right side<br>
    <input type="radio" name="q2" id="q2d" value="4">4. Give away the road to the vehicles coming from the right<br><br>

    3.When you drive forward on a road with three lanes, what you should select is,<br>
    <input type="radio" name="q3" id="q3a" value="1">1. Right lane of the road<br>
    <input type="radio" name="q3" id="q3b" value="2">2. Left lane of the road<br>
    <input type="radio" name="q3" id="q3c" value="3">3. Middle lane of the road<br>
    <input type="radio" name="q3" id="q3d" value="4">4. Middle lane or the right lane of the road<br><br>

    4.You should keep an adequate distance with the front vehicle,<br>
    <input type="radio" name="q4" id="q4a" value="1">1. Because if the front vehicle driver suddenly stops, you can safely control your vehicle<br>
    <input type="radio" name="q4" id="q4b" value="2">2. Because the front vehicle receives much space to overtake<br>
    <input type="radio" name="q4" id="q4c" value="3">3. Because it is easy drive behind the front vehicle<br>
    <input type="radio" name="q4" id="q4d" value="4">4. Because if the front vehicle driver suddenly stops, you have more time to overtake<br><br>

    5.You should not overtake another vehicle,<br>
    <input type="radio" name="q5" id="q5a" value="1">1. In front of a court or nearby<br>
    <input type="radio" name="q5" id="q5b" value="2">2. When not cutting the broken lines on the road<br>
    <input type="radio" name="q5" id="q5c" value="3">3. On a pedestrian crossing or closer<br>
    <input type="radio" name="q5" id="q5d" value="4">4. In front of a hospital or closer<br><br>

    <input type="submit" value="submit" name = "btn_sub">
</form>
    
</fieldset>

  <!-- calculating the marks -->
<?php
    if(isset($_GET["btn_sub"])) 
    {

        if(isset($_GET["q1"]) && isset($_GET["q2"]) && isset($_GET["q3"]) && isset($_GET["q4"]) && isset($_GET["q5"]))

       {
        $Score = 0;

        if ($_GET["q1"] == 2)
        {
            $Score += 1;
        }
    
        if ($_GET["q2"] == 4)
        {
            $Score += 1;
        }
    
        if ($_GET["q3"] == 3)
        {
            $Score += 1;
        }
    
        if ($_GET["q4"] == 1)
        {
            $Score += 1;
        }
    
        if ($_GET["q5"] == 3)
        {
            $Score += 1;
        }
    
        echo "<p id = 'marks'>Marks: $Score/5  </p>";

       }
        

    }


?>
    <footer id="footer">
        
        <p>
            Copyright © 2023 - Department of Motor Traffic, Sri Lanka. <br> All Rights Reserved
            Designed & Developed By MLB_WE_01.01_01 <p id="date"></p>
        
        </p>
        <script>
            var currentDate = new Date();
            var options = { day: 'numeric', month: 'long', year: 'numeric' };
            var formattedDate = currentDate.toLocaleString('en-US', options);

            document.getElementById('date').innerText = formattedDate;
        </script>
    </footer>

</body>
</html>

</body>
</html>