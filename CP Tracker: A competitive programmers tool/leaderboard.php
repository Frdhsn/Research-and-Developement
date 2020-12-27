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
            <h3 align="center">Leaderboard</h3>
            <div id="id01"></div>
            <!--<h3>Recent Submission</h3>-->
            <?php 
            $con=mysqli_connect('localhost','root','') or die(mysqli_error($con));  
            
            mysqli_select_db($con,'cpp_track') or die("cannot select DB");  
            
          
            $query = "SELECT firstname,lasttname,codeforce FROM user_data";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));

            $handles =array();
            while($row=mysqli_fetch_assoc($result))
            {
                array_push($handles,$row);
            }
           
           //print_r ($handles);
           //echo $handles[0]["codeforce"];
       ?>
            
            <script>
           var tmp = <?php echo json_encode($handles);?> ;
           var url="https://codeforces.com/api/user.info?handles=";
           var i,j;
           for (i = 0; i < Object.keys(tmp).length; i++){
               url+=tmp[i].codeforce+";";
           }
         

             var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    myFunction(this.responseText);
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();


            function myFunction(response) {
                var arr = JSON.parse(response);

                arr.result.sort(function(a,b){
                    return b.rating-a.rating;});

                var out = "<table>";
                var i, j;
                out +=
                    "<tr><th>Name</th><th>Handle</th><th>Rating</th><th>MaxRating</th><th>Organization</th></tr>";
                for (i = 0; i < Object.keys(arr.result).length; i++) {
                    out += "<tr><td>" + 
                        arr.result[i].firstName +
                        " " +
                        arr.result[i].lastName +
                        "</td>";
                    out += "<td> <a href= 'https://codeforces.com/profile/" + arr.result[i].handle + "'>" +
                        arr.result[i].handle +
                        "<a></td><td>" +
                        arr.result[i].rating +
                        "</td><td>" +
                        arr.result[i].maxRating+
                        "</td><td>"+
                        arr.result[i].organization;
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