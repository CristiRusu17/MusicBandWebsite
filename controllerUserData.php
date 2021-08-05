<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

//signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered already exists!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(9999, 1111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $info = "Enter the verification code that you see.";
            $_SESSION['info'] = $info;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('location: user-otp.php');
            exit();
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    // verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered an incorrect code!";
        }
    }

    //login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){ //sql injection
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  header('location: home.php');
                }else{
                    $info = "It looks like you still haven't verified your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It looks like you're not a member yet! Click on the bottom link to signup.";
        }
    }

    //delete button
    if(isset($_POST['delete'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  $delete_email = "DELETE FROM usertable WHERE email = '$email'";
                  $res = mysqli_query($con, $delete_email);
                  header('location: login-user.php');
                  exit();
                }else{
                    $info = "It looks like you still haven't verified your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It looks like you're not a member yet! Click on the bottom link to signup.";
        }
    }

    //butonul de review
    if(isset($_POST['review'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['mail']);
        $mesaj = mysqli_real_escape_string($con, $_POST['message']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0 ){
            $insert_mesaj = "INSERT INTO review (name, email, message)
                        values('$name', '$email', '$mesaj')";
            $data_check_msj = mysqli_query($con, $insert_mesaj);
            header('location: home.php');
        }
    }

    //cumparare bilete concert
    if(isset($_POST['ticket_ny'])){
        $email = $_SESSION['email'];
        $cumparare = "UPDATE usertable SET total = total+95 WHERE email = '$email' ";
        $bilet = "UPDATE tickets SET nr_bilete = nr_bilete-1 WHERE locatie = 'Ny' ";
        $data_check_cump= mysqli_query($con, $cumparare);
        $data_check_bilet=mysqli_query($con, $bilet);
    }

       if(isset($_POST['ticket_par'])){
        $email = $_SESSION['email'];
        $cumparare = "UPDATE usertable SET total = total+70 WHERE email = '$email' ";
        $bilet = "UPDATE tickets SET nr_bilete = nr_bilete-1 WHERE locatie = 'Par' ";
        $data_check_cump= mysqli_query($con, $cumparare);
        $data_check_bilet=mysqli_query($con, $bilet);
    }

       if(isset($_POST['ticket_sf'])){
        $email = $_SESSION['email'];
        $cumparare = "UPDATE usertable SET total = total+55 WHERE email = '$email' ";
        $bilet = "UPDATE tickets SET nr_bilete = nr_bilete-1 WHERE locatie = 'SF' ";
        $data_check_cump= mysqli_query($con, $cumparare);
        $data_check_bilet=mysqli_query($con, $bilet);
    }

    //cumparare album
   if(isset($_POST['merch'])){
        $email = $_SESSION['email'];
        $cumparare = "UPDATE usertable SET total = total+25 WHERE email = '$email' ";
        $data_check_cump= mysqli_query($con, $cumparare);
    }

    //cumparare hoodie
    if(isset($_POST['merch_hoodie'])){
        $email = $_SESSION['email'];
        $cumparare = "UPDATE usertable SET total = total+80 WHERE email = '$email' ";
        $data_check_cump= mysqli_query($con, $cumparare);
    }

    //cumparare tricou
    if(isset($_POST['merch_shirt'])){
        $email = $_SESSION['email'];
        $cumparare = "UPDATE usertable SET total = total+50 WHERE email = '$email' ";
        $data_check_cump= mysqli_query($con, $cumparare);
    }

    //schimbare parola
    if(isset($_POST['ch_pswd'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $npassword = mysqli_real_escape_string($con, $_POST['npassword']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $nencpass = password_hash($npassword, PASSWORD_BCRYPT);
                  $update = "UPDATE usertable SET password = '$nencpass' WHERE email = '$email' ";
                  $data_check_upd= mysqli_query($con, $update);
                  header('location: login-user.php');
                }else{
                    $info = "It looks like you still haven't verified your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It looks like you're not a member yet! Click on the bottom link to signup.";
        }
    }

    //plata
    if(isset($_POST['plata'])){
        $email = $_SESSION['email'];
        $cumparare = "UPDATE usertable SET total = 0 WHERE email = '$email' ";
        $data_check_cump= mysqli_query($con, $cumparare);
    }
?>