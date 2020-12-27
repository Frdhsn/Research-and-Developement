<!DOCTYPE HTML>
<?php
session_start();
?>

<html>

<head>
    <title>Competitive Track</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<?php
	if($_SESSION["login"]==false)
	{
		header("Location:login.php");
	}
	?>

<body class="subpage">
    <header id="header">
        <div class="inner">
            <a href="index.php" class="logo"><strong>Competitive</strong> TRACKING</a>
            <nav id="nav">
                <a href="profile.php"><?php echo $_SESSION["fname"]; ?> </a>
                <a href="problems.php">Problems</a>
                <a href="submission.php">Submissions</a>
                <a href="leaderboard.php">Leaderboard</a>
                <a href="contest.php">Contests</a>
                <a href="logout.php">Logout</a>
            </nav>
            <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
        </div>
    </header>

    <?php
        $id=$_SESSION["id"];
        $con=mysqli_connect('localhost','root','') or die(mysqli_error($con));  
        mysqli_select_db($con,'cpp_track') or die("cannot select DB");  
 

        $query = "SELECT * FROM user_data WHERE  id='$id' ";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $row  = mysqli_fetch_array($result);
        ?>
    <section id="main" class="wrapper">
        <div class="innerf">
            <h3><b><?php echo $row["firstname"],"  ",$row["lasttname"]; ?></b></h3>

            <h4><?php echo $row["dept"];
                                    echo"</br>";
                                    echo $row["institute"]; ?></h4>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Online judge</th>
                            <th>Solved problem</th>
                            <th>Tried</th>
                            <th>Maximum Daily Submission</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Codeforces</td>
                            <td><?php echo (rand (50,800));?></td>
                            <td><?php echo (rand (800,2000));?></td>
                            <td><?php echo (rand (3,50));?></td>

                        </tr>
                        <tr>
                            <td>Codechef</td>
							<td><?php echo (rand (50,800));?></td>
                            <td><?php echo (rand (800,2000));?></td>
                            <td><?php echo (rand (3,50));?></td>
                        </tr>
                        <tr>
                            <td>Uva</td>
                            <td><?php echo (rand (50,800));?></td>
                            <td><?php echo (rand (800,2000));?></td>
                            <td><?php echo (rand (3,50));?></td>
                        </tr>
                        <tr>
                            <td>Toph</td>
                            <td><?php echo (rand (50,800));?></td>
                            <td><?php echo (rand (800,2000));?></td>
                            <td><?php echo (rand (3,50));?></td>
                        </tr>
                        <tr>
                            <td>Spoj</td>
                            <td><?php echo (rand (50,800));?></td>
                            <td><?php echo (rand (800,2000));?></td>
                            <td><?php echo (rand (3,50));?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    </br>
    </br>
    </br>
    </br>
    </br>
    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            Thank You For using CPP-Track
            <div class="copyright">
                &copy; Competitive TRACKING: <a
                    href="https://github.com/Frdhsn/Research-and-Developement/tree/master/CP%20Tracker">GitHub</a>
            </div>
        </div>
    </footer>
</body>

</html>