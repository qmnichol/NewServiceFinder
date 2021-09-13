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

if(isset($_SESSION["job_id"])){
    $job_id=$_SESSION["job_id"];
}
else{
    $job_id="";
    //header("location: index.php");
}

if(isset($_POST["f_user"])){
	$_SESSION["f_user"]=$_POST["f_user"];
	header("location: viewFreelancer.php");
}

if(isset($_POST["c_letter"])){
	$_SESSION["c_letter"]=$_POST["c_letter"];
	header("location: coverLetter.php");
}


if(isset($_POST["f_hire"])){
	$f_hire=$_POST["f_hire"];
	$f_price=$_POST["f_price"];
	$sql = "INSERT INTO selected (f_username, job_id, e_username, price, valid) VALUES ('$f_hire', '$job_id', '$username','$f_price',1)";
    
    $result = $conn->query($sql);
    if($result==true){
    	$sql = "DELETE FROM apply WHERE job_id='$job_id'";
		$result = $conn->query($sql);
		if($result==true){
			$sql = "UPDATE job_offer SET valid=0 WHERE job_id='$job_id'";
			$result = $conn->query($sql);
			if($result==true){
				header("location: jobDetails.php");
			}
		}
    }
}


if(isset($_POST["f_done"])){
	$f_done=$_POST["f_done"];
	$sql = "UPDATE selected SET valid=0 WHERE job_id='$job_id'";
	$result = $conn->query($sql);
    if($result==true){
    	header("location: jobDetails.php");
    }
}


$sql = "SELECT * FROM job_offer WHERE job_id='$job_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$e_username=$row["e_username"];
        $title=$row["title"];
        $type=$row["type"];
        $description=$row["description"];
        $budget=$row["budget"];
        $skills=$row["skills"];
        $special_skill=$row["special_skill"];
        $deadline=$row["deadline"];
        $jv=$row["valid"];
        $deadline=$row["deadline"];
        }
} else {
    echo "0 results";
}

$_SESSION["msgRcv"]=$e_username;



 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Job Details</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="allJob.php">Browse all jobs</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php">Browse Employer</a></li>
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
			  <div class="panel-heading"><h3>Job Offer Details</h3></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Job Title</div>
			  <div class="panel-body"><h4><?php echo $title; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Job Type</div>
			  <div class="panel-body"><h4><?php echo $type; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Job Description</div>
			  <div class="panel-body"><h4><?php echo $description; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Budget</div>
			  <div class="panel-body"><h4><?php echo $budget; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Required Skills</div>
			  <div class="panel-body"><h4><?php echo $skills; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Special Requirement</div>
			  <div class="panel-body"><h4><?php echo $special_skill; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Deadline</div>
			  <div class="panel-body"><h4><?php echo $deadline; ?></h4></div>
			</div>
			<a href="<?php echo $linkBtn; ?>" id="applybtn" type="button" class="btn btn-warning btn-lg"><?php echo $textBtn; ?></a>
			<p></p>
		</div>
<!--End Freelancer Profile Details-->

<!--Freelancer Profile Details-->	
		<div id="applicant" class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>Applicants for this job</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                  <tr>
                      <td>Applicant's username</td>
                      <td>Bid</td>
                  </tr>
                    <?php 
                    $sql = "SELECT * FROM apply WHERE job_id='$job_id' ORDER BY bid";
					$result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        $f_username=$row["f_username"];
                        $bid=$row["bid"];
                        $cover_letter=$row["cover_letter"];

                        echo '
                        <form action="jobDetails.php" method="post">
                        <input type="hidden" name="f_user" value="'.$f_username.'">
                            <tr>
                            <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                            <td>'.$bid.'</td>
                            </form>
                            <form action="jobDetails.php" method="post">
                            <input type="hidden" name="c_letter" value="'.$cover_letter.'">
                            <td><input type="submit" class="btn btn-link btn-lg" value="cover letter"></td>
                            </form>
                            <form action="jobDetails.php" method="post">
                            <input type="hidden" name="f_hire" value="'.$f_username.'">
                            <input type="hidden" name="f_price" value="'.$bid.'">
                            <td><input type="submit" class="btn btn-link btn-lg" value="Hire"></td>
                            </tr>
                        </form>';

                        }
                    } else {
                      $sql = "SELECT * FROM selected WHERE job_id='$job_id'";
					  $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $f_username=$row["f_username"];
                                $bid=$row["price"];
                                $v=$row["valid"];

                                if ($v==0) {
                                	$tc="Job ended";
                                	$tv="";
                                }else{
                                	$tc="End Job";
                                	$tv="f_done";
                                }

                                echo '
                                <form action="jobDetails.php" method="post">
                                <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <tr>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    <td>'.$bid.'</td>
                                    </form>
                                    <form action="jobDetails.php" method="post">
                                    <input type="hidden" name="'.$tv.'" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$tc.'"></td>
                                    </tr>
                                </form>

                                                             
                                ';

                                }
                        } else {
                            echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
                        }
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

<?php 
$sql = "SELECT * FROM employer WHERE username='$e_username' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$e_Name=$row["fname"];
        $e_LName=$row["lname"];
        $Email=$row["Email"];
        $contact_no=$row["mnumber"];
        $address=$row["address"];
        $city=$row["city"];
        $province=$row["province"];

        }
} else {
    echo "0 results";
}

?>

<!--Column 2-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<img src="image/img04.jpg">
			<h2><?php echo $e_Name; ?>, <?php echo $e_LName; ?></h2>
			<p><span class="glyphicon glyphicon-user"></span> <?php echo $e_username; ?></p>
	        <center><a href="sendMessage.php" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span>  Send Message</a></center>
	        <p></p>
	    </div>
<!--End Main profile card-->


<!--Contact Information-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>Contact Information</h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Email</div>
			  <div class="panel-body"><?php echo $Email; ?></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Mobile</div>
			  <div class="panel-body"><?php echo $contact_no; ?></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Address</div>
			  <div class="panel-body"><?php echo $address; ?>, <?php echo $city; ?>, <?php echo $province; ?></div>
			</div>
		</div>
<!--End Contact Information-->
	</div>
<!--End Column 2-->


</div>
</div>
<!--End main body-->



<!--End Footer-->






<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<?php 

if($e_username!=$username && $_SESSION["Usertype"]!=1){
	echo "<script>
		        $('#applybtn').hide();
		</script>";
} 

if($_SESSION["Usertype"]==1 && $jv==0){
	echo "<script>
		        $('#applybtn').hide();
		</script>";
} 

if($e_username!=$username){
	echo "<script>
		        $('#applicant').hide();
		</script>";
}


?>


</body>
</html>