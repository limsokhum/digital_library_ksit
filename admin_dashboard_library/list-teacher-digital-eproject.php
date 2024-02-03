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
    $delete_teacher_digital_eproject = $_GET['id'];
    $query_delete_teacher_digital_eproject = "DELETE FROM digitalbook_tb WHERE (((teacher_mail = '$email') AND (digital_book='e-project'))) AND (id='$delete_teacher_digital_eproject')";
    $result_delte_teacher_digital_eproject = $conn->query($query_delete_teacher_digital_eproject);
    if($result_delte_teacher_digital_eproject==TRUE){
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

<?php
 if(isset($_POST['submit'])){
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $teacher_mail = mysqli_real_escape_string($conn, $_POST['teacher_mail']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    
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
    
    $teacher_code = 0;
    
    $teacher_status = "verified";
    
    if($password==NULL && $cpassword==NULL && $filesArray==NULL){
        $update_pass = "UPDATE teacher_tb SET 	firstname ='$firstname', lastname ='$lastname', teacher_mail='$teacher_mail',teacher_code='$teacher_code',	teacher_status='$teacher_status' WHERE teacher_mail = '$email'";
    }elseif($password==NULL && $cpassword==NULL && $filesArray!==NULL){
        
        $update_pass = "UPDATE teacher_tb SET firstname ='$firstname', lastname ='$lastname', teacher_mail='$teacher_mail', image='$filesArray',teacher_code='$teacher_code',	teacher_status='$teacher_status' WHERE teacher_mail = '$email'";
    }else{
        
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE teacher_tb SET firstname ='$firstname', lastname ='$lastname', teacher_mail='$teacher_mail', teacher_password = '$encpass',  image='$filesArray',teacher_code='$teacher_code',	teacher_status='$teacher_status'  WHERE teacher_mail = '$email'";
    }
    $result_editprofile =$conn ->query($update_pass);
    if($result_editprofile==true){
        $_SESSION['status'] = "<Type Your success message here>";
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

    <title>List Teacher e-Project</title>

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
                                e-Project</a>
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
                                            <th>ថ្ងៃ-ទី</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       $select_list_ebook_one = "SELECT * FROM digitalbook_tb WHERE ((teacher_mail = '$email') AND (digital_book='e-project') AND (status=0)) ORDER BY id DESC";
                                       $result_select_list_ebook_one = $conn ->query($select_list_ebook_one);
                                       
                                       $select_list_ebook_two = "SELECT * FROM digitalbook_tb WHERE ((teacher_mail = '$email') AND (digital_book='e-project') AND (status=1)) ORDER BY id DESC";
                                       $result_select_list_ebook_two = $conn ->query($select_list_ebook_two);

                                       $select_list_ebook_three = "SELECT * FROM digitalbook_tb WHERE ((teacher_mail = '$email') AND (digital_book='e-project') AND (status=2)) ORDER BY id DESC";
                                       $result_select_list_ebook_three = $conn ->query($select_list_ebook_three);

                                       $select_list_ebook_four = "SELECT * FROM digitalbook_tb WHERE ((teacher_mail = '$email') AND (digital_book='e-project') AND (status=3)) ORDER BY id DESC";
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
                                                    href="list-teacher-digital-eproject.php?file_id_view=<?php echo $row_select_list_ebook_one['id'] ?>"
                                                    target="_blank"><?php echo $row_select_list_ebook_one['name']?>
                                                </a>
                                            </td>
                                            <td><?php echo $row_select_list_ebook_one['date']?></td>
                                            <td>
                                                <a href="view-teacher-project.php?id=<?php echo $row_select_list_ebook_one['id']?>"
                                                    class="btn btn-success btn-circle btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="edit-teacher-digital-eproject.php?id=<?php echo $row_select_list_ebook_one['id']?>"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <!-- <a href="list-teacher-digital-eproject.php?id=<?php //echo $row_select_list_ebook['id']?>"
                                                    class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a> -->
                                            </td>
                                        </tr>
                                        <?php
                                        $cnt = $cnt + 1;
                                            }
                                        }

                                        if($result_select_list_ebook_two->num_rows>0){
                                            while($row_select_list_ebook_two = $result_select_list_ebook_two->fetch_assoc()){
                                                ?>
                                        <tr class="text-secondary">
                                            <td><?php echo $cnt?></td>
                                            <td><?php echo $row_select_list_ebook_two['title']?></td>
                                            <td><?php echo $row_select_list_ebook_two['digital_book']?></td>
                                            <td><?php echo $row_select_list_ebook_two['name_auther']?></td>
                                            <td>
                                                <a class="text-secondary"
                                                    href="list-teacher-digital-eproject.php?file_id_view=<?php echo $row_select_list_ebook_two['id'] ?>"
                                                    target="_blank"><?php echo $row_select_list_ebook_two['name']?>
                                                </a>
                                            </td>
                                            <td><?php echo $row_select_list_ebook_two['date']?></td>
                                            <td>
                                                <a href="view-teacher-project.php?id=<?php echo $row_select_list_ebook_two['id']?>"
                                                    class="btn btn-success btn-circle btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="edit-teacher-digital-eproject.php?id=<?php echo $row_select_list_ebook_two['id']?>"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="list-teacher-digital-eproject.php?id=<?php echo $row_select_list_ebook['id']?>"
                                                    class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $cnt = $cnt + 1;
                                            }
                                        }
                                        
                                        if($result_select_list_ebook_three->num_rows>0){
                                            while($row_select_list_ebook_three = $result_select_list_ebook_three->fetch_assoc()){
                                                ?>
                                        <tr class="text-success">
                                            <td><?php echo $cnt?></td>
                                            <td><?php echo $row_select_list_ebook_three['title']?></td>
                                            <td><?php echo $row_select_list_ebook_three['digital_book']?></td>
                                            <td><?php echo $row_select_list_ebook_three['name_auther']?></td>
                                            <td>
                                                <a class="text-success"
                                                    href="list-teacher-digital-eproject.php?file_id_view=<?php echo $row_select_list_ebook_three['id'] ?>"
                                                    target="_blank"><?php echo $row_select_list_ebook_three['name']?>
                                                </a>
                                            </td>
                                            <td><?php echo $row_select_list_ebook_three['date']?></td>
                                            <td>
                                                <a href="view-teacher-project.php?id=<?php echo $row_select_list_ebook_three['id']?>"
                                                    class="btn btn-success btn-circle btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="edit-teacher-digital-eproject.php?id=<?php echo $row_select_list_ebook_three['id']?>"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <!-- <a href="list-teacher-digital-eproject.php?id=<?php //echo $row_select_list_ebook['id']?>"
                                                    class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a> -->
                                            </td>
                                        </tr>
                                        <?php
                                        $cnt = $cnt + 1;
                                            }
                                        }
                                        

                                        if($result_select_list_ebook_four->num_rows>0){
                                            while($row_select_list_ebook_four = $result_select_list_ebook_four->fetch_assoc()){
                                                ?>
                                        <tr class="text-success">
                                            <td><?php echo $cnt?></td>
                                            <td><?php echo $row_select_list_ebook_four['title']?></td>
                                            <td><?php echo $row_select_list_ebook_four['digital_book']?></td>
                                            <td><?php echo $row_select_list_ebook_four['name_auther']?></td>
                                            <td>
                                                <a class="text-success"
                                                    href="list-teacher-digital-eproject.php?file_id_view=<?php echo $row_select_list_ebook_four['id'] ?>"
                                                    target="_blank"><?php echo $row_select_list_ebook_four['name']?>
                                                </a>
                                            </td>
                                            <td><?php echo $row_select_list_ebook_four['date']?></td>
                                            <td>
                                                <a href="view-teacher-project.php?id=<?php echo $row_select_list_ebook_four['id']?>"
                                                    class="btn btn-success btn-circle btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="edit-teacher-digital-eproject.php?id=<?php echo $row_select_list_ebook_four['id']?>"
                                                    class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <!-- <a href="list-teacher-digital-eproject.php?id=<?php //echo $row_select_list_ebook['id']?>"
                                                    class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a> -->
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

    <?php
    $query_teacher_representative = "SELECT * FROM teacher_tb WHERE teacher_mail = '$email'";
    $result_teacher_representative = $conn->query($query_teacher_representative);
    if($result_teacher_representative->num_rows>0){
        while($row_teacher_representative = $result_teacher_representative->fetch_assoc()){
            ?>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"
                                style="font-family:'Koulen', sans-serif; color: #336666;">
                                Chang Profile</h5>
                            <button class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="fa-solid fa-xmark"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group my-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="label-control mb-1" for=""
                                            style="font-family:'Koulen', sans-serif;">នាមត្រកូល
                                            <spatn class="text-danger">:*
                                            </spatn>
                                        </label>
                                        <input type="text" name="firstname" class="form-control" id=""
                                            value="<?php echo $row_teacher_representative['firstname']?>"
                                            style="font-family: 'Noto Serif Khmer', serif;">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label-control mb-1" for=""
                                            style="font-family:'Koulen', sans-serif;">នាមខ្លួន
                                            <spatn class=" text-danger">:*
                                            </spatn>
                                        </label>
                                        <input type="text" name="lastname" class="form-control" id=""
                                            value="<?php echo $row_teacher_representative['lastname']?>"
                                            style="font-family: 'Noto Serif Khmer', serif;">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group my-2">
                                <label class="label-control mb-1" for=""
                                    style="font-family:'Koulen', sans-serif;">អ៊ីម៉ែល
                                    <spatn class=" text-danger">:*
                                    </spatn>
                                </label>
                                <input type="email" name="teacher_mail" class="form-control" id=""
                                    value="<?php echo $row_teacher_representative['teacher_mail']?>"
                                    style="font-family: 'Noto Serif Khmer', serif;">
                            </div>
                            <div class="form-group my-2">
                                <label class="label-control" for=""
                                    style="font-family:'Koulen', sans-serif;">តើអ្នកចង់ប្ដូលេខសម្ងាត់ឬ ?

                                </label>
                                <div class="form-check d-flex">
                                    <input onclick="onclickShow()" class="form-check-input" type="radio"
                                        name="select_role" value="">
                                    <label class="form-check-label mx-1" style="font-family:Khmer OS System;">
                                        ប្ដូលេខសម្ងាត់
                                    </label>

                                </div>
                            </div>
                            <div id="passwords" class="hidden-changpassword">
                                <div class="form-group">
                                    <label class="label-control my-1" for=""
                                        style="font-family:'Koulen', sans-serif;">លេខសម្ងាត់
                                        <spatn class=" text-danger">:*
                                        </spatn>
                                    </label>
                                    <input type="password" name="password" class="text-input form-control" id="">
                                </div>
                                <div class="form-group my-2">
                                    <label class="label-control" for=""
                                        style="font-family:'Koulen', sans-serif;">បញ្ជាក់
                                        <spatn class=" text-danger">:*
                                        </spatn>
                                    </label>
                                    <input type="password" name="cpassword" class="form-control form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label class="label-control my-1" for=""
                                        style="font-family:'Koulen', sans-serif;">រូប
                                        profile
                                        <spatn class=" text-danger">:*
                                        </spatn>
                                    </label>
                                    <div class="file-input">
                                        <input type="file" class="btn btn-secondary text-input" name="fileImg[]"
                                            accept=".jpg, .jpeg, .png" multiple>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="submit" class=" btn btn-primary"><i
                                    class="fa-solid fa-circle-check"></i>
                                Submit</button>
                        </div>
                </div>

                </form>
            </div>



        </div>
    </div>
    <?php
        }
    }
    ?>


    <!-- Scroll to Top Button-->
    <a class=" scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script>
    function onclickShow() {
        document.getElementById('passwords').style.display = "block";
    }

    function onclickRemove() {
        document.getElementById('passwords').style.display = "none";
    }
    </script>


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