<?php 
// session_start();
require "../config/conn_db.php";
$teacher_email = "";
$teacher_name = "";
$teacher_errors = array();


//if teacher signup button
if(isset($_POST['teacher_signup'])){
    $teacher_id = $_POST['teacher_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $sex = $_POST['sex'];
    $teacher_email = $_POST['teacher_email'];
    $phone = $_POST['phone'];
    $select_major = $_POST['select_major'];
    $specialty = $_POST['specialty'];
    $select_role = $_POST['select_role'];
    $teacher_password = $_POST['teacher_password'];
    $teacher_cpassword= $_POST['teacher_cpassword'];
    
    $totalFiles = count($_FILES['fileImg']['name']);
    $filesArray = array();
  
    for($i = 0; $i < $totalFiles; $i++){
      $imageName = $_FILES["fileImg"]["name"][$i];
      $tmpName = $_FILES["fileImg"]["tmp_name"][$i];
  
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
  
      $newImageName = uniqid() . '.' . $imageExtension;
                                                
      move_uploaded_file($tmpName, 'uploads/' . $newImageName);
      $filesArray[] = $newImageName;
    }
  
    $filesArray = json_encode($filesArray);
    
    $teacher_detials = $_POST['teacher_detials'];
    
    if($teacher_password !== $teacher_cpassword){
        $teacher_errors['teacher_password'] = "Confirm password not matched!";
    }
    $teacher_email_check = "SELECT * FROM teacher_tb WHERE teacher_mail = '$teacher_email'";
    $teacher_res = mysqli_query($conn, $teacher_email_check);
    if(mysqli_num_rows($teacher_res) > 0){
        $teacher_errors['teacher_email'] = "Email that you have entered is already exist!";
    }
    if(count($teacher_errors) === 0){
        $teacher_encpass = password_hash($teacher_password, PASSWORD_BCRYPT);
        $teacher_code = rand(999999, 111111);
        $teacher_status = "notverified";
        $teacher_insert_data = "INSERT INTO teacher_tb (teacher_id,	firstname,	lastname, sex,	teacher_mail,	phone,	select_major,	specialty,	select_role,	teacher_password, image, teacher_detials,	teacher_code,	teacher_status)
                                                values('$teacher_id', '$firstname', '$lastname', '$sex', '$teacher_email', '$phone', '$select_major', '$specialty', '$select_role', '$teacher_encpass', '$filesArray', '$teacher_detials', '$teacher_code', '$teacher_status')";
        $teacher_data_check = mysqli_query($conn, $teacher_insert_data);
        if($teacher_data_check){
            $teacher_subject = "Email Verification Code";
            $teacher_message = "Your verification code is $teacher_code";
            $teacher_sender = "From: sokhunlim36@gmail.com";
            if(mail($teacher_email, $teacher_subject, $teacher_message, $teacher_sender)){
                $teacher_info = "We've sent a verification code to your email - $teacher_email";
                $_SESSION['teacher_info'] = $teacher_info;
                $_SESSION['teacher_email'] = $teacher_email;
                $_SESSION['teacher_password'] = $teacher_password;
                header('location: teacher-otp.php');
                exit();
            }else{
                $teacher_errors['teacher_otp-error'] = "Failed while sending code!";
            }
        }else{
            $teacher_errors['teacher_db-error'] = "Failed while inserting data into database!";
        }
    }

}

    //if teacher click verification code submit button
    if(isset($_POST['teacher_check'])){
        $_SESSION['teacher_info'] = "";
        $teacher_otp_code = mysqli_real_escape_string($conn, $_POST['teacher_otp']);
        $teacher_check_code = "SELECT * FROM teacher_tb WHERE teacher_code = $teacher_otp_code";
        $teacher_code_res = mysqli_query($conn, $teacher_check_code);
        if(mysqli_num_rows($teacher_code_res) > 0){
            $teacher_fetch_data = mysqli_fetch_assoc($teacher_code_res);
            $teacher_fetch_code = $teacher_fetch_data['teacher_code'];
            $teacher_email = $teacher_fetch_data['teacher_mail'];
            $teacher_code = 0;
            $teacher_status = 'verified';
            $teacher_update_otp = "UPDATE teacher_tb SET teacher_code = $teacher_code, teacher_status = '$teacher_status' WHERE teacher_code = $teacher_fetch_code";
            $teacher_update_res = mysqli_query($conn, $teacher_update_otp);
            if($teacher_update_res){
                $_SESSION['teacher_name'] = $teacher_name;
                $_SESSION['teacher_email'] = $teacher_email;
                header('location: list-teacher.php');
                exit();
            }else{
                $teacher_errors['teacher_otp-error'] = "Failed while updating code!";
            }
        }else{
            $teacher_errors['teacher_otp-error'] = "You've entered incorrect code!";
        }
    }


    //if teacher click continue button in forgot password form for teacher dashboard
    if(isset($_POST['teacher_check-email'])){
        $teacher_email = mysqli_real_escape_string($conn, $_POST['teacher_email']);
        $teacher_check_email = "SELECT * FROM teacher_tb WHERE teacher_mail='$teacher_email'";
        $teacher_run_sql = mysqli_query($conn, $teacher_check_email);
        if(mysqli_num_rows($teacher_run_sql) > 0){
            $teacher_code = rand(999999, 111111);
            $teacher_insert_code = "UPDATE teacher_tb SET teacher_code = $teacher_code WHERE teacher_mail = '$teacher_email'";
            $teacher_run_query =  mysqli_query($conn, $teacher_insert_code);
            if($teacher_run_query){
                $teacher_subject = "Password Reset Code";
                $teacher_message = "Your password reset code is $teacher_code";
                $teacher_sender = "From: sokhunlim36@gmail.com";
                if(mail($teacher_email, $teacher_subject, $teacher_message, $teacher_sender)){
                    $teacher_info = "We've sent a passwrod reset otp to your email - $teacher_email";
                    $_SESSION['teacher_info'] = $teacger_info;
                    $_SESSION['teacher_email'] = $teacher_email;
                    header('location: teacher-reset-code.php');
                    exit();
                }else{
                    $teacher_errors['teacher_otp-error'] = "Failed while sending code!";
                }
            }else{
                $teacher_errors['teacher_db-error'] = "Something went wrong!";
            }
        }else{
            $teacher_errors['teacher_email'] = "This email address does not exist!";
        }
    }
    
    //if teacher click check reset otp button for teacher databoard
    if(isset($_POST['teacher_check-reset-otp'])){
        $_SESSION['teacher_info'] = "";
        $teacher_otp_code = mysqli_real_escape_string($conn, $_POST['teacher_otp']);
        $teacher_check_code = "SELECT * FROM teacher_tb WHERE teacher_code = $teacher_otp_code";
        $teacher_code_res = mysqli_query($conn, $teacher_check_code);
        if(mysqli_num_rows($teacher_code_res) > 0){
            $teacher_fetch_data = mysqli_fetch_assoc($teacher_code_res);
            $teacher_email = $teacher_fetch_data['teacher_email'];
            $_SESSION['teacher_email'] = $teacher_email;
            $teacher_info = "Please create a new password that you don't use on any other site.";
            $_SESSION['teacher_info'] = $teacher_info;
            header('location: edit-teacher.php');
            exit();
        }else{
            $teacher_errors['teacher_otp-error'] = "You've entered incorrect code!";
        }
    }
    
    //if teacher click change password button
    if(isset($_POST['teacher_change-password'])){
        $_SESSION['teacher_info'] = "";
        $teacher_password = mysqli_real_escape_string($conn, $_POST['teacher_password']);
        $teacher_cpassword = mysqli_real_escape_string($conn, $_POST['teacher_cpassword']);
        if($teacher_password !== $teacher_cpassword){
            $teacher_errors['teacher_password'] = "Confirm password not matched!";
        }else{
            $teacher_code = 0;
            $teacher_email = $_SESSION['teacher_email']; //getting this email using session
            $teacher_encpass = password_hash($teacher_password, PASSWORD_BCRYPT);
            $teacher_update_pass = "UPDATE teacher_tb SET teacher_code = $teacher_code, teacher_password = '$teacher_encpass' WHERE teacher_email = '$teacher_email'";
            $teacher_run_query = mysqli_query($conn, $teacher_update_pass);
            if($teacher_run_query){
                $teacher_info = "Your password changed. Now you can login with your new password.";
                $_SESSION['teacher_info'] = $teacher_info;
                header('Location: password-changed.php');
            }else{
                $teacher_errors['teacher_db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    // if(isset($_POST['teacher_login-now'])){
    //     header('Location: login.php');
    // }
?>