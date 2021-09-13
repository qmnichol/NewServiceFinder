<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
	$username="";
	//header("location: index.php");
}

if(isset($_POST["jid"])){
	$_SESSION["id"]=$_POST["jid"];
	header("location: jobDetails.php");
}

if(isset($_POST["e_user"])){
	$_SESSION["e_user"]=$_POST["e_user"];
	header("location: viewEmployer.php");
}


$sql = "SELECT * FROM employe WHERE username='$username' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$fname=$row["fname"];
        $lname=$row["lname"];
        $address=$row["address"];
        $zipcode=$row["zipcode"];
        $city=$row["city"];
        $province=$row["province"];
        $Email=$row["Email"];
		    $mnumber=$row["mnumber"];
        $proTitle=$row["proTitle"];
        $education=$row["education"];
        $skill=$row["skill"];
        $experience=$row["experience"];
	    }
} else {
    echo "0 results";
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee profile</title>
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
        <div class="container"><a class="navbar-brand logo" href="employeeProfile.php">Service Finder</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <a class="btn ml-auto" role="button" href="postJob.php" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,255,4,0.31416316526610644) 0%, rgba(0,255,124,1) 63%); color: white">Post a Job</a></div>
            </div>
            
        </div>
        <li class="nav navbar-nav nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
    </nav>
<!--End Navbar menu-->
<!--main body-->
<div style="padding:3% 3% 2% 3%; ">
	<div class="row" >

	<!--Column 1-->
	<div class="col-lg-3" >

	<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<img src="image/img04.jpg">
			<h2><?php echo $fname ?>, <?php echo $lname; ?></h2>
			<p><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?></p>
	    </div>
		<!--End Main profile card-->

	<!--Contact Information-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>Contact Information</h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Email</div>
			  <div class="panel-body">   <?php echo $Email; ?></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Mobile</div>
			  <div class="panel-body">   <?php echo $mnumber; ?></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Address</div>
			  <div class="panel-body">   <?php echo $address; ?>, <?php echo $city; ?>, <?php echo $province; ?></div>
			</div>
		</div>
	<!--End Contact Information-->
	</div>
<!--End Column 1-->

<!--Column 2-->
	<div class="col-lg-9">

<!--Freelancer Profile Details-->	
<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3>Freelancer Profile Details</h3></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Professional Title</div>
			  <div class="panel-body"><h4><?php echo $proTitle; ?></h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Skills</div>
			  <div class="panel-body"><h4><?php echo $skill; ?></h4></div>
			</div>
			
			<div class="panel panel-primary">
			  <div class="panel-heading">Education</div>
			  <div class="panel-body"><h4><?php echo $education; ?></h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Experience</div>
			  <div class="panel-body"><h4><?php echo $experience; ?></h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Current jobs</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Job Id</td>
                          <td>Title</td>
                          <td>Employer</td>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.f_username='$username' AND selected.valid=1 ORDER BY job_offer.deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $e_username=$row["e_username"];
                                $deadline=$row["deadline"];

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="employerProfile.php" method="post">
                                    <input type="hidden" name="e_user" value="'.$e_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$e_username.'"></td>
                                    <td>'.$deadline.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Previous Works</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Job Id</td>
                          <td>Title</td>
                          <td>Employer</td>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.f_username='$username' AND selected.valid=0 ORDER BY job_offer.deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $e_username=$row["e_username"];
                                $timestamp=$row["timestamp"];

                                echo '
                                <form action="freelancerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="freelancerProfile.php" method="post">
                                    <input type="hidden" name="e_user" value="'.$e_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$e_username.'"></td>
                                    <td>'.$timestamp.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div>
		</div>
<!--End Freelancer Profile Details-->
	</div>
<!--End Column 2-->
</div>
</div>
<!--End main body-->

<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="sassets/js/jquery.min.js"></script>
</body>
</html>