<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Account</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="styleindex.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div>
        <div>
            <div class="login">
                <h1>Delete Account</h1> <b>
                <h2>Delete your Account with your email and password.</h2>
                <form action="delete-user.php" method="POST" autocomplete="">  
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
                    <label for="username">
                        <i class="fas fa-user"></i>
                    </label>
                    <input  type="text" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    
                    <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" name="password" placeholder="Password" required>
                   
                    <input type="submit" name="delete" value="Delete">
                   
                    <div>Not yet a member? <a href="signup-user.php"  style="color: white">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>


