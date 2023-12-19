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
    
    $query_edit_digital_book_id = $_GET['id'];
    
    if (isset($_POST['submit'])) { 
    
        $title = $_POST['title'];
        
        $name_auther = $_POST['name_auther'];
        
        $date = $_POST['date'];
    
        $digital_book =$_POST['digital_book'];
        
        $teacher_mail = $_POST['teacher_mail'];
        
        $select_major = $_POST['select_major'];
    
        $abstract = $_POST['abstract'];
    
        $query_update_digital_book = "UPDATE digitalbook_tb SET title='$title',name_auther='$name_auther',date='$date',digital_book='$digital_book',select_major='$select_major',abstract='$abstract',status=1 WHERE id='$query_edit_digital_book_id'";
        
        $result_update_digital_book = $conn->query($query_update_digital_book);
        
        if($result_update_digital_book==TRUE){
            echo "
            <script>
            alert('You Update Success');
            document.location.href='e-books.php';
            </script>
            ";
        }
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

    <title>admin add digital book</title>

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
    <style>
    .upload-files {
        display: flex;
        justify-content: center;
        border: 2px dashed grey;
        border-radius: 5px;
    }

    .file-areas {
        padding: 20px 0px;
    }

    .file-areas h3 {
        text-align: center;
    }

    .file-areas p {
        text-align: center;
    }
    </style>
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
                    <!-- <h1 class="h3 mb-2 text-gray-800">Add e-Book</h1> -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 float-start font-weight-bold text-primary">Insert Data</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="p-5">
                                <?php
                                if(isset($_GET['id'])){
                                $query_edit_digital_book_id = $_GET['id'];
                                $query_select_digital_book = "SELECT * FROM digitalbook_tb WHERE id='$query_edit_digital_book_id'";
                                $result_select_digital_book = $conn->query($query_select_digital_book);
                                if($result_select_digital_book->num_rows>0){
                                    while($row_select_digital_book = $result_select_digital_book->fetch_assoc()){
                                        ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="label-control" for=""
                                            style="font-family:'Koulen', sans-serif;">ប្រធានបទ Digital Book
                                            <spatn class=" text-danger">:*
                                            </spatn>
                                        </label>
                                        <input type="text" name="title" class="form-control form-control" id=""
                                            value="<?php echo $row_select_digital_book['title']?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <label class="label-control" for=""
                                                    style="font-family:'Koulen', sans-serif;">ឈ្មោះអ្នកនិពន្ធ
                                                    <spatn class=" text-danger">:*
                                                    </spatn>
                                                </label>
                                                <input type="text" name="name_auther" class="form-control form-control"
                                                    id="" value="<?php echo $row_select_digital_book['name_auther']?>">
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="label-control" for=""
                                                    style="font-family:'Koulen', sans-serif;">កាលបរិច្ឆេត
                                                    <spatn class=" text-danger">:*
                                                    </spatn>
                                                </label>
                                                <input type="date" name="date" class="form-control form-control" id=""
                                                    aria-describedby=""
                                                    value="<?php echo $row_select_digital_book['date']?>">


                                            </div>
                                            <!-- <div class="col-sm-3">
                                                <label class="label-control" for=""
                                                    style="font-family:'Koulen', sans-serif;">កម្រងរូបភាព
                                                    <spatn class=" text-danger">:*
                                                    </spatn>
                                                </label>
                                                <div class="file-input">
                                                    <input type="file" class="file-control" name="fileImg[]"
                                                        accept=".jpg, .jpeg, .png" required multiple>
                                                </div>

                                            </div> -->
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <label class="label-control" for=""
                                                    style="font-family:'Koulen', sans-serif;">ប្រភេទអត្ថបទ
                                                    <spatn class=" text-danger">:*
                                                    </spatn>
                                                </label>
                                                <div class="radio-control">
                                                    <?php
                                                    if($row_select_digital_book['digital_book']=='e-book'){
                                                        ?>
                                                    <input type="radio" name="digital_book" class="" id=""
                                                        value="e-book" checked>
                                                    <label for="">e-Book, </label>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if($row_select_digital_book['digital_book']=='e-project'){
                                                        ?>
                                                    <input type="radio" name="digital_book" class="" id=""
                                                        aria-describedby="" value="e-project">
                                                    <label for="">e-Project, </label>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if($row_select_digital_book['digital_book']=='e-project'){
                                                        ?>
                                                    <input type="radio" name="digital_book" class="" id=""
                                                        aria-describedby="" value="e-project">
                                                    <label for="">e-Project, </label>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                                <!-- select_major -->

                                            </div>
                                            <div class="col-sm-6">
                                                <label class="label-control" for=""
                                                    style="font-family:'Koulen', sans-serif;">ជំនាញ
                                                    <spatn class=" text-danger">:*
                                                    </spatn>
                                                </label>
                                                <!-- select_major -->
                                                <?php
                                                // $query_admin_select ="SELECT * FROM admintable";
                                                // $result_admin_select = $conn -> query($query_admin_select);
                                                // if($result_admin_select-> num_rows > 0){
                                                //     while($row_admin_select = $result_admin_select->fetch_assoc()){
                                                        ?>

                                                <!-- <input type="hidden" name="teacher_mail"
                                                    class="form-control form-control" id=""
                                                    value="<?php //echo $row_admin_select['email']?>"> -->
                                                <?php
                                                //     }
                                                // }
                                                ?>

                                                <select name="select_major" class="form-control"
                                                    aria-label="Default select">
                                                    <option selected>ជ្រើសរើសជំនាញ</option>
                                                    <?php
                                                $department_tb = "SELECT * FROM major_tb";
                                                $department_tb_result = $conn -> query($department_tb);
                                                if($department_tb_result->num_rows > 0){
                                                    while($row = $department_tb_result -> fetch_assoc()){
                                                        ?>
                                                    <option value="<?php echo ($row['major_title'])?>">
                                                        <?php echo ($row['major_title'])?>
                                                    </option>
                                                    <?php
                                                }
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="label-control" for=""
                                                style="font-family:'Koulen', sans-serif;">មូលន័យសង្ខេប
                                                <spatn class=" text-danger">:*
                                                </spatn>
                                            </label>
                                            <textarea name="abstract" id="" cols="30" rows="10"
                                                class="summernote form-control">
                                                <?php echo $row_select_digital_book['abstract']?>
                                        </textarea>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="wrapper">
                                                <div class="upload-files">
                                                    <div class="select-file">
                                                        <div class="file-areas" data-img="">
                                                            <h3>File Upload</h3>
                                                            <p>Image size must be less than <span>1000MB</span>
                                                            </p>
                                                            <input class="btn btn-primary" type="file" name="myfile">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> -->
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary"><i
                                            class="fa-solid fa-circle-check"></i>
                                        Add e-Book
                                    </button>
                                </form>
                                <?php
                                    }
                                }
                                }
                                ?>


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
    <?php include('logout-modal.php');?>

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

    <!-- Summernote -->
    <script src="vendor/summernote/summernote-bs4.min.js"></script>
    <script src="vendor/summernote/summernote-bs4.min.css"></script>
    <script>
    $('.summernote').summernote({

        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript',
                'clear'
            ]],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ol', 'ul', 'paragraph', 'height']],
            ['table', ['table']],
            ['remove', ['removeMedia']],
            ['insert', ['link', 'unlink', 'hr']],
            ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']],

        ],

        fontNames: [
            'Khmer OS System', 'Sans', 'Khmer OS Siemreap', 'Khmer OS Muol Light', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande',
            'Sacramento',
        ],
    })
    </script>
</body>

</html>