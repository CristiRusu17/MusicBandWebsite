<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="styleindex.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div>
        <div>
            <div class="login">
                <h1>Signup</h1> 
                <form action="signup-client.php" method="POST" autocomplete="">
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div>
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div>
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    
                    <label for="username">
                        <i class="fas fa-user"></i>
                    </label>
                    <input  type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                    
                     <label for="username">
                        <i class="fas fa-user"></i>
                    </label>    
                    <input type="text" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    
                    <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" name="password" placeholder="Password" required>
                    
                     <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" name="cpassword" placeholder="Confirm password" required>
                    
                    <input type="submit" name="signup" value="Signup">
                
                    <div>Already a member? <a href="login-user.php"  style="color: white">Login here</a></div>
                    <div>Delete account? <a href="delete-user.php"  style="color: white">Delete here</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>