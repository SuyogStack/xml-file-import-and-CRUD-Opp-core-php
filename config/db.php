<?php
//DB name : xlm_data_core_php

$servername = "localhost";
$username = "root";
$password = "";
$database = "xlm_data_core_php";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
