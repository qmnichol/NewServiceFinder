<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
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

$sql = "SELECT * FROM apply WHERE job_id = '$job_id' and f_username = '$username' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $msg="You have already applied for this job. You cannot apply again.";
} else {
    $msg="Not applied";
}


if(isset($_POST["apply"]) && $msg==""){
    $cover_letter=test_input($_POST["cover_letter"]);
    $bid=test_input($_POST["bid"]);

    $sql = "INSERT INTO apply (f_username, job_id, bid, cover_letter) VALUES ('$username', '$job_id', '$bid','$cover_letter')";
    $result = $conn->query($sql);
    if($result==true){
        header("location: allJob.php");
    }
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Apply for Job</title>
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
            </div>
        </div>
        <li class="nav navbar-nav nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
    </nav>
<!--End Navbar menu-->

<!-- apply -->
<div class="container" style="margin: 5% 20% 2% 30%">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h2>Apply for Job,  <?php echo $job_id; ?></h2>
                </div>

                <form id="registrationForm" method="post" class="form-horizontal">
                <?php echo $msg; ?>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Write A Cover Letter</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="17" name="cover_letter"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Job ID</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="job_id" value="<?php echo $job_id; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">User</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Place a bid</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="bid" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                        <button type="submit" name="apply" class="btn btn-info btn-lg">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
<!-- end apply -->


<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="sassets/js/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#registrationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cover: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            bid: {
                validators: {
                    notEmpty: {
                        message: 'The bid is required and cannot be empty'
                    },
                    stringLength: {
                        max: 11,
                        message: 'The number is too big'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The number is not valid'
                    }
                }
            }
        }
    });
});
</script>

</body>
</html>