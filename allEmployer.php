<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		$linkPro="empolyeeProfile.php";
		$linkEditPro="editFreelancer.php";
		$linkBtn="applyJob.php";
		$textBtn="Apply for this job";
	}
	else{
		$linkPro="employerProfile.php";
		$linkEditPro="editEmployer.php";
		$linkBtn="editJob.php";
		$textBtn="Edit the job offer";
	}
}
else{
    $username="";
	//header("location: index.php");
}

if(isset($_POST["e_user"])){
	$_SESSION["e_user"]=$_POST["e_user"];
	header("location: viewEmployer.php");
}

$sql = "SELECT * FROM employer";
$result = $conn->query($sql);

if(isset($_POST["s_username"])){
	$t=$_POST["s_username"];
	$sql = "SELECT * FROM employer WHERE username='$t'";
	$result = $conn->query($sql);
}

if(isset($_POST["s_name"])){
	$t=$_POST["s_name"];
	$sql = "SELECT * FROM employer WHERE Name='$t'";
	$result = $conn->query($sql);
}

if(isset($_POST["s_email"])){
	$t=$_POST["s_email"];
	$sql = "SELECT * FROM employer WHERE email='$t'";
	$result = $conn->query($sql);
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>All Employer</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">

<style>
	body{padding-top: 3%;margin: 0;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}
</style>

</head>
<body>

<!--Navbar menu-->
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="<?php echo $linkPro; ?>">Service Finder</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="allEmployee.php">Browse all Employees</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="allEmployer.php">Browse all Employer</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="allJob.php">Browse all jobs</a></li>
                    <div class="btn-group">
                    <button type="button"   role="presentation" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color:white">
                    <i class="fas fa-user"></i><?php echo $username; ?>
                    </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Message</a></li>
                        </ul>
                    </div>
            </div>
        </div>
        <li class="nav navbar-nav nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
    </nav>
<!--End Navbar menu-->


<!--main body-->
<div style="padding:5% 3% 1% 3%;">
<div class="row">

<!--Column 1-->
	<div class="col-lg-9">

<!--Freelancer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>All Employer</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Username</td>
                          <td>Name</td>
                          <td>Email</td>
                          <td>City</td>
                          <td>Province</td>
                      </tr>
                      <?php 
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $e_username=$row["username"];
                                $Name=$row["fname"];
                                $LName=$row["lname"];
                                $Email=$row["Email"];
                                $city=$row["city"];
                                $province=$row["province"];
                                

                                echo '
                                <form action="allEmployer.php" method="post">
                                <input type="hidden" name="e_user" value="'.$e_username.'">
                                    <tr>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$e_username.'"></td>
                                    <td>'.$Name.', '.$LName.'</td>
                                    <td>'.$Email.'</td>
                                    <td>'.$city.'</td>
                                    <td>'.$province.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
                        }

                       ?>
                     </table>
              </h4></div>
			</div>
			<p></p>
		</div>
<!--End Freelancer Profile Details-->

	</div>
<!--End Column 1-->


<!--Column 2-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<form action="allEmployer.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_username">
				  <center><button type="submit" class="btn btn-info">Search by username</button></center>
				</div>
	        </form>

	        <form action="allEmployer.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_name">
				  <center><button type="submit" class="btn btn-info">Search by Name</button></center>
				</div>
	        </form>

	        <form action="allEmployer.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_email">
				  <center><button type="submit" class="btn btn-info">Search by Email</button></center>
				</div>
	        </form>

	        <p></p>
	    </div>
<!--End Main profile card-->

	</div>
<!--End Column 2-->

</div>
</div>
<!--End main body-->



<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>




</body>
</html>