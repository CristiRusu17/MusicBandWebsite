<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
$sql = "SELECT * FROM usertable WHERE email = '$email'";
$run_Sql = mysqli_query($con, $sql);
if($run_Sql){
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $code = $fetch_info['code'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="styleindex.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div>
        <div >
            <div class="login">
                <h1>reCAPTCHA</h1> <b>
                <form action="user-otp.php" method="POST" autocomplete="off">
                    <h2>The Code is: <?php echo $code ?></h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div>
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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
                    <input type="number" name="otp" placeholder="Verification code" required>
                
                    <input type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>