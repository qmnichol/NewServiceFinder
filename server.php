<?php
session_start();


// Create connection
$conn = new mysqli("localhost", "root", "", "service_finder");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 //echo "Connected successfully";
/*$sql = "SELECT * FROM employer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " " . $row["username"]. " " . $row["password"]. " " . $row["Name"]. "<br>";
    }
} else {
    echo "0 results";
}*/

$username="";
$password="";
$profilepic="";
$fname="";
$mname="";
$lname="";
$Email="";
$Gender="";
$Age="";
$Bdate="";
$mnumber="";
$address="";
$zipcode="";
$city="";
$province="";
$validID="";
$NC="";
$skill="";
$education="";
$experience="";
$usertype="";



if(isset($_POST["register"])){
	$username=test_input($_POST["username"]);
	$password=test_input($_POST["password"]);
	$profilepic=test_input($_POST["profilepic"]);
	$fname=test_input($_POST["fname"]);
	$mname=test_input($_POST["mname"]);
	$lname=test_input($_POST["lname"]);
	$Email=test_input($_POST["Email"]);
	$Gender=test_input($_POST["Gender"]);
	$Age=test_input($_POST["Age"]);
	$Bdate=test_input($_POST["Bdate"]);
	$mnumber=test_input($_POST["mnumber"]);
	$address=test_input($_POST["address"]);
	$zipcode=test_input($_POST["zipcode"]);
	$city=test_input($_POST["city"]);
	$province=test_input($_POST["province"]);
	$validID=test_input($_POST["validID"]);
	$NC=test_input($_POST["NC"]);
	$skill=test_input($_POST["skill"]);
	$education=test_input($_POST["education"]);
	$experience=test_input($_POST["experience"]);
	$proTitle=test_input($_POST["proTitle"]);
	$usertype=test_input($_POST["usertype"]);

	if ($usertype=="employee") {
		$sql = "SELECT * FROM employe,employer WHERE employe.username = '$username' OR employer.username = '$username'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION["errorMsg2"]="The username is already taken";
		}
		else{
			unset($_SESSION["errorMsg2"]);
			$sql = "INSERT INTO employe (username, password, profilepic, fname, mname, lname, Email, Gender, Age, Bdate, mnumber, address, zipcode, city, province, validID, NC, skill, education, experience, proTitle) VALUES ('$username', '$password', '$profilepic', '$fname', '$mname', '$lname', '$Email', '$Gender', '$Age', '$Bdate', '$mnumber', '$address', '$zipcode', '$city', '$province', '$validID', '$NC', '$skill', '$education', '$experience', '$proTitle')";
			$result = $conn->query($sql);
			if($result==true){
				$_SESSION["Username"]=$username;
				$_SESSION["Usertype"]=1;
				header("location: employeeProfile.php");
			}

		}
	}
	else{
		$sql = "SELECT * FROM employe,employer WHERE employe.username = '$username' OR employer.username = '$username'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION["errorMsg2"]="The username is already taken";
		}
		else{
			unset($_SESSION["errorMsg2"]);
			$sql = "INSERT INTO employer (username, profilepic, fname, mname, lname, Email, Gender, Age, Bdate, mnumber, zipcode, city, province, validID, password, address, NC, skill, education, experience, proTitle) VALUES ('$username', '$profilepic', '$fname', '$mname', '$lname', '$Email', '$Gender', '$Age', '$Bdate', '$mnumber', '$zipcode', '$city', '$province', '$validID', '$password', '$address', '$NC', '$skill', '$education', '$experience', '$proTitle')";
			$result = $conn->query($sql);
			if($result==true){
				$_SESSION["Username"]=$username;
				$_SESSION["Usertype"]=2;
				header("location: employerProfile.php");
			}

		}
	}
}

if(isset($_POST["login"])){
	session_unset();
	$username=test_input($_POST["username"]);
	$password=test_input($_POST["password"]);
	$usertype=test_input($_POST["usertype"]);

	if ($usertype=="employee") {
		$sql = "SELECT * FROM employe WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$_SESSION["Username"]=$username;
			$_SESSION["Usertype"]=1;
			unset($_SESSION["errorMsg"]);
			header("location: employeeProfile.php");
		}
		else{
			$_SESSION["errorMsg"]="username/password is incorrect";
		}
	}
	else{
		$sql = "SELECT * FROM employer WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$_SESSION["Username"]=$username;
			$_SESSION["Usertype"]=2;
			unset($_SESSION["errorMsg"]);
			header("location: employerProfile.php");
		}
		else{
			$_SESSION["errorMsg"]="username/password is incorrect";
		}
	}
	
}


if(isset($_SESSION["errorMsg"])){
	$errorMsg=$_SESSION["errorMsg"];
	unset($_SESSION["errorMsg"]);
}
else{
	$errorMsg="";
}

if(isset($_SESSION["errorMsg2"])){
	$errorMsg2=$_SESSION["errorMsg2"];
	unset($_SESSION["errorMsg2"]);
}
else{
	$errorMsg2="";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//$conn->close();
?>