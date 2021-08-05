<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="styleindex.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="login-user.php" method="POST" autocomplete="">
			<div>
				<?php
                    if(count($errors) > 0){
                        ?>
                        <div>
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="email" placeholder="Email" id="_username" required value="<?php echo $email ?>"> 
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="_password" required>
				<input type="submit" name="login" value="Login">
				<div>Not yet a member? <a href="signup-user.php" style="color: white">Signup now</a></div>
                <div>Delete account? <a href="delete-user.php"  style="color: white">Delete here</a></div>
                <div>Change password? <a href="changep-user.php"  style="color: white">Change here</a></div>
			</form>
		</div>
	</body>
</html>
