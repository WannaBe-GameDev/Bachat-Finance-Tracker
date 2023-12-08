<?php
include("session.php");
$update = false;
$del = false;
$incomeamount = "";
$incomedate = date("Y-m-d");
$incomesource = "Salary"; // Default income source

if (isset($_POST['add'])) {
    $incomeamount = $_POST['incomeamount'];
    $incomedate = $_POST['incomedate'];
    $incomesource = $_POST['incomesource'];

    $income = "INSERT INTO income (user_id, income_date, income) VALUES ('$userid', '$incomedate', '$incomeamount')";
    $result = mysqli_query($con, $income) or die("Something Went Wrong!");
    $notification = "Income Added!";
    header('location: income_page.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include necessary meta tags, CSS, and JS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/feather.min.js"></script>
</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
        <div class="user">
            <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="120">
            <h5><?php echo $username ?></h5>
            <p><?php echo $useremail ?></p>
        </div>
            <!-- Sidebar content -->
            <div class="sidebar-heading">Management</div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action"><span data-feather="home"></span> Dashboard</a>
                <a href="add_expense.php" class="list-group-item list-group-item-action "><span data-feather="plus-square"></span> Add Expenses</a>
                <a href="income_page.php" class="list-group-item list-group-item-action sidebar-active "><span data-feather="plus-square"></span> Add Income</a>
                <a href="manage_expense.php" class="list-group-item list-group-item-action "><span data-feather="dollar-sign"></span> Manage Expenses</a>
                <a href="manage_expense.php" class="list-group-item list-group-item-action "><span data-feather="dollar-sign"></span> Manage Income</a>
            </div>
            <div class="sidebar-heading">Settings</div>
            <div class="list-group list-group-flush">
                <a href="profile.php" class="list-group-item list-group-item-action"><span data-feather="user"></span> Profile</a>
                <a href="logout.php" class="list-group-item list-group-item-action"><span data-feather="power"></span> Logout</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light  border-bottom">


<button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
  <span data-feather="menu"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="img img-fluid rounded-circle" src="<?php echo $userprofile ?>" width="25">
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="profile.php">Your Profile</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
</div>
</nav>

            <div class="container">
                <h3 class="mt-4 text-center">Add Your Income</h3>
                <hr>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md" style="margin:0 auto;">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="incomeamount" class="col-sm-6 col-form-label"><b>Enter Income Amount(₹)</b></label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control col-sm-12" value="<?php echo $incomeamount; ?>" id="incomeamount" name="incomeamount" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="incomedate" class="col-sm-6 col-form-label"><b>Date</b></label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control col-sm-12" value="<?php echo $incomedate; ?>" name="incomedate" id="incomedate" required>
                                </div>
                            </div>
                            <!-- Additional form elements go here -->
                            <div class="form-group row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" name="add" class="btn btn-lg btn-block btn-success" style="border-radius: 0%;">Add Income</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        feather.replace();
    </script>
</body>

</html>