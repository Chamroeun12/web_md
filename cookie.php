<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <script src = "//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
       

body {
  background: #eee !important;  
}

.wrapper {  
  margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
  .checkbox {
    margin-bottom: 30px;
  }

  .checkbox {
    font-weight: normal;
  }

  .form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    @include box-sizing(border-box);

    &:focus {
      z-index: 2;
    }
  }

  input[type="text"] {
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
  }

  input[type="password"] {
    margin-bottom: 20px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
}

    </style>
</head>
<body>
    
    <div class="wrapper">
    <form class="form-signin" Method="POST">       
      <h2 class="form-signin-heading">Group 1</h2>
      <input type="text" class="form-control mt-3" name="user" id="username" placeholder="Input Username"  />
      <input type="password" class="form-control mt-3" name="pass" id="password" placeholder="Input Password" />      
      <input type="hidden" name="remember" value="1">
      <input class="btn btn-primary mt-3" type="submit" value="Login">  
    </form>
  </div>
  
    <script>
  
       $(document).ready(function(){
            $("#username").keyup(function(){
                var user = $("#username").val();
                if(user=="Piti"){
              $("#password").val("<?php echo $_COOKIE['Piti'];?>");
        
                }
            });
        })
    </script>
</body>
</html>
<?php
if(isset($_POST['user'])){
    $username= $_POST['user'];
    $password=$_POST['pass'];
    if($username=="Piti" && $password=="123"){
        if(isset($_POST['remember'])){
            setcookie($username,$password,time()+(86400*7));
        }
    }
}
?>