<?php include('server.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
<style>
   .img-placeholder {
  width: 56%;
  color: white;
  height: 100%;
  background: black;
  opacity: .7;
  height:200px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: none;
  
}
.img-placeholder h4 {
  margin-top: 40%;
  color: white;
}
.img-div:hover .img-placeholder {
  display: block;
  cursor: pointer;
}
</style>
</head>
<body>
<!--Navbar menu-->
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="index.php">Service Finder</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php">Explore</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php">Login</a></li>
                    <div class="btn-group">
                    <button type="button" role="presentation" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color:white">
                        Register
                    </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="register.php">Employer Registration</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="eregister.php">Employee Registration</a></li>
                        </ul>
                    </div>

                    <div class="collapse navbar-collapse" id="navcol-1">
                        <a class="btn ml-auto" role="button" href="login.php" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(0,255,4,0.31416316526610644) 0%, rgba(0,255,124,1) 63%); color: white">Post a Job</a></div>
                        
                    
            </div>
        </div>
    </nav>        
<!--End Navbar menu-->
<!-- Registration card -->
<div class="login-box" style="margin-top: 100px;">
    <section class="content">
        <div class="container-fluid">
            <!-- card -->
            <div class="card">
            
                <h1><strong><center>Registraion Form</center></strong></h1>
                
                <form action="" method="post" class="form-horizontal">
                <div style="color:red;">
                    <p><?php echo $errorMsg; ?></p>
                </div>
                    <div class="col-md-12">
                        <div class="row">
                            <!-- Profile Picture -->
                            <div class="col-md-3">
                                <div class="form-group text-center" style="">
                                    <span class="img-div">
                                       <div class="text-center img-placeholder"  onClick="triggerClick()">
                                             <h4>Upload image</h4>
                                       </div>
                                       <img src="asset/img/beard.png" onClick="triggerClick()" id="profileDisplay" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                                    </span>
                                    <input type="file" name="profilepic" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required accept='image/*' value="<?php echo $profilepic; ?>" >
                                    <p>Please Attach Photo</p>
                                </div>
                            </div>
                            <!-- End Profile Picture -->
                            <!-- Registraion Form -->
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" class="form-control" name="fname" placeholder="first name" required="require" value="<?php echo $fname; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Middle Name</label>
                                            <input type="text" class="form-control" name="mname" placeholder="first name" required="require" value="<?php echo $mname; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control" name="lname" placeholder="first name" required="require" value="<?php echo $lname; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                         <label for="">Gender</label>
                                         <div class="form-control">
                                             <input type="radio" name="Gender" value="Male" /> Male                                                                                     
                                             <input type="radio" name="Gender" value="Female"/> Female
                                         </div>
                                          
                                      </div>
                                   </div>

                                   <div class="col-sm-2">
                                      <div class="form-group">
                                         <label for="">Age</label>
                                         <input type="text" class="form-control" name="Age" placeholder="Age" required="require" value="<?php echo $Age; ?>">
                                      </div>
                                   </div>

                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label for="">Birthday</label>
                                         <input type="date" class="form-control" name="Bdate" required="require" value="<?php echo $Bdate; ?>">
                                      </div>
                                   </div>

                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label for="">Contact</label>
                                         <input type="text" class="form-control" name="mnumber" placeholder="contact" required="require" value="<?php echo $mnumber; ?>">
                                      </div>
                                   </div>

                                   <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="Email" placeholder="Email" required="require" value="<?php echo $Email; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <label for="">Addres</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="address" placeholder="Barangay" required="require" value="<?php echo $address; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="city" placeholder="City" required="require" value="<?php echo $city; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="zipcode" placeholder="Zip Code" required="require" value="<?php echo $zipcode; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="province" placeholder="Province" required="require" value="<?php echo $province; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 

                                   <div class="col-md-12">
                                        <div class="card-header">
                                            <span class="fa fa-key"> Valid ID/Brgy Clearance</span>
                                        </div>
                                        <div class="form-group">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="validID" id="exampleInputFile" value="<?php echo $validID; ?>">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                            </div>
                                        </div>
                                   </div>


                                   <!-- Hide -->
                                
                                   <div class="from-group" style="display: none">
                                        <label>
                                            <input type="radio" name="education" value="Please add infromation" checked /> Please add infromation
                                        </label>
                                        <label>
                                            <input type="radio" name="skill" value="Please add infromation" checked /> Please add infromation
                                        </label>
                                        <label>
                                            <input type="radio" name="experience" value="Please add infromation" checked /> Please add infromation
                                        </label>
                                        <label>
                                            <input type="radio" name="proTitle" value="Please add infromation" checked /> Please add infromation
                                        </label>
                                        <label>
                                            <input type="radio" name="NC" value="Please add infromation" checked /> Please add infromation
                                        </label>
                                    </div>


                                   <!-- end hide -->


                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <span>Account</span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo $username; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="password" class="form-control" name="password" placeholder="password" value="<?php echo $password; ?>">
                                            </div>
                                        </div>
                                    </div>
<!-- Hide the radio button-->
                                    <div class="form-group " style="display: none">
                                        <label class="col-sm-4 control-label">Usertype</label>
                                        <div class="col-sm-5">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="usertype" value="employee" style="visibility: hidden" /> Employee
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="usertype" value="employer" checked /> Employer
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                                            <button type="submit" name="register" class="btn btn-info btn-lg">Register</button>
                                        </div>
                                    </div>
<!--End Hide radio button-->
                                </div>
                            </div>
                            <!-- End Registraion Form -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card -->
        </div>
    </section>
</div>
<!-- End Registration card -->



<script>

    function triggerClick(e) {
         document.querySelector('#profileImage').click();
        }
         function displayImage(e) {
                     if (e.files[0]) {
                     var reader = new FileReader();
                     reader.onload = function(e){
                     document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                         }
                     reader.readAsDataURL(e.files[0]);
                  }
          }
</script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>