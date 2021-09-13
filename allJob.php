<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		$linkPro="employeeProfile.php";
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

if(isset($_POST["jid"])){
	$_SESSION["job_id"]=$_POST["jid"];
	header("location: jobDetails.php");
}

$sql = "SELECT * FROM job_offer WHERE valid=1"; //ORDER BY timestamp DESC
$result = $conn->query($sql);
if(isset($_POST["s_title"])){
	$t=$_POST["s_title"];
	$sql = "SELECT * FROM job_offer WHERE title='$t' and valid=1";
	$result = $conn->query($sql);
}

if(isset($_POST["s_type"])){
	$t=$_POST["s_type"];
	$sql = "SELECT * FROM job_offer WHERE type='$t' and valid=1";
	$result = $conn->query($sql);
}

if(isset($_POST["s_employer"])){
	$t=$_POST["s_employer"];
	$sql = "SELECT * FROM job_offer WHERE e_username='$t' and valid=1";
	$result = $conn->query($sql);
}

if(isset($_POST["s_id"])){
	$t=$_POST["s_id"];
	$sql = "SELECT * FROM job_offer WHERE job_id='$t' and valid=1";
	$result = $conn->query($sql);
}

if(isset($_POST["recentJob"])){
	$sql = "SELECT * FROM job_offer WHERE valid=1 ORDER BY timestamp DESC"; //ORDER BY timestamp DESC
	$result = $conn->query($sql);
}

if(isset($_POST["oldJob"])){
	$sql = "SELECT * FROM job_offer WHERE valid=1";
	$result = $conn->query($sql);
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>All Job Offers</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="ellEmployee.php">Browse all Employer</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="allEmployer.php">Browse Employee</a></li>
					<li class="nav-item" role="presentation"><a class="nav-link" href="allJob.php">Browse Job</a></li>
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
			  <div class="panel-heading"><h3>All Job Offers</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Job Id</td>
                          <td>Title</td>
                          <td>Type</td>
                          <td>Budget</td>
                          <td>Employer</td>
                          <td>Deadline</td>
                      </tr>
                      <?php 
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $type=$row["type"];
                                $budget=$row["budget"];
                                $e_username=$row["e_username"];
                                $deadline=$row["deadline"];

                                echo '
                                <form action="allJob.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    <td>'.$type.'</td>
                                    <td>'.$budget.'</td>
                                    <td>'.$e_username.'</td>
                                    <td>'.$deadline.'</td>
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
			<form action="allJob.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_title">
				  <center><button type="submit" class="btn btn-info">Search by Job Title</button></center>
				</div>
	        </form>

	        <form action="allJob.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_type">
				  <center><button type="submit" class="btn btn-info">Search by Job Type</button></center>
				</div>
	        </form>

	        <form action="allJob.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_employer">
				  <center><button type="submit" class="btn btn-info">Search by Employer</button></center>
				</div>
	        </form>

	        <form action="allJob.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_id">
				  <center><button type="submit" class="btn btn-info">Search by Job ID</button></center>
				</div>
	        </form>

	        <form action="allJob.php" method="post">
				<div class="form-group">
				  <center><button type="submit" name="recentJob" class="btn btn-warning">See all recent posted jobs first</button></center>
				</div>
	        </form>

	        <form action="allJob.php" method="post">
				<div class="form-group">
				  <center><button type="submit" name="oldJob" class="btn btn-warning">See all older posted jobs first</button></center>
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


<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="sassets/js/jquery.min.js"></script>

<?php 

if($e_username!=$username && $_SESSION["Usertype"]!=1){
	echo "<script>
		        $('#applybtn').hide();
		</script>";
} 
?>


</body>
</html>