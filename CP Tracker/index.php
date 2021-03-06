<!DOCTYPE HTML>

<?php
session_start();
?>

<html>
	<head>
		<title>Projection by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

        <?php
        if($_SESSION["login"]==false)
        {
            header("Location:login.php");
        }
        ?>
		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo"><strong>Competitive</strong> TRACKER</a>
					<nav id="nav">
						<!--a href="index.html">Home</a-->
						<a href="profile.php"><?php echo $_SESSION["fname"]; ?> </a>
                        <a href="problems.php">Problems</a>
                        <a href="elements.html">Submissions</a>
                        <a href="elements.html">Leaderboard</a>
                        <a href="elements.html">Contests</a>
                        <a href="logout.php">Logout</a>
                        
                        
                    </nav>
                    	
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				
				<div class="inner">
					
					<header>
						<h1>Welcome to CP Tracker</h1>
					</header>

					<div class="flex ">

						<div>
							<span class="icon fa-bar-chart"></span>
							<h3>Leaderboard</h3>
							<p>Find yourself in the leaderboard !</p>
						</div>

						<div>
							<span class="icon fa-code"></span>
							<h3>Problems</h3>
							<p>Code your creative solutions !</p>
						</div>

                        <div>
							<span class="icon fa-calendar"></span>
							<h3>Contests</h3>
							<p>Prepare for upcoming contests !</p>
						</div>
                        
                       
					</div>

					<footer>
						<a href="problems.html" class="button">Get Started</a>
					</footer>
				</div>
				
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
                    <h3><b>Dashboard </b></h3>
					<div class="flex flex-2">
						<article>
							<div class="image round">
								<img src="images/cp1.png" alt="Pic 01" />
							</div>
							<header>
								<h3>ICPC 2020 <br /> Declared </h3>
							</header>
							<p>2020 ICPC World Finals,</br> hosted by Moscow Institute of Physics and Technology</br>June 19-24, 2021,Moscow, Russia</p>
							<footer>
								<a href="https://icpc.global/" class="button">Learn More</a>
							</footer>
						</article>
						<article>
							<div class="image round">
								<img src="images/cp2.png" alt="Pic 02" />
							</div>
							<header>
								<h3>Looking<br /> for a job ? </h3>
							</header>
							<p>Top classic interview questions to help you land your dream job.</br>Also to help you master Data Structure &</br> Algorithms and improve your coding skills.</p>
							<footer>
								<a href="https://leetcode.com/explore/featured/card/top-interview-questions-easy/" class="button">Learn More</a>
							</footer>
						</article>
					</div>
				</div>
			</section>

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