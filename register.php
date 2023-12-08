<?php
require('config.php');
if (isset($_REQUEST['firstname'])) {
  if ($_REQUEST['password'] == $_REQUEST['confirm_password']) {
    $firstname = stripslashes($_REQUEST['firstname']);
    $firstname = mysqli_real_escape_string($con, $firstname);
    $lastname = stripslashes($_REQUEST['lastname']);
    $lastname = mysqli_real_escape_string($con, $lastname);

    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);


    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);


    $trn_date = date("Y-m-d H:i:s");

    $query = "INSERT into `users` (firstname, lastname, password, email, trn_date) VALUES ('$firstname','$lastname', '" . md5($password) . "', '$email', '$trn_date')";
    $result = mysqli_query($con, $query);
    if ($result) {
      header("Location: login.php");
    }
  } else {
    echo ("ERROR: Please Check Your Password & Confirmation password");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

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
    .signup-form {
      width: 100%;
      max-width: 400px; /* Limit the form width */
      margin: 150px auto 50px auto; /* Push the form down */
      font-size: 15px;
      border-radius: 10px; /* Rounded corners */
      padding: 30px; /* Increase padding for readability */
    }

    .signup-form form {
      background: #fff;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      padding: 30px;
      border: 1px solid #ddd;
      border-radius: 10px; /* Rounded corners */
    }

    .signup-form h2 {
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
      color: black; /* Title text color */
    }

    .signup-form .hint-text {
      color: black; /* Hint text color */
      margin-bottom: 30px;
      text-align: center;
    }

    .signup-form a:hover {
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
    }
    .form-check-label{color: black;}
    .terms-label {white-space: nowrap;}

    .btn:hover {
    background: white; /* Change the gradient on hover */
    color: black; /* Change text color on hover */
    border: 2px solid 
    }
    
    
  </style>
</head>

<body>
  <div class="signup-form">
    <form action="" method="POST" autocomplete="off">
      <h2>Register</h2>
      <div class="form-group">
        <div class="row">
          <div class="col"><input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"></div>
          <div class="col"><input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required"></div>
        </div>
      </div>
      <div class="form-group">
        <input id ="email-field" type="email" class="form-control" name="email" placeholder="Email" required="required">
        <span id="email-error">Error Msg</span>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
      </div>
      <div class="form-group">
      <label class="form-check-label terms-label">
        <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
      </div>
      
      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-lg btn-block" style="border: radius 10px; margin-top: 20px">Register</button>
      </div>
    </form>
    
    <br>
    <div class="text-center">
  <b>Already have an account?</b>
  <a class="text-success" href="login.php" style="color: #66ff00;"><b>Login Here</b></a>
</div>
</body>
<!-- Bootstrap core JavaScript -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Croppie -->
<script src="js/profile-picture.js"></script>
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