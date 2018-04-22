<?php 
session_start();
include('config.php');
$errors = array();
//connect to the database
// $db=mysqli_connect('localhost', 'root','','judgingsystem');
// if the register button is clicked
if(isset($_POST['register'])){
	$lastname = mysqli_real_escape_string($dbcon,$_POST['lastname']);
	$firstname = mysqli_real_escape_string($dbcon,$_POST['firstname']);
	$username = mysqli_real_escape_string($dbcon,$_POST['username']);
	$section = mysqli_real_escape_string($dbcon,$_POST['cboxSection']);
	$password = mysqli_real_escape_string($dbcon, $_POST['password']);
	
	// ensure that form fields are filled properly
	if (empty($lastname)){
		array_push($errors, "Lastname is required!");
	}
	if (empty($firstname)){
		array_push($errors, "Firstname is required!");
	}
	if (empty($username)){
		array_push($errors, "Username is required!");
	}
	if (empty($password)){
		array_push($errors, "Password is required!");
	}
	//if there are no errors, save user to data base
	if (count($errors) == 0){
		
		$password =  md5($password); //encrypt password before storing

		$sql = "INSERT INTO user (LastName, Firstname, UserName, Password, SectionID) VALUES ('$lastname','$firstname','$username','$password', '$section')";
		mysqli_query($dbcon,$sql);

		$query= "SELECT * FROM  user where UserName='$username' AND Password ='$password'";
		$result = mysqli_query($dbcon, $query);
		while ($row = mysqli_fetch_array($result)) {
			$user = $row['UserID'];
		}
		
		$_SESSION['user'] = $user;
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in.";
		header('location: home.php'); //redirect to home page 
	}
}
//log user in from login page
if (isset($_POST['login'])){
	$username = mysqli_real_escape_string($dbcon,$_POST['username']);
	$password = mysqli_real_escape_string ($dbcon,$_POST['password']);

	//ensure that form fields are filled properly
	if (empty($username)){
		array_push($errors, "Username is required!");
	}
	if (empty($password)){
		array_push($errors, "Password is required!");
	}
	if ($username == 'admin' && $password == 'admin') {
		// $_SESSION['user'] = $user;
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in.";
		header('location: index-admin.php');
	}
	if (count($errors) == 0){
		$password = md5($password); //encrypt password before comparing 

		$query= "SELECT * FROM  user where UserName='$username' AND Password ='$password'";
		$result = mysqli_query($dbcon, $query);
		while ($row = mysqli_fetch_array($result)) {
			$user = $row['UserID'];
		}
			
		if (mysqli_num_rows($result) == 1){
			$_SESSION['user'] = $user;
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in.";
			header('location: home.php');
		}
		else{
			array_push($errors, "Wrong Username/password combination!");

		}
	}
}
//logout
if (isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['user']);
	header('location:login.php');
} 
?>
