<?php

require_once "ControlAdmin.php";

$email = $_SESSION['email'];

$password = $_SESSION['password'];

if($email != false && $password != false){
    
    $sql = "SELECT * FROM admintable WHERE email = '$email'";
    
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

            header('Location: admin-otp.php');
            
        }
    }
}else{
    header('Location: login.php');
}
if(isset($_GET['id'])){
    
    $delete_digital_book = $_GET['id'];

    $query_delete_digital_book = "DELETE FROM digitalbook_tb WHERE id='$delete_digital_book'";
    
    $result_delete_digital_book = $conn->query($query_delete_digital_book);
    
    if($result_delete_digital_book==TRUE){
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

    <title>admin e-Projects</title>

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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables e-Projects</h1> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between py-3">
                            <h6 class="m-0 float-start font-weight-bold text-primary">DataTables</h6>
                            <a class="m-0 btn btn-primary float-end font-weight-bold text-light"
                                href="add-admin-digital.php">Add e-Project</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                     if(isset($_SESSION['status']))
                                     {
                                         ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>You Delete Digital Book Success!</strong> .
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
                                            <th>ជំនាញ</th>
                                            <th>អ្នកនិពន្ធ</th>
                                            <th>អត្ថបទ</th>
                                            <th>ថ្ងៃ-ទី</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query_select_digital_book_one = "SELECT * FROM digitalbook_tb WHERE (digital_book='e-project')AND(status=1) ORDER BY id DESC";
                                        $result_select_digital_ebook_one = $conn->query($query_select_digital_book_one);

                                        $query_select_digital_book_two = "SELECT * FROM digitalbook_tb WHERE (digital_book='e-project')AND(status=0) ORDER BY id DESC";
                                        $result_select_digital_ebook_two = $conn->query($query_select_digital_book_two);
                                        
                                        $query_select_digital_book_three = "SELECT * FROM digitalbook_tb WHERE (digital_book='e-project')AND(status=2) ORDER BY id DESC";
                                        $result_select_digital_ebook_three = $conn->query($query_select_digital_book_three);

                                        $query_select_digital_book_for = "SELECT * FROM digitalbook_tb WHERE (digital_book='e-project')AND(status=3) ORDER BY id DESC";
                                        $result_select_digital_ebook_for = $conn->query($query_select_digital_book_for);
                                        
                                        $cnt= 1;
                                        if($result_select_digital_ebook_one->num_rows>0){
                                            while($row_select_digital_ebook_one = $result_select_digital_ebook_one->fetch_assoc()){
                                                ?>
                                        <tr>
                                            <td><?php echo $cnt?></td>
                                            <td><?php echo $row_select_digital_ebook_one['title']?></td>
                                            <td><?php echo $row_select_digital_ebook_one['select_major']?></td>
                                            <td><?php echo $row_select_digital_ebook_one['name_auther']?></td>
                                            <td><a class="text-secondary"
                                                    href="e-project.php?file_id_view=<?php echo $row_select_digital_ebook_one['id'] ?>"
                                                    target="_blank"><?php echo $row_select_digital_ebook_one['name']?></a>
                                            </td>
                                            <td><?php echo $row_select_digital_ebook_one['date']?></td>
                                            <td>
                                                <a href="view-digital-eproject.php?id=<?php echo $row_select_digital_ebook_one['id']?>"
                                                    class="btn btn-secondary btn-circle btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="edit-digital-book.php?id=<?php echo $row_select_digital_ebook_one['id']?>"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="e-books.php?id=<?php echo $row_select_digital_ebook_one['id']?>"
                                                    class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $cnt=$cnt+1;
                                            }
                                        }
                                        if($result_select_digital_ebook_two->num_rows>0){
                                            while($row_select_digital_ebook_two = $result_select_digital_ebook_two->fetch_assoc()){
                                                ?>
                                        <tr class="text-primary">
                                            <td><?php echo $cnt?></td>
                                            <td><?php echo $row_select_digital_ebook_two['title']?></td>
                                            <td><?php echo $row_select_digital_ebook_two['select_major']?></td>
                                            <td><?php echo $row_select_digital_ebook_two['name_auther']?></td>
                                            <td><a class=""
                                                    href="e-books.php?file_id_view=<?php echo $row_select_digital_ebook_two['id'] ?>"
                                                    target="_blank"><?php echo $row_select_digital_ebook_two['name']?></a>
                                            </td>
                                            <td><?php echo $row_select_digital_ebook_two['date']?></td>
                                            <td>
                                                <a href="view-digital-eproject.php?id=<?php echo $row_select_digital_ebook_two['id']?>"
                                                    class="btn btn-secondary btn-circle btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="edit-digital-book.php?id=<?php echo $row_select_digital_ebook_two['id']?>"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="e-books.php?id=<?php echo $row_select_digital_ebook_two['id']?>"
                                                    class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $cnt=$cnt+1;
                                            }
                                        }

                                        if($result_select_digital_ebook_three->num_rows>0){
                                            while($row_select_digital_ebook_three = $result_select_digital_ebook_three->fetch_assoc()){
                                                ?>
                                        <tr class="text-success">
                                            <td><?php echo $cnt?></td>
                                            <td><?php echo $row_select_digital_ebook_three['title']?></td>
                                            <td><?php echo $row_select_digital_ebook_three['select_major']?></td>
                                            <td><?php echo $row_select_digital_ebook_three['name_auther']?></td>
                                            <td><a class="text-success"
                                                    href="e-books.php?file_id_view=<?php echo $row_select_digital_ebook_three['id'] ?>"
                                                    target="_blank"><?php echo $row_select_digital_ebook_three['name']?></a>
                                            </td>
                                            <td><?php echo $row_select_digital_ebook_three['date']?></td>
                                            <td>
                                                <a href="view-digital-eproject.php?id=<?php echo $row_select_digital_ebook_three['id']?>"
                                                    class="btn btn-secondary btn-circle btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="edit-digital-book.php?id=<?php echo $row_select_digital_ebook_three['id']?>"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="e-books.php?id=<?php echo $row_select_digital_ebook_two['id']?>"
                                                    class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $cnt=$cnt+1;
                                            }
                                        }
                                        if($result_select_digital_ebook_for->num_rows>0){
                                            while($row_select_digital_ebook_for = $result_select_digital_ebook_for->fetch_assoc()){
                                                ?>
                                        <tr class="text-danger">
                                            <td><?php echo $cnt?></td>
                                            <td><?php echo $row_select_digital_ebook_for['title']?></td>
                                            <td><?php echo $row_select_digital_ebook_for['select_major']?></td>
                                            <td><?php echo $row_select_digital_ebook_for['name_auther']?></td>
                                            <td><a class="text-danger"
                                                    href="e-books.php?file_id_view=<?php echo $row_select_digital_ebook_for['id'] ?>"
                                                    target="_blank"><?php echo $row_select_digital_ebook_for['name']?></a>
                                            </td>
                                            <td><?php echo $row_select_digital_ebook_for['date']?></td>
                                            <td>
                                                <a href="view-digital-eproject.php?id=<?php echo $row_select_digital_ebook_for['id']?>"
                                                    class="btn btn-secondary btn-circle btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="edit-digital-book.php?id=<?php echo $row_select_digital_ebook_for['id']?>"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="e-books.php?id=<?php echo $row_select_digital_ebook_two['id']?>"
                                                    class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $cnt=$cnt+1;
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