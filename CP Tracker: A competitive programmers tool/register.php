<!DOCTYPE HTML>

<html>
	<head>
		<title>Competitive Track</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body class="subpage">
			<header id="header">
				<div class="inner">
					<a href="home.html" class="logo"><strong>Competitive</strong> TRACKER</a>
					<nav id="nav">
						<a href="home.html">Home</a>
						<a href="login.php">Login</a>
						<a href="register.php">Signup</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
            
         <section id="main" class="wrapper">
		 <div class="innerf" >
            <h3 align="center">Registration Form</h3>
            <form method="POST" action="">
                <div class="row uniform">
                    <div class="6u 12u$(xsmall)">
                        <input type="text" name="fname" id="fname" value="" placeholder="First Name" />
                    </div>
                    <div class="6u$ 12u$(xsmall)">
                        <input type="text" name="lname" id="lname" value="" placeholder="Last Name" />
                    </div>
                    <div class="6u 12u$(xsmall)">
                        <input type="email" name="mail" id="mail" value="" placeholder="Email" />
                    </div>
                    <div class="6u$ 12u$(xsmall)">
                        <input type="text" name="phn" id="phn" value="" placeholder="Phone" />
                    </div>
                    <div class="6u 12u$(xsmall)">
                        <input type="password" name="pass" id="pass" value="" placeholder="Password" />
                    </div>
                    <div class="6u$ 12u$(xsmall)">
                        <input type="password" name="pass2" id="pass2" value="" placeholder="Confirm Password" />
                    </div>
                    <div class="6u 12u$(xsmall)">
                        <input type="text" name="cfh" id="cfh" value="" placeholder="Codeforces Handle" />
                    </div>
                    <div class="6u$ 12u$(xsmall)">
                        <input type="text" name="cch" id="cch" value="" placeholder="Codechef handle" />
                    </div>
                
                    <!-- Break -->
                    <div class="6u 12u$(xsmall)">
                        <div class="select-wrapper">
                            <select name="institute" id="institute">
                                <option value="">- Institute -</option>
                                <option value="Jahangirnagar University">Jahangirnagar University</option>
                                <option value="University of Dhaka">University of Dhaka</option>
                                <option value="Bangladesh University of Engineering and Technology">Bangladesh University of Engineering and Technology</option>
                                <option value="Rajsahi University of Engineering and Technology">Rajsahi University of Engineering and Technology</option>
                                <option value="Khulna University of Engineering and Technology">Khulna University of Engineering and Technology</option>
                                <option value="Chittagong University of Engineering and Technology">Chittagong University of Engineering and Technology</option>
                                <option value="Shahjalal University of Science and Technology">Shahjalal University of Science and Technology</option>
                            </select>
                        </div>
                    </div>

                    <div class="6u$ 12u$(xsmall)">
                        <div class="select-wrapper">
                            <select name="dept" id="dept">
                                <option value="">- Department -</option>
                                <option value="Computer Science Engineering(CSE)">Computer Science Engineering(CSE)</option>
                                <option value="Electrical and Electronic Engineering (EEE)">Electrical and Electronic Engineering (EEE)</option>
                                <option value="Information Technology (IT)">Information Technology (IT)</option>
                                <option value="Software Engineering(SWE)">Software Engineering(SWE)</option>
                                <option value="Mathematics">Mathematics</option>
                                <option value="Physics">Physics</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <!-- Break -->
                    <div class="12u$" align="center" >
                        <ul class="actions">
                           
                            <li> <input type="submit",name="submit" value="SignUp !" /> </li>
                            <!--li><input type="reset" value="Reset" class="alt" /></li-->
                        </ul>
                    </div>
                </div>
            </form>
         </div>
    </section>

    <?php  
            if($_SERVER['REQUEST_METHOD']=='POST'){  
            if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['mail'])&& !empty($_POST['pass'])) {  
                $fname=$_POST['fname'];
                $lname=$_POST['lname'];  
                $pass=$_POST['pass'];
                $mail=$_POST['mail'];
                $phn=$_POST['phn']; 
                $cfh=$_POST['cfh']; 
                $cch=$_POST['cch']; 
                $institute=$_POST["institute"];
                $dept = $_POST['dept'];
                $con=mysqli_connect('localhost','root','') or die(mysql_error());  
            
                mysqli_select_db($con,'cpp_track') or die("cannot select DB");  
              
                $sql="INSERT INTO user_data (firstname,lasttname,email,phn,passwords,codeforce,codechef,institute,dept) VALUES('$fname','$lname ','$mail','$phn','$pass','$cfh','$cch','$institute','$dept')";  
              
                $result=mysqli_query($con,$sql);  
                    if($result){ 
                        echo "<script type='text/javascript'>window.top.location='login.php';</script>"; exit; 
                //echo "Account Successfully Created";  
                //header("location: login.php");
                } 
                else {  
                echo "Failure!";  
                } 
              
            } else {  
                echo "All fields are required!";  
            }  
            }  
            ?>  

    		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
                    Thank You For using CP-Tracker
					<div class="copyright">
						&copy; Competitive TRACKING: <a href="https://github.com/Frdhsn/Research-and-Developement/tree/master/CP%20Tracker">GitHub</a>
					</div>
				</div>
            </footer>
            
    </body>
</html>