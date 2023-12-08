<?php	
require('config.php');	
session_start();	
$errormsg = "";	
if (isset($_POST['email'])) {	
  $email = stripslashes($_REQUEST['email']);	
  $email = mysqli_real_escape_string($con, $email);	
  $password = stripslashes($_REQUEST['password']);	
  $password = mysqli_real_escape_string($con, $password);	
  $query = "SELECT * FROM `users` WHERE email='$email'and password='" . md5($password) . "'";	
  $result = mysqli_query($con, $query) or die(mysqli_error($con));	
  $rows = mysqli_num_rows($result);	
  if ($rows == 1) {	
    $_SESSION['email'] = $email;	
    header("Location: index.php");	
  } else {	
    $errormsg  = "Wrong";	
  }	
} else {	
}	
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: -moz-linear-gradient(45deg, #02e1ba 0%, #26c9f2 29%, #d911f2 66%, #ffa079 100%);
      background: -webkit-linear-gradient(45deg, #02e1ba 0%, #26c9f2 29%, #d911f2 66%, #ffa079 100%);
      background: linear-gradient(45deg, #02e1ba 0%, #26c9f2 29%, #d911f2 66%, #ffa079 100%);
      background-size: 400% 400%;
      -webkit-animation: Gradient 15s ease infinite;
      -moz-animation: Gradient 15s ease infinite;
      animation: Gradient 15s ease infinite;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      overflow: hidden;
      position: relative;
      color: white;
    }

    /* Background animations */
    body::before,
    body::after {
      content: "";
      width: 70vmax;
      height: 70vmax;
      position: absolute;
      background: rgba(255, 255, 255, 0.07);
      left: -20vmin;
      top: -20vmin;
      animation: morph 15s linear infinite alternate, spin 20s linear infinite;
      z-index: 1;
      will-change: border-radius, transform;
      transform-origin: 55% 55%;
      pointer-events: none;
    }

    body::after {
      width: 70vmin;
      height: 70vmin;
      left: auto;
      right: -10vmin;
      top: auto;
      bottom: 0;
      animation: morph 10s linear infinite alternate, spin 26s linear infinite reverse;
      transform-origin: 20% 20%;
    }

    @-webkit-keyframes Gradient {
      0% {
        background-position: 0 50%
      }

      50% {
        background-position: 100% 50%
      }

      100% {
        background-position: 0 50%
      }
    }

    @-moz-keyframes Gradient {
      0% {
        background-position: 0 50%
      }

      50% {
        background-position: 100% 50%
      }

      100% {
        background-position: 0 50%
      }
    }

    @keyframes Gradient {
      0% {
        background-position: 0 50%
      }

      50% {
        background-position: 100% 50%
      }

      100% {
        background-position: 0 50%
      }
    }

    @keyframes morph {
      0% {
        border-radius: 40% 60% 60% 40% / 70% 30% 70% 30%;
      }

      100% {
        border-radius: 40% 60%;
      }
    }

    @keyframes spin {
      to {
        transform: rotate(1turn);
      }
    }

    /* Login form styles */
    .login-form {
      width: 100%;
      max-width: 400px; /* Limit the form width */
      margin: 150px auto 50px auto; /* Push the form down */
      font-size: 15px;
      border-radius: 10px; /* Rounded corners */
      padding: 30px; /* Increase padding for readability */
    }

    .login-form form {
      background: #fff;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      padding: 30px;
      border: 1px solid #ddd;
      border-radius: 10px; /* Rounded corners */
    }

    .login-form h2 {
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
      color: black; /* Title text color */
    }

    .login-form .hint-text {
      color: black; /* Hint text color */
      margin-bottom: 30px;
      text-align: center;
    }

    .login-form a:hover {
      text-decoration: none;
    }

    .form-control,
    .btn {
      min-height: 38px;
      border-radius: 10px; /* Rounded corners */
    }

    .btn {
      font-size: 15px;
      font-weight: bold;
      background: linear-gradient(45deg, #02e1ba 0%, #26c9f2 29%, #d911f2 66%, #ffa079 100%); /* Apply the same gradient background as the body */
      color: white; /* Button text color */
      border: none; /* Remove border */
      transition: background 0.3s ease, color 0.3s ease;
    }
    .btn:hover {
    background: white; /* Change the gradient on hover */
    color: black; /* Change text color on hover */
    border: 2px solid #000000;
  }

    .form-check-label{color: black;}
    
  </style>
</head>

<body>
  <div class="login-form">
    <form action="" method="POST" autocomplete="off">
      <h2 class="text-center">BACHAT</h2>
      <p class="hint-text">Login Panel</p>
      <div class="form-group">
        <input type="text" name="email" class="form-control" placeholder="Email" required="required">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password" required="required">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" style="border-radius:10px;">Login</button>
      </div>
      <div class="clearfix">
        <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
      </div>
    </form><br>
    <p class="text-center"><b>Don't have an account?</b><a href="register.php" class="text-danger"> <b>Register Here</b></a></p>
  </div>
</body>
<!-- Bootstrap core JavaScript -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>
<script>
  feather.replace()
</script>
</html>
