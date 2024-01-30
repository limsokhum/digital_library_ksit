<?php
require_once('controllerUserData.php');

$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
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
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: index.php');
}

if(isset($_GET['id'])){
    $delete_digital_book = $_GET['id'];
    $query_delete_digital_book = "DELETE FROM digitalbook_tb WHERE id='$delete_digital_book'";
    $result_delete_digital_book = $conn->query($query_delete_digital_book);
    if($result_delete_digital_book==TRUE){
        $_SESSION['status'] = "<Type Your success message here>";
    }
}
?>


<?php
 if(isset($_POST['edit_profile'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $advisor = mysqli_real_escape_string($conn, $_POST['advisor']);
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

    move_uploaded_file($tmpName, '../admin_dashboard_library/uploads/' . $newImageName);
    $filesArray[] = $newImageName;
    }

    $filesArray = json_encode($filesArray);
    
    $code = 0;
    
    $status = "verified";
    
    if($password==NULL && $cpassword==NULL && $filesArray==NULL && $advisor=NULL){
        $update_pass = "UPDATE usertable SET name ='$name', email='$email',code='$code',status='$status' WHERE email = '$email'";
    }elseif($password==NULL && $cpassword==NULL && $filesArray==NULL && $advisor!=NULL){
        $update_pass = "UPDATE usertable SET name ='$name', email='$email', advisor='$advisor', code='$code',status='$status' WHERE email = '$email'";
    }elseif($password==NULL && $cpassword==NULL && $filesArray!==NULL){
        $update_pass = "UPDATE usertable SET name ='$name', email='$email',image='$filesArray',code='$code',status='$status' WHERE email = '$email'";
    }else{
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET name ='$name', email='$email', password = '$encpass',  image='$filesArray',code='$code', status='$status' WHERE email = '$email'";
    }
    $result_editprofile =$conn ->query($update_pass);
    if($result_editprofile==true){
        $_SESSION['status'] = "<Type Your success message here>";
    }
}
?>



<?php
$query_user_prifile="SELECT * FROM usertable WHERE email = '$email'";
// WHERE email = '$email'
$result_user_profile = $conn->query($query_user_prifile);
if($result_user_profile ->num_rows>0){
    while($row_user_profile = $result_user_profile->fetch_assoc()){
        ?>

<!-- Start Modal Bootstrap 5 -->
<div class="modal fade" id="exampleModal" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"
                        style="font-family:'Koulen', sans-serif; color: #336666;">
                        Chang Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="label-control mb-1" for="" style="font-family:'Koulen', sans-serif;">ឈ្មោះ
                            <spatn class=" text-danger">:*
                            </spatn>
                        </label>
                        <input type="text" name="name" class="form-control" id=""
                            value="<?php echo $row_user_profile['name']?>"
                            style="font-family: 'Noto Serif Khmer', serif;">
                    </div>
                    <div class="form-group my-2">
                        <label class="label-control mb-1" for="" style="font-family:'Koulen', sans-serif;">អ៊ីម៉ែល
                            <spatn class=" text-danger">:*
                            </spatn>
                        </label>
                        <input type="text" name="email" class="form-control" id=""
                            value="<?php echo $row_user_profile['email']?>"
                            style="font-family: 'Noto Serif Khmer', serif;">
                    </div>
                    <div class="form-group my-2">
                        <label class="label-control" for=""
                            style="font-family:'Koulen', sans-serif;">តើអ្នកចង់ប្ដូលេខសម្ងាត់ឬ ?

                        </label>
                        <div class="form-check d-flex">
                            <input onclick="onclickShow()" class="form-check-input" type="radio" name="select_role"
                                value="">
                            <label class="form-check-label mx-1" style="font-family:Khmer OS System;"> ប្ដូលេខសម្ងាត់
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
                            <label class="label-control" for="" style="font-family:'Koulen', sans-serif;">បញ្ជាក់
                                <spatn class=" text-danger">:*
                                </spatn>
                            </label>
                            <input type="password" name="cpassword" class="form-control form-control">
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <label class="label-control" for=""
                            style="font-family:'Koulen', sans-serif;">តើអ្នកចង់ប្ដូគ្រូជំនួយការឬ ?

                        </label>
                        <div class="form-check d-flex">
                            <input onclick="onclickShowAdvisor()" class="form-check-input" type="radio" name=""
                                value="">
                            <label class="form-check-label mx-1" style="font-family:Khmer OS System;"> ប្ដូគ្រូជំនួយការ
                            </label>
                        </div>
                    </div>
                    <div id="advisor" class="hidden-advisor">
                        <div class="form-group">
                            <select name="advisor" class="form-control" style="font-family: 'Noto Serif Khmer', serif;">
                                <option selected>ជ្រើសរើសគ្រូជំនួយការ</option>
                                <?php
                                                $advisor_tb = "SELECT * FROM teacher_tb WHERE select_role='បុគ្គលិកដំណាងដេប៉ាតឺម៉ង់'";
                                                $result_advisor = $conn -> query($advisor_tb);
                                                if($result_advisor->num_rows > 0){
                                                    while($row = $result_advisor -> fetch_assoc()){
                                                        ?>
                                <option class="text primary form-control" value="<?php echo ($row['teacher_mail'])?>">
                                    <?php echo $row['firstname']. $row['lastname']?>
                                </option>
                                <?php
                                                }
                                                }
                                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label class="label-control my-1" for="" style="font-family:'Koulen', sans-serif;">រូប
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
                    <div class="view-profile">

                        <?php
                        if($row_user_profile['image']==NULL){
                            ?>
                        <img class="w-100" src="assets/images/user-profile.png" alt="">
                        <?php
                        }else{
                            foreach (json_decode($row_user_profile["image"]) as $image) : ?>
                        <img class="w-100" src="../admin_dashboard_library/uploads/<?php echo $image; ?>">
                        <?php endforeach; 
                        }
                         ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        style="font-family:' Koulen', sans-serif;">Close</button>

                    <button type="submit" name="edit_profile" class="btn text-light"
                        style=" background-color: #336666; font-family:'Koulen', sans-serif;">Save
                        changes</button>
                </div>
        </div>

        </form>
    </div>
</div>
<!-- Ent Modal Bootstrap 5 -->
<?php
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Custom CSS3 -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Icon Favicon -->
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Google Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Default Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <!-- Custom Search Button Function -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>List Digital Book For Users</title>
</head>

<body style="background-color: #dedede;">
    <!-- Scroll to Top -->
    <div onclick="topFunction()" id="myBtn"><i class="fa-solid fa-circle-chevron-up"
            style="color: orange; font-size: 1.4rem;"></i></div>
    <!-- Start Section Top Bar -->
    <?php include('includes/topbar.php');?>
    <!-- Ent Section Top Bar -->

    <!-- Start Navigation Bar -->
    <?php include('includes/navbar-user.php');?>
    <!-- Ent Navigation Bar -->

    <!-- Start All Section Start Content -->
    <div class="container">

        <?php
                                     if(isset($_SESSION['status']))
                                     {
                                         ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>You Add Digital Book Success!</strong> .You Can Fine on List Digital
            Book
        </div>
        <?php 
                                         unset($_SESSION['status']);
                                     }
                                    ?>

        <!-- Start Type Research -->
        <div class="card my-2" style="width: 100%;">
            <div class="card-body">
                <h4 class="type-research-title py-4">ឯកសារឌីជីថលដែលអ្នកមានដូចជា៖ e-Book, e-Project, e-Journal
                </h4>
                <div class="header-list-digital-user">
                    <div class="myarticle">
                        <h5 class="type-research-title">My Articles</h5>
                    </div>
                    <div class="button-submit-article">
                        <a class="btn btn-primary" href="add-digital-user.php"
                            style="font-family: 'Bayon', sans-serif;">New Digital
                            Book</a>
                    </div>
                </div>
                <div class="card-type-list-digital-user mt-3">
                    <div class="accordion" id="accordionExample">



                        <?php
                        $query = "SELECT * FROM digitalbook_tb WHERE  teacher_mail='$email'";
                   
                        $result = $conn->query($query);
                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                                $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                                unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                                $desc = strtr(html_entity_decode($row['abstract']),$trans);
                                $desc=str_replace(array("<li>","</li>"), array("",", "), $desc);
                                ?>
                        <!-- Modal -->
                        <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"
                                            style="font-family: 'Bayon', sans-serif;">មតិយោបល់ពី</h5>
                                        <h6 class="modal-title text-warning px-2" id="exampleModalLabel"
                                            style="font-family: 'Noto Serif Khmer', serif;">
                                            <?php echo $row['advisor']?>
                                        </h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style=" font-family: 'Noto Serif Khmer', serif;">

                                        <?php
                                            if($row['comment']==NULL){
                                                ?>
                                        <p class="text-danger" style=" font-family: 'Noto Serif Khmer', serif;">
                                            <?php echo("មិនទាន់មានមតិយោបល !");?></p>
                                        <?php
                                            }
                                         echo $row['comment']; 
                                         ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                            style="font-family: 'Noto Serif Khmer', serif;">បិត</button>
                                        <button type="button" class="btn btn-primary"
                                            style="font-family: 'Noto Serif Khmer', serif;">ទំនាក់ទំនង</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo $row['id']?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo $row['id']?>" aria-expanded="false"
                                    aria-controls="collapse<?php echo $row['id']?>">
                                    <table class="table table-striped" style="font-family: 'Noto Serif Khmer', serif;">
                                        <thead>
                                            <tr>
                                                <th scope="col">ប្រធានបទ Digital Book</th>
                                                <th scope="col">អ្នកនិពន្ធ</th>
                                                <th scope="col">អត្ថបទ</th>
                                                <th scope="col">ប្រភេទអត្ថបទ</th>
                                                <th scope="col">កាលបរិច្ឆេត</th>
                                                <th scope="col">status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo $row['title']?>
                                                </th>
                                                <td><?php echo $row['name_auther']?></td>
                                                <td><?php echo $row['name']?></td>
                                                <td><?php echo $row['digital_book']?></td>
                                                <td><?php echo $row['date']?></td>

                                                <td>
                                                    <?php 
                                                if($row['status'] == 0){
                                                    ?>
                                                    <p class="text-primary"><?php echo("Please Waiting");?></p>
                                                    <?php
                                                }elseif($row['status'] ==1){
                                                    ?>
                                                    <p class="text-secondary"><?php echo("Publish");?></p>
                                                    <?php
                                                }elseif($row['status'] ==2){
                                                    ?>
                                                    <p class="text-success"><?php echo("Editing");?></p>
                                                    <?php
                                                }elseif($row['status'] ==3){
                                                    ?>
                                                    <p class="text-danger"><?php echo("Rejecked");?></p>
                                                    <?php
                                                }
                                            ?>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $row['id']?>" class="accordion-collapse collapse"
                                aria-labelledby="heading<?php echo $row['id']?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php 
                                    echo $desc
                                    ?>
                                    <a class="btn btn-info" href="#" style="font-family: 'Noto Serif Khmer', serif;"
                                        data-bs-toggle="modal" data-bs-target="#commentModal">មើលមតិយោបល់</a>
                                    <a class="btn btn-primary"
                                        href="edit-digital-book-user.php?id=<?php echo $row['id']?>"
                                        style="font-family: 'Noto Serif Khmer', serif;">កែសម្រួល</a>
                                    <a class="btn btn-danger"
                                        href="list-digital-book-user.php?id=<?php echo $row['id']?>"
                                        style="font-family: 'Noto Serif Khmer', serif;">លុបឯកសារ</a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        ?>




                    </div>



                </div>
            </div>
        </div>
        <!-- End Type Research -->



    </div>
    <!-- Ent All Section Start Content -->








    <!-- Start Bottom Footer -->
    <?php include('includes/footer.php');?>
    <!-- Start Bottom Footer -->
    <!-- Start Bottom Footer Copyright -->
    <?php include('includes/bottom.php');?>
    <!-- Ent Bottom Footer Copyright -->


    <script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>

    <script>
    function onclickShow() {
        document.getElementById('passwords').style.display = "block";
    }

    function onclickRemove() {
        document.getElementById('passwords').style.display = "none";
    }
    </script>
    <script>
    function onclickShowAdvisor() {
        document.getElementById('advisor').style.display = "block";
    }

    function onclickRemove() {
        document.getElementById('advisor').style.display = "none";
    }
    </script>
    <!-- Script Js Default Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>