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
            <h3>Problems</h3>

            <!--h4>Problemlist</h4>
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Name</th>
                                                    <th>Online Judge</th>
                                                    <th>URL</th>
													<th>Difficulty</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item 1</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item 2</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item 3</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item 4</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item 5</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
                                            </tbody>
                                        </table>
										</div-->
            <h3>Problem list</h3>
            <div id="id01"></div>

            <script>
            var xmlhttp = new XMLHttpRequest();
            var url = "https://codeforces.com/api/problemset.problems";

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
                out += "<tr><th>ContestID</th><th>Index</th><th>Rating</th><th>Name with Link</th><th>Tags</th></tr>";
                for (i = 0; i < Object.keys(arr.result.problems).length; i++) {
                    out += "<tr><td>" +
                        arr.result.problems[i].contestId +
                        "</td><td>" +
                        arr.result.problems[i].index +
                        "</td><td>" +
                        arr.result.problems[i].rating +
                        "</td><td> <a href= 'https://codeforces.com/contest/" + arr.result.problems[i].contestId +
                        "/problem/" + arr.result.problems[i].index + "'>" +
                        arr.result.problems[i].name +
                        "<a></td><td>";
                    for (j = 0; j < Object.keys(arr.result.problems[i].tags).length; j++) {
                        out += arr.result.problems[i].tags[j] + " , ";
                    }
                    out += "</td></tr>"
                }
                out += "</table>";
                // var x=arr.resuts.problems[0].contestId;
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