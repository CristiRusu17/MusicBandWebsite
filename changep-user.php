<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="styleindex.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div>
        <div>
            <div class="login">
                <h1>Change Password</h1> 
                <form action="changep-user.php" method="POST" autocomplete="">
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
                    <input type="text" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    
                    <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" name="password" placeholder="Old Password" required>
                    
                     <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" name="npassword" placeholder="New password" required>
                    
                    <input type="submit" name="ch_pswd" value="Change Password">
                
                    <div>Not a member yet? <a href="signup-user.php" style="color: white">Signup now</a></div>
                    <div>Delete account? <a href="delete-user.php"  style="color: white">Delete here</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>