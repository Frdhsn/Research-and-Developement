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

    <section id="main" class="wrapper">
        <div class="innerf">
            <h3  align="center" >Contests</h3>

            <h3  align="center" >Recent contests</h3>
            <div id="id01"></div>

            <script>
            var xmlhttp = new XMLHttpRequest();
            var url = "contestrec.json";
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    myFunction(this.responseText);
                }

            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();

            function myFunction(response) {
                var arr = JSON.parse(response);
                var out = "<table>";
                var i, j;
                out += "<tr><th>Contest Name</th><th>Start Time</th><th>Duration</th><th>Online Judge</th></tr>";
                for (i = 0; i < 100; i++) {
                    out += "<tr><td>" +
                        "<a href='" + arr.objects[i].href + "'>" +
                        arr.objects[i].event + "</a>" +
                        "</td><td>" +
                        arr.objects[i].start.substring(9, 0) + "  " + arr.objects[i].start.substring(11) +
                        "</td><td>" +
                        Math.floor(arr.objects[i].duration / 3600) + " Hours and " + (arr.objects[i].duration % 3600) /
                        60 + " Minutes" +
                        "</td><td>" +
                        "<a href='https://" + arr.objects[i].resource.name + "'>" +
                        arr.objects[i].resource.name + "</a>";
                    out += "</td></tr>";
                }
                out += "</table>";
                //var x=arr.objects[0].duration/60;
                document.getElementById("id01").innerHTML = out;
            }
            </script>
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