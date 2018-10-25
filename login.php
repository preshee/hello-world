
<html>
session_start();
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
	<form action="" method="post" style="padding-top: 50px; padding-bottom: 50px">
		<div class="form-group text-center">
			<label class="label label-default">Login to Demo</label>
		</div>
		<?php
			require_once('connect.php');
			require_once('functions.php');
			require_once('validate.php');

			$validate = new Validate;
			$errors = [];
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$email = $_POST["email"];
				$password = $_POST["password"];
				$validate->isEmpty('password', $password);
				$validate->isEmpty('email', $email);
				$errors = $validate->getErrors();

				if(count($errors) == 0){
					$login = login($email, $password);
					if($login){
						echo "<div class='alert alert-success'>Login Sucessful</div>";
					}else{
						echo "<div class='alert alert-danger'>Login Failed! Something went wrong</div>";
					}
				}else{
					echo "<div class='alert alert-danger'>Login Failed</div>";
				}
				
			}
		?>
	<div class="form-group">
		<input class="form-control" type="text" name="email" placeholder="email">
		<span class="error"><?php echo isset($errors['email']) ? $errors['email']: ''; ?></span>
	</div>
	<div class="form-group">
		<input class="form-control" type="password" name="password" placeholder="password">
		<span class="error"><?php echo isset($errors['password']) ? $errors['password']: ''; ?></span>
	</div>


		<button class="btn btn-primary btn-block" type="submit">
			login
		</button>
	</form>
</div>
<div class="col-md-4 col-xs-12"></div	>
</div>


</div>
</body>
</html>