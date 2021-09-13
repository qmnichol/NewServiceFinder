<?php include('server.php');

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">

</head>
<body>
    <div class="login-box" style="width: 30%;margin-left: 35%;margin-top: 100px;margin-bottom: 20px;">
        <div class="card card-outline card-success">
                <div class="X" >
                    <li class="nav" style="float: right; padding-right:10px"><a href="index.php"><span class="fa fa-times" style="color: black;"></span></a></li>
                </div>
                        <!-- lowgow -->
            <div class="card-header text-center">
              <a href="index.php" class="brand-link">
              <img src="asset/img/logo.png" alt="Service Finder Logo" width="200">
              </a>
              <h3>Logn Form</h3>
           </div>
                            <!-- end logo -->
                        <!-- card-body Login Form -->
                <div class="card-body">
                    <form id="loginForm" method="post" class="form-horizontal">
                        <div style="color:red;">
                            <p><?php echo $errorMsg; ?></p>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="username" name="username" required="require">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="password" name="password" required="require">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    

                        <div class="form-group">
                            <h1></h1>
                            <label class=" control-label" style="font-size:30px">Usertype</label>
                            <div class="col-sm-5"  required="require">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="usertype" value="employee" required="Please select one" /> Employee
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="usertype" value="employer" required="require" /> Employer
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 offset-3">
                                <button type="submit" name="login" class="btn btn-info btn-lg">Login</button>
                            </div>
                        </div>
            
                    </form>
                </div>
                        <!-- end card-body Login Form -->
        </div>
    </div> 
    


<script>
$(document).ready(function() {
   
    $('#loginForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    }
                }
            },
            usertype: {
                validators: {
                    notEmpty: {
                        message: 'The usertype is required'
                    }
                }
            }
        }
    });

});
</script>
<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
</body>
</html>