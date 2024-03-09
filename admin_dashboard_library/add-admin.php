<?php
require_once "ControlAdmin.php";
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM member WHERE ((select_role='អ្នកគ្រប់គ្រង') AND (email = '$email'))";
    $run_Sql = mysqli_query($conn, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status']; 
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: login.php');
        }
    }
}else{
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin add Admin management</title>

    <!-- Google Font Koulen -->
    <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Link Favicon -->
    <link rel="shortcut icon" href="img/logo-around.png" type="image/x-icon">

    <!-- Link CND font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom Text Editor -->
    <link rel="stylesheet" href="vendor/summernote/summernote-bs4.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('sidebar.php')?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include ('topbar.php')?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid d-flex justify-content-center">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Add Teacher</h1> -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="width: 40rem">
                        <div class="card-header d-flex justify-content-between py-3">
                            <h6 class="m-0 float-start font-weight-bold" style="color: #336666;">Insert Data</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="p-5">
                                <form action="add-admin.php" method="post" enctype="multipart/form-data">
                                    <?php
                    if(count($errors) == 1){
                        ?>
                                    <div class="alert alert-danger text-center">
                                        <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                                    </div>
                                    <?php
                    }elseif(count($errors) > 1){
                        ?>
                                    <div class="alert alert-danger">
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
                                    <div class="form-group">
                                        <label class="label-control" for=""
                                            style="font-family:'Koulen', sans-serif;">ឈ្មោះ
                                            <spatn class=" text-danger">:*
                                            </spatn>
                                        </label>
                                        <input class="form-control" type="text" name="name" placeholder="Full Name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for=""
                                            style="font-family:'Koulen', sans-serif;">អ៊ីម៉ែល
                                            <spatn class=" text-danger">:*
                                            </spatn>
                                        </label>
                                        <input class="form-control" type="email" name="email"
                                            placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for=""
                                            style="font-family:'Koulen', sans-serif;">ភេទ
                                            <spatn class=" text-danger">:*
                                            </spatn>
                                        </label>
                                        <div class="radio-control">
                                            <input type="radio" name="sex" class="" id="" value="ប្រុស"
                                                checked="checked">
                                            <label for="">ប្រុស</label>
                                            <input type="radio" name="sex" class="" id="" value="ស្រី">
                                            <label for="">ស្រី</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for=""
                                            style="font-family:'Koulen', sans-serif;">លេខសម្ងាត់
                                            <spatn class=" text-danger">:*
                                            </spatn>
                                        </label>
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for=""
                                            style="font-family:'Koulen', sans-serif;">បញ្ជាក់
                                            <spatn class=" text-danger">:*
                                            </spatn>
                                        </label>
                                        <input class="form-control" type="password" name="cpassword"
                                            placeholder="Confirm password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control" for=""
                                            style="font-family:'Koulen', sans-serif;">ប្រូហ្វាល
                                            <spatn class=" text-danger">:*
                                            </spatn>
                                        </label>
                                        <input type="file" class="btn btn-secondary" name="fileImg[]"
                                            accept=".jpg, .jpeg, .png" required multiple>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control btn" type="submit" name="signup" value="Signup"
                                            style="background-color: #336666; color: white;">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>