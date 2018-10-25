
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	</head>
<body style="background-color: rgb(66, 78, 90); margin-top: 120px; margin-bottom: 100px">
	<div class="container">
	<div class="row">
	<div class="col-md-4 col-xs-12"></div>
	<div class="col-md-4 col-xs-12" style="background-color: white; padding-top: 30px; padding-bottom: 30px;">
	<form action="" method="post">
		<div class="form-group text-center">
			<label class="label label-default">Register on Demo</label>
		</div>
		<?php
			require_once('connect.php');
			require_once('functions.php');
			require_once('validate.php');

			$validate = new Validate;
			$errors = [];
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				// echo "<h1>post request was made</h1>";
				$firstname = $_POST["firstname"];
				$lastname = $_POST["lastname"];
				$email = $_POST["email"];
				$username = $_POST["username"];
				$password = $_POST["password"];
				$confirm_password = $_POST["confirm_password"];
				$validate->isEmpty('firstname', $firstname);
				$validate->isEmpty('lastname', $lastname);
				$validate->isEmpty('email', $email);
				$validate->isEmpty('username', $username);
				$validate->isEmpty('password', $password);
				$validate->isEmpty('confirm_password', $confirm_password);
				$validate->minLength('username', $username, 6);
				$validate->minLength('password', $password, 6);
				$validate->minLength('confirm password', $confirm_password, 6);
				$validate->doesPasswordMatch($password, $confirm_password);
				$errors = $validate->getErrors();

				if(count($errors) == 0){
					// $register = 
					if(register($firstname, $lastname, $email, $username, $password, $confirm_password)){
						echo "<div class='alert alert-success'>Registration Sucessful</div>";
					}else{
						echo "<div class='alert alert-danger'>Registration Failed! Something went wrong</div>";
					}
				}else{
					echo "<div class='alert alert-danger'>Registration Failed</div>";
				}
				
			}
		?>
		<div class="form-group">
		<input class="form-control" type="text" name="firstname" placeholder="firstname">
			<span class="error"><?php echo isset($errors['firstname']) ? $errors['firstname']: ''; ?></span>
		</div>
		<div class="form-group">
		<input class="form-control" type="text" name="lastname" placeholder="lastname">
		<span class="error"><?php echo isset($errors['lastname']) ? $errors['lastname']: ''; ?></span>
		</div>
		<div class="form-group">	
		<input class="form-control" type="text" name="username" placeholder="username">
		<span class="error"><?php echo isset($errors['username']) ? $errors['username']: ''; ?></span>
	</div><div
	 class="form-group">
		<input class="form-control" type="text" name="email" placeholder="email">
		<span class="error"><?php echo isset($errors['email']) ? $errors['email']: ''; ?></span>
	</div>
	<div class="form-group">
		<input class="form-control" type="password" name="password" placeholder="password">
		<span class="error"><?php echo isset($errors['password']) ? $errors['password']: ''; ?></span>
	</div>
	<div class="form-group">
		<input class="form-control" type="password" name="confirm_password" placeholder="confirm password">
		<span class="error"><?php echo isset($errors['confirm password']) ? $errors['confirm password']: ''; ?></span>
	</div>

		<button class="btn btn-primary btn-block" type="submit">
			Register
		</button>
	</form>
</div>
<div class="col-md-4 col-xs-12"></div	>
</div>


</div>
</body>
</html>