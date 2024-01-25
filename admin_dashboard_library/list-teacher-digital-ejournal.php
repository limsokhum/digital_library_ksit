<?php
require_once "Control-Change-Password-teacher.php";
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM teacher_tb WHERE teacher_mail = '$email'";
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

if(isset($_GET['id'])){
    $delete_teacher_digital_ejournal = $_GET['id'];
    $query_delete_teacher_digital_ejournal = "DELETE FROM digitalbook_tb WHERE (((teacher_mail = '$email') AND (digital_book='e-journal'))) AND (id='$delete_teacher_digital_ejournal')";
    $result_delte_teacher_digital_ejournal = $conn->query($query_delete_teacher_digital_ejournal);
    if($result_delte_teacher_digital_ejournal==TRUE){
        $_SESSION['status'] = "<Type Your success message here>";
    }
}

if (isset($_GET['file_id_view'])) {
    $id = $_GET['file_id_view'];

    $sql = "SELECT * FROM digitalbook_tb WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Type: application/pdf');
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        // $viewCount = $file['view'] + 1;
        // $viewQuery = "UPDATE files SET view=$viewCount WHERE id=$id";
        // mysqli_query($conn, $viewQuery);
        // exit;

        
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

    <title>List Teacher e-Journal</title>

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

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-danger"> e-Books</h1> -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between py-3">
                            <h6 class="m-0 float-start font-weight-bold text-primary">DataTables</h6>
                            <a class="m-0 btn btn-primary float-end font-weight-bold text-light"
                                href="teacher-add-digital.php">Add
                                e-Journal</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                     if(isset($_SESSION['status']))
                                     {
                                         ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>You Update Digital Book Success!</strong> .You Can Fine on List Digital
                                    Book
                                </div>
                                <?php 
                                         unset($_SESSION['status']);
                                     }
                                    ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ប្រធានបទ</th>
                                            <th>ប្រភេទសៀវភៅ</th>
                                            <th>អ្នកនិពន្ធ</th>
                                            <th>អត្ថបទ</th>
                                            <th>ថ្ងៃ-ទី (Public)</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $select_list_ebook_one = "SELECT * FROM digitalbook_tb WHERE ((teacher_mail = '$email') AND (digital_book='e-journal') AND (status=0)) ORDER BY id DESC";
                                        $result_select_list_ebook_one = $conn ->query($select_list_ebook_one);

                                        $select_list_ebook_two = "SELECT * FROM digitalbook_tb WHERE ((teacher_mail = '$email') AND (digital_book='e-journal') AND (status=1)) ORDER BY id DESC";
                                        $result_select_list_ebook_two = $conn ->query($select_list_ebook_two);

                                        $select_list_ebook_three = "SELECT * FROM digitalbook_tb WHERE ((teacher_mail = '$email') AND (digital_book='e-journal') AND (status=2)) ORDER BY id DESC";
                                        $result_select_list_ebook_three = $conn ->query($select_list_ebook_three);

                                        $select_list_ebook_four = "SELECT * FROM digitalbook_tb WHERE ((teacher_mail = '$email') AND (digital_book='e-journal') AND (status=3)) ORDER BY id DESC";
                                        $result_select_list_ebook_four = $conn ->query($select_list_ebook_four);
                                        
                                        
                                        $cnt = 1;
                                        if($result_select_list_ebook_one->num_rows>0){
                                            while($row_select_list_ebook_one = $result_select_list_ebook_one->fetch_assoc()){
                                                ?>
                                        <tr class="text-primary">
                                            <td><?php echo $cnt?></td>
                                            <td><?php echo $row_select_list_ebook_one['title']?></td>
                                            <td><?php echo $row_select_list_ebook_one['digital_book']?></td>
                                            <td><?php echo $row_select_list_ebook_one['name_auther']?></td>
                                            <td>
                                                <a class="text-primary"
                                                    href="list-teacher-digital-ejournal.php?file_id_view=<?php echo $row_select_list_ebook['id'] ?>"
                                                    target="_blank"><?php echo $row_select_list_ebook_one['name']?></a>
                                            </td>
                                            <td><?php echo $row_select_list_ebook_one['date']?></td>
                                            <td>
                                                <a href="
                                                    view-teacher-ejournal.php?id=<?php echo $row_select_list_ebook_one['id']?>"
                                                    class="btn btn-success btn-circle btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="edit-teacher-digital-ejournal.php?id=<?php echo $row_select_list_ebook_one['id']?>"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="list-teacher-digital-ejournal.php?id=<?php echo $row_select_list_ebook['id']?>"
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
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include ('logout-modal.php')?>


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
    <script>
    function onclickShow() {
        document.getElementById("popup-profile").style.display = "block";
    }

    function onclickRemove() {
        document.getElementById("popup-profile").style.display = "none";
    }
    </script>
</body>

</html>