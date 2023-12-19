<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Custom CSS3 -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Icon Favicon -->
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Default Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>View Admin Page</title>
</head>

<body style="background-color: #dedede;">
    <!-- Scroll to Top -->
    <div onclick="topFunction()" id="myBtn"><i class="fa-solid fa-circle-chevron-up"
            style="color: orange; font-size: 1.4rem;"></i>
    </div>

    <!-- Start Section Top Bar -->
    <?php include('includes/topbar.php');?>

    <!-- Ent Section Top Bar -->

    <!-- Start Navigation Bar -->
    <?php include('includes/navbar.php');?>

    <!-- Ent Navigation Bar -->

    <!-- Start All Section Start Content -->
    <div class="container">
        <!-- Start Content Computer -->
        <div class="section-computer mt-2">

            <div class="title d-flex">
                <div class="computer">
                    <h5>គណៈគ្រប់គ្រង</h5>
                </div>
                <div class="rows"></div>
            </div>

            <div class="card" style="width: 100%;">

                <div class="container row my-4">
                    <div class="col-sm-8">
                        <div class="card mb-2" style="width: 100%;">


                            <div class="container">
                                <div class="card my-2" style="width: 100%; border-color: orange;">

                                    <div class="container">
                                        <div class="card-body">
                                            <h5 class="staff-title">នាយក</h5>
                                            <div class="rowses"></div>
                                            <div class="control-profile row my-2">
                                                <div class="col-sm-4 staff-profile">
                                                    <div class="bg-profile">
                                                        <img src="assets/images/admin-hong-kimcheang.jpg" alt="">
                                                    </div>
                                                    <!-- <div class="staff-name text-center mt-2">
                                                        <h6 class="staff-name">Name: SOKHUM</h6>
                                                    </div> -->
                                                </div>
                                                <div class="col-sm-8">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <span class="list-staf fw-bolder">ឈ្មោះ</span>
                                                            <span class="text-warning fw-bolder"> :*</span>
                                                            <span class="detail-staf">ឯកឧត្ដមបណ្ឌិត ហុង គីមជាង</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="list-staf fw-bolder">ភេទ</span>
                                                            <span class="text-warning fw-bolder"> :*</span>
                                                            <span class="detail-staf">ប្រុស</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="list-staf fw-bolder">អ៊ីម៊ែល</span>
                                                            <span class="text-warning fw-bolder"> :*</span>
                                                            <span class="detail-staf">hongkimcheang@ksit.edu.com</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="list-staf fw-bolder">ទូរស័ព្ទ</span>
                                                            <span class="text-warning fw-bolder"> :*</span>
                                                            <span class="detail-staf">+855 87288682</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card my-2" style="width: 100%; border-color: orange;">

                                    <div class="container">
                                        <div class="card-body">
                                            <h5 class="staff-title">នាយករង</h5>
                                            <div class="rowses"></div>
                                            <div class="control-profile row my-2">
                                                <div class="col-sm-4 staff-profile">
                                                    <div class="bg-profile">
                                                        <img src="assets/images/admin-harth-bonhe.jpg" alt="">
                                                    </div>
                                                    <!-- <div class="staff-name text-center mt-2">
                                                        <h6 class="staff-name">Name: SOKHUM</h6>
                                                    </div> -->
                                                </div>
                                                <div class="col-sm-8">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <span class="list-staf fw-bolder">ឈ្មោះ</span>
                                                            <span class="text-warning fw-bolder"> :*</span>
                                                            <span class="detail-staf">ឯកឧត្ដមបណ្ឌិត ហុង គីមជាង</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="list-staf fw-bolder">ភេទ</span>
                                                            <span class="text-warning fw-bolder"> :*</span>
                                                            <span class="detail-staf">ប្រុស</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="list-staf fw-bolder">អ៊ីម៊ែល</span>
                                                            <span class="text-warning fw-bolder"> :*</span>
                                                            <span class="detail-staf">hongkimcheang@ksit.edu.com</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="list-staf fw-bolder">ទូរស័ព្ទ</span>
                                                            <span class="text-warning fw-bolder"> :*</span>
                                                            <span class="detail-staf">+855 87288682</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="conten-show-more">
                                                <div class="title-about-staf">
                                                    <span class="list-staf fw-bolder">អំពីរនាយក៖</span>

                                                </div>
                                                Summary
                                                I have been working for Kampong Speu Institute of Technology (KSIT) as a
                                                Teacher of Business Computer. I have some duties as follows:

                                                Teaching on Computer field such as: Computer for career, Computer
                                                Installation, Computer Network, Local Wireless Network, Basic of
                                                Computer programming and Website.
                                                Monitoring Network Systems and Internet.
                                                Advisor of students’ projects in the Business Computer Department.
                                                Administrator Digital E-Learning platform based on Moodle application
                                                Education Background
                                                2012-2016: Bachelor’ s Degree of Computer Science, Sisaket Rajabhat
                                                University, Thailand
                                                2010-2012: Associate’ s Degree of Computer Technology, Sisaket Technical
                                                College, Thailand
                                                2007-2010: Diploma of Electronics, Sisaket Technical College, Thailand
                                                2006-2007: Secondary School, Kampong Chheuteal high school, Cambodia
                                                Spacial skill
                                                Microsoft office Application

                                                Adobe Photoshop
                                                Install network system and administration
                                                Install CCTV, Computer software application and Hardware
                                                Basic Computer programming and Web development
                                                Internet of Things (IoTs, Smart Home, Smart Farm)
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- <div class="card-body news-announcements">
                                <div class="img-news">
                                    <img src="assets/images/banner-ksit.png" alt="">
                                </div>
                                <div class="detail-news">
                                    <h6 class="research-title">ពិធីចុះកិច្ចព្រមព្រៀងសហប្រតិបត្តិការលើវិស័យអប់រំ រវាង
                                        វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ</h6>
                                    <p class="research-text">វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ, ថ្ងៃទី៤ ខែកុម្ភៈ
                                        ឆ្នាំ២០២២ ៖ ពិធីចុះកិច្ចព្រមព្រៀងសហប្រតិបត្តិការលើវិស័យអប់រំ រវាង
                                        វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ និងការិយាល័យអប់រំ យុវជន</p>
                                </div>
                            </div> -->

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card" style="width: 100%;">
                            <div class="card-body major-study">
                                <h6 class="major-title">បុគ្គលិកបង្រៀន</h6>
                                <ul>
                                    <li class="d-flex align-items-center"><i class="fa-solid fa-angle-right fa-sm me-2"
                                            style="color: #336666;"></i><a href=""
                                            class="text-decoration-none text-dark">ជំនាញវិទ្យាសាស្រ្តដំណាំ</a></li>
                                    <li class="d-flex align-items-center"><i class="fa-solid fa-angle-right fa-sm me-2"
                                            style="color: #336666;"></i><a href=""
                                            class="text-decoration-none text-dark">ជំនាញវិទ្យាសាស្រ្តសត្វ</a></li>
                                    <li class="d-flex align-items-center"><i class="fa-solid fa-angle-right fa-sm me-2"
                                            style="color: #336666;"></i><a href=""
                                            class="text-decoration-none text-dark">ជំនាញវិទ្យាសាស្រ្តជលផល</a></li>
                                    <li class="d-flex align-items-center"><i class="fa-solid fa-angle-right fa-sm me-2"
                                            style="color: #336666;"></i><a href=""
                                            class="text-decoration-none text-dark">ជំនាញកុំព្យូទ័រធុរកិច្ច</a></li>
                                    <li class="d-flex align-items-center"><i class="fa-solid fa-angle-right fa-sm me-2"
                                            style="color: #336666;"></i><a href=""
                                            class="text-decoration-none text-dark">ជំនាញបច្ចេកវិទ្យាកុំព្យូទ័រ</a></li>
                                    <li class="d-flex align-items-center"><i class="fa-solid fa-angle-right fa-sm me-2"
                                            style="color: #336666;"></i><a href=""
                                            class="text-decoration-none text-dark">ជំនាញបច្ចេកវិទ្យាមេកានិច</a></li>
                                    <li class="d-flex align-items-center"><i class="fa-solid fa-angle-right fa-sm me-2"
                                            style="color: #336666;"></i><a href=""
                                            class="text-decoration-none text-dark">ជំនាញបច្ចេកវិទ្យាអាហារ</a></li>
                                    <li class="d-flex align-items-center"><i class="fa-solid fa-angle-right fa-sm me-2"
                                            style="color: #336666;"></i><a href=""
                                            class="text-decoration-none text-dark">ផ្នែកអប់រំបច្ចេកទេសវិជ្ជាជីវៈកម្រិត៣
                                            "បសុវប្បកម្ម"</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Ent Content Computer -->

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
    <!-- Script Js Default Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>