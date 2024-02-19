<!DOCTYPE html>
<html>
    <head>
        <link href="StylesForDrivingLicense.css" rel="stylesheet">

        <!-- Begin of the internal CSS styles -->

        <style>
            body{
                background-image:url("Pictures/payment.jpg");
                background-repeat: no-repeat; 
                background-size: cover;
                
            }
            
           
        </style>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="homepage.css">
        
        <title>
            Online payment
        </title>
    </head>

    <body  >

    <div class="header">  <!--navigationbar -->
        <div class="logo-container">
            <img src="img/logo.jpg" alt="Website Logo" height="50px" width="50px">
            <h1>LicenseXpress</h1>
        </div>
        <nav>
            <ul>
                <li><a href="registereduser.html">Home</a></li>
                <li><a href="profile.php">Dasboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Driving License</a>
                    <div class="dropdown-content">
                        <a href="newDrivingLicesne.html">New Driving License</a>
                        <a href="renewDrivingLicesne.html">Rnew Driving License</a>
                        <a href="updateDrivingLicense.html">Update Driving License</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Shedule</a>
                    <div class="dropdown-content">
                        <a href="medical.html">Medical Appointment</a>
                        <a href="WExam.html">written Exam</a>
                        <a href="PExam.html">Practical Exam</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Eservices</a>
                    <div class="dropdown-content">
                        <a href="payments.php">Payment</a>
                        <a href="practiceexamforregsitereduser.php">Practice Exam</a>
                    </div>
                </li>          
                <li><a href="#">Reports</a></li>
                <li class="dropdown" id = "left">
                    <a href="#"><img src="img/user.png" alt="user" id="userimg" height="25px" width="25px"></a>
                    <div class="dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>
                </li> 
                <li id = "left">
                    <input type="text" name="Search" id="Search" placeholder="Search" class="image-placeholder">
                </li>
            </ul>
        </nav>
    </div>

        <ul class="breadcrumb2">
            
            <li><a class = "dark" href="registereduser.html">Home</a></li>
            <li class = "dark"> Payments </li>
            
        </ul> <br><br>

        <center> 
            <form class = "form" method="POST" action="process_payment.php" id="paymentForm" > <br>
                <!-- Header of the application -->
                <center><img src = "Pictures/Logo.png" width ="100" height = "100" >
                <h1>LicenseXPress</h1></center>
                <h2 class = "subhead"> Payments </h2><br><br></p>

                <label for="NIC" class = "label-type1"> NIC <font class = "required">*</font></label>
                <input type="text" id="NIC" name="NIC" required> <br>

                <label for="Amount" class = "label-type1"> Amount <font class = "required">*</font></label>
                <input type="text" id="Amount" name="Amount" required> <br>
                    
                <label for="type" class = "label-type1"> Payment Type <font class = "required">*</font></label>
                <br>
                <select id="type" name="type">
                    <option value="New">For New License</option>
                    <option value="Update">For Updating License</option>
                    <option value="Renew">For Renewing License</option>
                        
                </select><br><br><br><br><br><br>
                <center>
                    <input type = "submit" class="action" name="submit" value = "Offline Payments"> &nbsp &nbsp &nbsp
                    <input type = "submit" class="action" name="submit"  value = "Online">
                </center>    

                </p>
                
  
                </form>
        </center>
        
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        
        <footer id="footer">


        <nav>
            <ul>
                <li><a href="About Us_Registered user.html">About Us</a></li>
                <li><a href="FAQ_Registered user.html">FAQs</a></li>
                <li><a href="Contact Us_Registed user.html">Contact Us</a></li>
                <li><a href="#">Help and Support</a></li>
                <li id = "left"><a href="#"><img src="img/logo.jpg" alt="user" id="userimg" height="50px" width="50px"></a></li>
            </ul>
        </nav>
            
            <p>
                Copyright © 2023 - Department of Motor Traffic, Sri Lanka.<br> All Rights Reserved
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