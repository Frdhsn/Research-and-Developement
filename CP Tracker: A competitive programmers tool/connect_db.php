<?php

$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
$dbname = "cpp_track";


//creating database
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE $dbname";
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$conn->close();

//Creating table
$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql = "CREATE TABLE user_data(
  id INT(32) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lasttname VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL,
  phn VARCHAR(30) NOT NULL,
  passwords VARCHAR(30) NOT NULL,
  codeforce VARCHAR(30) NOT NULL,
  codechef VARCHAR(30) NOT NULL,
  institute VARCHAR(100) NOT NULL,
  dept VARCHAR(100) NOT NULL
  
  
  )";
  
  if ($con->query($sql) === TRUE) {
    echo "Table user created successfully";
  } else {
    echo "Error creating table: " . $con->error;
  }
  
$con->close();
?>