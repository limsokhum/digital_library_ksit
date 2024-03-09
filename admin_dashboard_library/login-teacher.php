<?php require_once "Control-Change-Password-teacher.php";?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacher Login</title>

    <!-- Link Favicon -->
    <link rel="shortcut icon" href="img/logo-around.png" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <!-- class="bg-gradient-success" -->

    <div class="container">

        <!-- Outer Row -->
        <div class="row d-flex vh-100 align-items-center justify-content-center">

            <div class="col-xl-6 col-lg-8 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-4">

                            <img src="img/logo-login.png" alt="state" style="width: 24rem">

                            <form method="POST" class="user mt-3">
                                <?php
                            if(count($errors) > 0){
                            ?>
                                <div class="alert alert-danger text-center">
                                    <?php
                            foreach($errors as $showerror){
                            echo $showerror;
                            }
                            ?>
                                </div>
                                <?php
                            }
                            ?>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        placeholder="Enter Email Address..." value="<?php echo $email ?>" require>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password" require>
                                </div>

                                <input class="form-control btn btn-success" type="submit" name="login"
                                    value="Representative Login">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-dark" href="login.php">Admin
                                    Login</a>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a class="small text-dark" href="teacher-forgot-password.php">Representative
                                    Forgot
                                    Password?</a>
                            </div>
                        </div>
                        <!-- Nested Row within Card Body -->
                        <!-- <div class="row">

                            <div class="col-lg-6">
                                <div class="p-4">

                                    <img src="img/logo-login.png" alt="state" style="width: 24rem">

                                    <form method="POST" class="user mt-3">
                                        <?php
                                        if(count($errors) > 0){
                                        ?>
                                        <div class="alert alert-danger text-center">
                                            <?php
                                        foreach($errors as $showerror){
                                        echo $showerror;
                                        }
                                        ?>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="<?php echo $email ?>"
                                                require>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Password" require>
                                        </div>

                                        <input class="form-control btn btn-success" type="submit" name="login"
                                            value="Representative Login">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-dark" href="login.php">Admin
                                            Login</a>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-dark" href="teacher-forgot-password.php">Representative
                                            Forgot
                                            Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block"
                                style="background-image: url('img/banner-journal.png');"></div>
                        </div> -->
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>