<?php

require_once "Control-Change-Password-teacher.php";
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM member WHERE email = '$email'";
    $run_Sql = mysqli_query($conn, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['teacher_status']; 
        $code = $fetch_info['teacher_code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: teacher-reset-codes.php');
            }
        }else{
            header('Location: admin-otp.php');
        }
    }
}else{
    header('Location: login-teacher.php');
}


if (isset($_GET['id'])){
$delete_department = $_GET['id'];
$delete_query_department = "DELETE FROM department_tb WHERE id=$delete_department";
$delete_department_result = $conn->query($delete_query_department);
if($delete_department_result ==TRUE){
echo
"
<script>
alert('Successfully Added');
document.location.href = 'index.php';
</script>
";
}
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

    <title>Digital library management system for Kampong spue Institute of Technology</title>

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
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('sidebar-teacher.php')?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include ('teacher-topbar.php')?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between py-3">
                            <h6 class="m-0 float-start font-weight-bold text-primary">DataTables</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ជំនាញ</th>
                                            <th>ថ្ងៃ-ទី</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $slect_department ="SELECT member.id, member.member_id, member.firstname, member.lastname, member.sex,  member.email, member.phone, member.select_major, member.specialty, member.select_role, member.image, member.detail,major_tb.major_title,major_tb.creationdate
                                        FROM member INNER JOIN major_tb ON member.select_major=major_tb.id WHERE email='$email' ORDER BY id DESC";
                                        // $slect_department = "SELECT teacher_tb.id, teacher_tb.teacher_id,teacher_tb.firstname,
                                        // teacher_tb.lastname,teacher_tb.teacher_mail,teacher_tb.phone,teacher_tb.select_major,
                                        // teacher_tb.specialty,teacher_tb.select_role,teacher_tb.image,teacher_tb.teacher_detials,
                                        // teacher_tb.teacher_status,major_tb.major_title,major_tb.creationdate FROM teacher_tb INNER JOIN major_tb ON teacher_tb.select_major = major_tb.id WHERE teacher_mail = '$email' ORDER BY id DESC";
                                        $result_department = $conn->query($slect_department);
                                        $cnt = 1;
                                        if($result_department-> num_rows>0){
                                            while($row = $result_department->fetch_assoc()){
                                                ?>
                                        <tr>
                                            <td>
                                                <?php echo($cnt) ?></td>
                                            <td><?php echo ($row['major_title'])?></td>
                                            <td><?php echo($row['creationdate'])?></td>
                                            <td>
                                                <a href="view-major-teacher.php?id=<?php echo $row['major_title']?>"
                                                    class="btn btn-success btn-circle btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="edit-major-teacher.php?id=<?php echo $row['id']?>"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="list-department.php?id=<?php echo $row['id']?>"
                                                    class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <?php
                                        $cnt = $cnt + 1;
                                        }
                                        }
                                        ?>

                                    </tbody>
                                </table>
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
    <a class=" scroll-to-top rounded" href="#page-top">
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