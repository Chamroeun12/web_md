<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=db_students", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if (session_status() === PHP_SESSION_NONE) {
  session_start();
  if (!isset($_SESSION['user'])) {
    // Redirect to login page or display an error message
    header('Location: login_role.php');
    exit;
  }
}
