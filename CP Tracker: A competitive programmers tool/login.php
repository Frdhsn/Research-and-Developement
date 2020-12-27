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
            <h3 align="center">Login Form</h3>
            <form method="POST" action="">
                <div class="row uniform">
                    <div class="6u 12u$(xsmall)">
                        <input type="email" name="mail" id="mail" value="" placeholder="Email" />
                    </div>
                    <div class="6u 12u$(xsmall)">
                        <input type="password" name="pass" id="pass" value="" placeholder="Password" />
                    </div>
				</div>
</br></br>
				<div class="12u$", align="center">
                <ul class="actions"> 
                    <li> <input type="submit",name="login" value="Login" /> </li>
                </ul>
            </div>
            </form>
         </div>
    </section>

<?php  
	session_start();
	$msg="";
	$_SESSION["login"]=false;
            if($_SERVER['REQUEST_METHOD']=='POST'){  
            if(!empty($_POST['mail'])&& !empty($_POST['pass'])) {  

                $pass=$_POST['pass'];
				$mail=$_POST['mail'];
				
                $con=mysqli_connect('localhost','root','') or die(mysql_error());  
            
				mysqli_select_db($con,'cpp_track') or die("cannot select DB");  
				
              
			    $query = "SELECT * FROM user_data WHERE  passwords='$pass' AND email = '$mail' ";
			   //$query = "SELECT email FROM user_data WHERE email='$mail' ";
				$result = mysqli_query($con, $query) or die(mysqli_error($con));
				$row  = mysqli_fetch_array($result);
				$count = mysqli_num_rows($result);
                echo  "$count";
                if ($count == 1){
					$_SESSION["login"]=true;
                    $_SESSION["id"] = $row['id'];
					$_SESSION["fname"] = $row['firstname'];
					$_SESSION["mail"] = $row['email'];
					//echo "Login Credentials verified";
					//echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";					
					}else{
					//echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
					$msg= "Invalid Username or password";
					}
					if($count == 1) {
						header("Location:index.php");
						}
            }  
            }  
            ?> 
			 <div class="inner" align='center'><h4><?php if($msg!="") { echo "$msg"; } ?><h4></div>
			 
			 </br>
</br>
</br>
</br>
</br>
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