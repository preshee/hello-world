<?php
	require_once('connect.php');

	function register($firstname, $lastname, $email, $username, $password, $confirm_password){
		global $con;
		$password = md5($password);
		$query = "insert into users(id, firstname, lastname, username, email, password)
					 values(null, '$firstname', '$lastname','$username', '$email', '$password')";

		$operation = mysqli_query($con, $query);

		return $operation;
	}

	function login($email, $password){
		global $con;
		$password = md5($password);
		$query = "select * from users where email='$email' and password='$password' limit 1";

		$operation = mysqli_query($con, $query);
		$result = mysqli_fetch_array($operation);
		if(is_null($result)){
			return false;
		}else{
			return $result;
		}
		

	}



?>