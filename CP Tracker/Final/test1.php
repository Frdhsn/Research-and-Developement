<!DOCTYPE html>
<html>

<head>
		<title>Competitive Track</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
<body>

<h1>Table</h1>
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
    var i,j;

    for(i = 0; i < Object.keys(arr.result.problems).length; i++) {
        out += "<tr><td>" +
        arr.result.problems[i].contestId +
        "</td><td>" +
        arr.result.problems[i].index+
        "</td><td>" +
        arr.result.problems[i].rating+
        "</td><td> <a href= 'https://codeforces.com/contest/" +arr.result.problems[i].contestId+"/problem/"+arr.result.problems[i].index+"'>"+
        arr.result.problems[i].name+
        "<a></td><td>";
        for(j=0;j<Object.keys(arr.result.problems[i].tags).length;j++)
         {
             out+=arr.result.problems[i].tags[j]+" , ";
         }
         out+="</td></tr>"
    }
    out += "</table>";
   // var x=arr.resuts.problems[0].contestId;
   document.getElementById("id01").innerHTML = out;
}

</script>

</body>
</html>