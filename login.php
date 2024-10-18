<?php
// User Login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Establish database connection with PDO
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Input validation
    if (empty($username)) {
        header("Location: login_role.php?error=Username is required");
        exit();
    }
    if (empty($password)) {
        header("Location: login_role.php?error=Password is required");
        exit();
    }

    // Prepare the SQL statement
    $sql = $conn->prepare("SELECT * FROM tb_login WHERE Username = :uname LIMIT 1");
    $sql->bindParam(':uname', $username, PDO::PARAM_STR);
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_ASSOC);
    $pass = $data['Password'];
    // Check if user exists and verify the password
    if ($data) {
        if ($data['Username'] == $username && $data['Password'] == $password) {
            $_SESSION['user'] = $username;
            $_SESSION['role'] = $data['Role'];
            // Password is correct, start session
            $_SESSION['login'] = "Login successful!";
        }
        // $_SESSION["user"] = $data["Username"];
        // $_SESSION["id"] = $data["id"];
        // $_SESSION["role"] = $data["Role"];

        // Redirect to home page after successful login
        echo '
          <script>
            setTimeout(function() {
              window.location.href = "index.php";
            }, 200);
          </script>';
    } else {
        // Invalid login
        header("Location: login_role.php?error=Invalid Username or Password");
        exit();
    }
}
