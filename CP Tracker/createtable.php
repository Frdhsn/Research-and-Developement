<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cpp_track";


//creating database
//Creating table
$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql = "CREATE TABLE problems(
  pid INT(32) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pname VARCHAR(50) NOT NULL,
  oj VARCHAR(50) NOT NULL,
  link VARCHAR(50) NOT NULL,
  difficulty VARCHAR(30) NOT NULL
  )";
    
    if ($con->query($sql) === TRUE) {
        echo "Table user created successfully";
      } else {
        echo "Error creating table: " . $con->error;
      }
 $sql = "CREATE TABLE submission(
    subid INT(64) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pid INT(32) NOT NULL,
    id VARCHAR(32) NOT NULL,
    tim DATETIME NOT NULL
    )";
    
  if ($con->query($sql) === TRUE) {
    echo "Table user created successfully";
  } else {
    echo "Error creating table: " . $con->error;
  }
  
$con->close();
?>