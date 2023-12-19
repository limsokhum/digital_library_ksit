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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Google Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Default Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <!-- Custom Search Button Function -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable .card-body").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

            });

        });

    });
    </script>

    <title>Department Page</title>
</head>

<body style="background-color: #dedede;">
    <!-- Scroll to Top -->
    <div onclick="topFunction()" id="myBtn"><i class="fa-solid fa-circle-chevron-up"
            style="color: orange; font-size: 1.4rem;"></i></div>
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
                    <h5>វិទ្យាសាស្រ្ដជលផល</h5>
                </div>
                <div class="rows"></div>
            </div>

            <div class="card" style="width: 100%;">

                <div class="container row my-4">
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                        <div class="card mb-2" style="width: 100%;">
                            <div class="card-body detail-department">
                                <div class="detail-news">
                                    <h6 class="research-title">
                                        ចំណេះដឹងមូលដ្ឋានដែលបេក្ខជនត្រូវចេះសម្រាប់ទៅសិក្សាមុខជំនាញនេះ​៖</h6>
                                    <ul>
                                        <li class="research-text">គីមីវិទ្យា​</li>
                                        <li class="research-text">ជីវវិទ្យា</li>
                                    </ul>
                                    <h6 class="research-title">ការសិក្សាដើម្បីទទួលបានសញ្ញាបត្របរិញ្ញាបត្ររងលើមុខជំនាញនេះ
                                        ៖</h6>
                                    <ul>
                                        <li class="research-text">មានរយៈពេល ២ ឆ្នាំ យ៉ាងតិច​ ៦០ ក្រេឌីត​</li>
                                    </ul>
                                    <h6 class="research-title">ចំណេះដឹង
                                        និងបំណិនដែលនិស្សិតទទួលបានក្រោយពីបញ្ចប់ការសិក្សារយៈពេល២ឆ្នាំ៖</h6>
                                    <ul>
                                        <li class="research-text">យល់ដឹងពីវិធីសាស្រ្តចិញ្ចឹមសត្វទឹក​</li>
                                        <li class="research-text">យល់ដឹងពីការជ្រើសរើស និងបង្កាត់ពូជសត្វទឹក</li>
                                        <li class="research-text">យល់ដឹងពីការគ្រប់គ្រងកាកសំណល់ និងបរិស្ថានក្នុងទឹក</li>
                                        <li class="research-text">យល់ដឹងពីវិធីសាស្រ្តព្យាបាលសត្វទឹក</li>
                                        <li class="research-text">
                                            យល់ដឹងពីការត្រួតពិនិត្យគុណភាពវត្ថុធាតុដើមរបស់ចំណីសត្វទឹក</li>
                                        <li class="research-text">យល់ដឹងពីការលាយចំណីសត្វទឹកតាមវិធីសាស្រ្</li>
                                        <li class="research-text">យល់ដឹងពីការប្រើបា្រស់ និងជួសជុលថែទាំឧបករណ៍
                                            និងកសិដ្ឋានសត្វទឹក</li>
                                        <li class="research-text">យល់ដឹងពីការគ្រប់គ្រងផ្នែកផលិត និងទីផ្សារ</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div id="myTable" class="card mb-2" style="width: 100%;">
                            <div class="card-body news-announcements">
                                <div class="img-news">
                                    <img src="assets/images/banner-ksit.png" alt="">
                                </div>
                                <div class="detail-news">
                                    <h6 class="research-title">1ពិធីចុះកិច្ចព្រមព្រៀងសហប្រតិបត្តិការលើវិស័យអប់រំ រវាង
                                        វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ</h6>
                                    <p class="research-text">វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ, ថ្ងៃទី៤ ខែកុម្ភៈ
                                        ឆ្នាំ២០២២ ៖ ពិធីចុះកិច្ចព្រមព្រៀងសហប្រតិបត្តិការលើវិស័យអប់រំ រវាង
                                        វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ និងការិយាល័យអប់រំ យុវជន</p>
                                </div>
                            </div>
                            <div class="card-body news-announcements">
                                <div class="img-news">
                                    <img src="assets/images/banner-ksit.png" alt="">
                                </div>
                                <div class="detail-news">
                                    <h6 class="research-title">2ពិធីចុះកិច្ចព្រមព្រៀងសហប្រតិបត្តិការលើវិស័យអប់រំ រវាង
                                        វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ</h6>
                                    <p class="research-text">វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ, ថ្ងៃទី៤ ខែកុម្ភៈ
                                        ឆ្នាំ២០២២ ៖ ពិធីចុះកិច្ចព្រមព្រៀងសហប្រតិបត្តិការលើវិស័យអប់រំ រវាង
                                        វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ និងការិយាល័យអប់រំ យុវជន</p>
                                </div>
                            </div>
                            <div class="card-body news-announcements">
                                <div class="img-news">
                                    <img src="assets/images/banner-ksit.png" alt="">
                                </div>
                                <div class="detail-news">
                                    <h6 class="research-title">3ពិធីចុះកិច្ចព្រមព្រៀងសហប្រតិបត្តិការលើវិស័យអប់រំ រវាង
                                        វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ</h6>
                                    <p class="research-text">វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ, ថ្ងៃទី៤ ខែកុម្ភៈ
                                        ឆ្នាំ២០២២ ៖ ពិធីចុះកិច្ចព្រមព្រៀងសហប្រតិបត្តិការលើវិស័យអប់រំ រវាង
                                        វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ និងការិយាល័យអប់រំ យុវជន</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">

                        <div class="card" style="width: 100%;">
                            <div class="card-body content-activities">
                                <div class="details-images">
                                    <img src="https://dcs.ksit.edu.kh/assets/images/6321844d894c6.jpg" alt="">
                                    <img src="https://dcs.ksit.edu.kh/assets/images/6321844d894c7.jpg" alt="">
                                    <img src="https://dcs.ksit.edu.kh/assets/images/6321844d894c8.jpg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="card mt-2" style="width: 100%;">
                            <div class="card-body major-study">
                                <h6 class="major-title">ជំនាញសិក្សា</h6>
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
                        <!-- <form class="d-flex mt-2">
                            <input id="myInput" class="form-control me-2" type="text" placeholder="..."
                                aria-label="Search" style="width: 22rem;">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form> -->
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