<?php 
session_start();

require_once "ControlTeacher.php";
$teacher_email = $_SESSION['teacher_email'];
if($teacher_email == false){
  header('Location: login-teacher.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Digital library management system for Kampong spue Institute of Technology</title>
    <link rel="shortcut icon" href="img/logo-around.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="teacher_teacher_new_password.php" method="POST" autocomplete="off">
                    <!-- Icon Favicon -->
                    <link rel="shortcut icon" href="img/logo-login.png" type="image/x-icon" />
                    <?php 
                    if(isset($_SESSION['teacher_info'])){
                        ?>
                    <div class="alert alert-success text-center">
                        <?php echo $_SESSION['teacher_info']; ?>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    if(count($teacher_errors) > 0){
                        ?>
                    <div class="alert alert-danger text-center">
                        <?php
                            foreach($teacher_errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="password" name="teacher_password" placeholder="លេខសម្ងាត់ថ្មី"
                            required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="teacher_cpassword" placeholder="ផ្ទៀងផ្ទាត់"
                            required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="teacher_change-password"
                            value="ផ្លាស់ប្ដូ">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>