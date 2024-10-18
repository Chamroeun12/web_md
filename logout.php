<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Clear cookies
// setcookie('username', '', time() - 3600, "/");
// setcookie('password', '', time() - 3600, "/");

// Redirect to login page
header("Location: login_role.php");
exit();
