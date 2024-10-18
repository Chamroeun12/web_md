<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .box{
            width:400px;
            height:300px;
            margin:0 auto;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Login</h2>
    <form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>

    <p class="text-break">
        <?php 
        if(isset($_POST['user'])){
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            if(!isset($_COOKIE[$user])){
                setcookie($user,$pass,(time()+8400)*30);

                echo "<h3>Username is: " . $user . "</h3>";
                echo "<h3>Password is: " . $pass . "</h3>";
            }else{
                echo "<h3>Username is: " . $user . "</h3>";
                echo "<h3>Password is: " . $_COOKIE[$user] . "</h3>";
            }

            
        }
        ?>
    </p>

    </div>
<script>
    $(document).ready(function(){
        $("#exampleInputEmail1").keyup(function(){
            function getCookie(cookieName) {
            let cookie = {};
            document.cookie.split(';').forEach(function(el) {
                let [key,value] = el.split('=');
                cookie[key.trim()] = value;
            })
            return cookie[cookieName];
            }
            let u = $(this).val();
            if (u !== undefined) {
                $("#exampleInputPassword1").val(getCookie(u));
            } 
        });
    });
</script>  
</body>
</html>