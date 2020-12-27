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
            <h3>Submission</h3>

            <h3>Recent Submission</h3>
            <div id="id01"></div>

            <script>
            var xmlhttp = new XMLHttpRequest();
            var url = "https://codeforces.com/api/problemset.recentStatus?count=100";

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
                out +=
                    "<tr><th>Submission ID</th><th>Rating</th><th>Name with Link</th><th>Tags</th><th>Author</th><th>verdict</th><th>Language</th></tr>";
                for (i = 0; i < Object.keys(arr.result).length; i++) {
                    out += "<tr><td>" + "<a href='https://codeforces.com/contest/" +
                        arr.result[i].contestId + "/submission/" + arr.result[i].id + "'>" +
                        arr.result[i].id +
                        "</a></td><td>" +
                        arr.result[i].problem.rating +
                        "</td><td> <a href= 'https://codeforces.com/contest/" + arr.result[i].problem.contestId +
                        "/problem/" + arr.result[i].problem.index + "'>" +
                        arr.result[i].problem.name +
                        "<a></td><td>";
                    for (j = 0; j < Object.keys(arr.result[i].problem.tags).length; j++) {
                        out += arr.result[i].problem.tags[j] + " , ";
                    }
                    out += "</td><td> <a href= 'https://codeforces.com/profile/" + arr.result[i].author.members[0]
                        .handle + "'>" +

                        arr.result[i].author.members[0].handle +
                        "<a></td><td>" +
                        arr.result[i].verdict +
                        "</td><td>" +
                        arr.result[i].programmingLanguage;
                    out += "</td></tr>"
                }
                out += "</table>";
                //var x=arr.result[0].author.members[0].handle;
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