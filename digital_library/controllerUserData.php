<?php 
session_start();
require "../config/conn_db.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "បញ្ជាក់ពាក្យសម្ងាត់មិនត្រូវគ្នា!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($conn, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "អ៊ីមែលដែលអ្នកបានបញ្ចូលមានរួចហើយ!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($conn, $insert_data);
        if($data_check){
            $subject = "លេខកូដផ្ទៀងផ្ទាត់អ៊ីមែល";
            $message = "លេខកូដផ្ទៀងផ្ទាត់របស់អ្នកគឺ $code";
            $sender = "From: sokhumlim@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "យើងបានផ្ញើលេខកូដផ្ទៀងផ្ទាត់ទៅអ៊ីមែលរបស់អ្នក។ - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "បរាជ័យ​ពេល​ផ្ញើ​លេខ​កូដ!";
            }
        }else{
            $errors['db-error'] = "បរាជ័យពេលបញ្ចូលទិន្នន័យទៅក្នុងមូលដ្ឋានទិន្នន័យ!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($conn, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: index-user.php');
                exit();
            }else{
                $errors['otp-error'] = "បរាជ័យ​ពេល​ធ្វើ​បច្ចុប្បន្នភាព​កូដ!";
            }
        }else{
            $errors['otp-error'] = "អ្នក​បាន​បញ្ចូល​កូដ​មិន​ត្រឹមត្រូវ!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($conn, $check_email); 
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: index-user.php');
                }else{
                    $info = "វាហាក់ដូចជាអ្នកមិនទាន់បានផ្ទៀងផ្ទាត់អ៊ីមែលរបស់អ្នកនៅឡើយ - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "អ៊ីមែល ឬពាក្យសម្ងាត់មិនត្រឹមត្រូវ!";
            }
        }else{
            $errors['email'] = "មើលទៅអ្នកមិនទាន់ជាសមាជិក! ចុចលើតំណខាងក្រោមដើម្បីចុះឈ្មោះ។";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($conn, $insert_code);
            if($run_query){
                $subject = "លេខកូដកំណត់ពាក្យសម្ងាត់ឡើងវិញ";
                $message = "លេខកូដកំណត់ពាក្យសម្ងាត់របស់អ្នកឡើងវិញ $code";
                $sender = "From: sokhumlim@gmail.com.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "យើងបានផ្ញើលេខសម្ងាត់ឡើងវិញ otp ទៅកាន់អ៊ីមែលរបស់អ្នក។ - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "បរាជ័យ​ពេល​ផ្ញើ​លេខ​កូដ!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "អាសយដ្ឋានអ៊ីមែលនេះមិនមានទេ!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "សូមបង្កើតពាក្យសម្ងាត់ថ្មីដែលអ្នកមិនប្រើនៅលើគេហទំព័រផ្សេងទៀតណាមួយឡើយ។";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "អ្នក​បាន​បញ្ចូល​កូដ​មិន​ត្រឹមត្រូវ!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "បញ្ជាក់ពាក្យសម្ងាត់មិនត្រូវគ្នា!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "ពាក្យសម្ងាត់របស់អ្នកបានផ្លាស់ប្តូរ។ ឥឡូវនេះ អ្នកអាចចូលដោយប្រើពាក្យសម្ងាត់ថ្មីរបស់អ្នក។";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "បរាជ័យក្នុងការផ្លាស់ប្តូរពាក្យសម្ងាត់របស់អ្នក!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>