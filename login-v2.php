<?php
// User Login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Establish database connection with PDO
include 'connection.php';

// Pre-fill username if cookies are set (passwords should not be stored in cookies for security reasons)
$username_value = isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : '';

// Check if the form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $remember = isset($_POST['remember']);

    if ($remember) {
        // Store only the username in the cookie, not the password
        setcookie($username, $password, time() + (86400 * 30), "/"); // 30 days
    }

    // Input validation
    if (empty($username)) {
        header("Location: login-v2.php?error=Username is Required");
        exit();
    } elseif (empty($password)) {
        header("Location: login-v2.php?error=Password is Required");
        exit();
    } else {
        // Prepare SQL statement
        $sql = $conn->prepare("SELECT * FROM tb_login WHERE Username=:uname LIMIT 1");
        $sql->bindParam(":uname", $username, PDO::PARAM_STR);
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        $enteredPassword = $_POST['password']; // The password entered by the user during login

        // Assuming you retrieved the hashed password from the database
        $storedHashedPassword = $data['Password'];

        if (password_verify($enteredPassword, $storedHashedPassword)) {
            // Start session and store user information
            $_SESSION['login'] = "Login Successfully!";
            $_SESSION["user"] = $data["Username"];
            $_SESSION["id"] = $data["id"];
            $_SESSION["role"] = $data["Role"];

            echo '
              <script>
                setTimeout(function() {
                  window.location.href = "index.php";
                }, 200);
              </script>';
        } else {
            // Incorrect username or password
            header("Location: login-v2.php?error=Incorrect Username or Password");
            exit();
        }

        // Check if user exists and verify password
        // if ($data && password_verify($password, $data['Password'])) {
        // Start session and store user information
        //     $_SESSION['login'] = "Login Successfully!";
        //     $_SESSION["user"] = $data["Username"];
        //     $_SESSION["id"] = $data["id"];
        //     $_SESSION["role"] = $data["Role"];

        //     echo '
        //       <script>
        //         setTimeout(function() {
        //           window.location.href = "index.php";
        //         }, 200);
        //       </script>';
        // } else {
        // Incorrect username or password
        //     header("Location: login-v2.php?error=Incorrect Username or Password");
        //     exit();
        // }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Get cookie -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check if there's a username cookie
            const usernameCookie = getCookie('username');
            const passwordCookie = getCookie('password');

            if (usernameCookie) {
                $('#username').val(usernameCookie);
            }

            $('#username').on('input', function() {
                if ($(this).val() === usernameCookie) {
                    $('#password').val(passwordCookie);
                } else {
                    $('#password').val(''); // Clear password if username doesn't match
                }
            });

            function getCookie(name) {
                let cookieArr = document.cookie.split(";");
                for (let i = 0; i < cookieArr.length; i++) {
                    let cookiePair = cookieArr[i].split("=");
                    if (name === cookiePair[0].trim()) {
                        return decodeURIComponent(cookiePair[1]);
                    }
                }
                return null;
            }
        });
    </script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-header text-center">
                <img src="images/SiSlogo.png" alt="" class="profile-user-img">
            </div>
            <div class="card-body">
                <form action="login.php" method="post">
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_GET['error'] ?>
                        </div>
                    <?php } ?>

                    <?php if (isset($data['Username']) && isset($data['Password'])) {  ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['login'] ?>
                        </div>
                    <?php } ?>
                    <!-- <button type="button" class="btn btn-success toastsDefaultSuccess">
                        Launch Success Toast
                    </button> -->

                    <div class="input-group mb-3">
                        <input type="text" id="username" class="form-control" name="username" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                            Required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember"
                                    <?= isset($_COOKIE['username']) ? 'checked' : '' ?>>
                                <label for="remember">
                                    <p>Remember Me</p>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="mt-4 d-flex justify-content-center">
                        <button type="submit" class="btn text-white px-4"
                            style="background-color: #152550;">Login</button>
                    </div>
                    <!-- /.col -->
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>


    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('.toastsDefaultSuccess').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
        });
    </script>

    <!-- Cookie -->
    <script>
        $(document).ready(function() {
            $("#username").keyup(function() {
                function getCookie(cookieName) {
                    let cookie = {};
                    document.cookie.split(';').forEach(function(el) {
                        let [key, value] = el.split('=');
                        cookie[key.trim()] = value;
                    })
                    return cookie[cookieName];
                }
                let u = $(this).val();
                if (u !== undefined) {
                    $("#password").val(getCookie(u));
                }
            });
        });
    </script>
</body>

</html>