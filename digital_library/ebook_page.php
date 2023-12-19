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

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

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
    <style>
    .swiper {
        width: 100%;
        height: 50%;
    }

    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 13rem;
        height: 18rem;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
    }
    </style>
    <title>E-Book Page</title>
</head>

<body style="background-color: #dedede;">
    <!-- Scroll to Top -->
    <div onclick="topFunction()" id="myBtn"><i class="fa-solid fa-circle-chevron-up"
            style="color: orange; font-size: 1.4rem;"></i></div>
    <!-- Start Section Top Bar -->
    <?php include('includes/topbar.php');?>
    <!-- Ent Section Top Bar -->

    <!-- Start Navigation Bar -->
    <?php include('includes/navbar.php')?>
    <!-- Ent Navigation Bar -->

    <!-- Start All Section Start Content -->
    <div class="container">
        <!-- Start Slide Show -->
        <div class="card mt-2" style="width: 100%; box-shadow: 0 6px 15px grey; outline:#242424;">
            <div class="row container-header">
                <div class="col-sm-6"
                    style="background-image: url('assets/images/banner-journal.png'); background-repeat: no-repeat; background-size: cover;">
                    <div class="card-body">
                        <p class="contanct-text text-light">សិក្សាបានគ្រប់ពេលវេលា និងគ្រប់ទីកន្លែង</p>
                        <h3 class="contanct-title">សូមស្វាគមន៍មកកាន់
                            ប្រព័ន្ធគ្រប់គ្រងបណ្ណាល័យឌីជីថលវិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ</h3>
                        <dl class="text-light">
                            <dt>និស្សិត និងអ្នកស្រាវជ្រាវទូទៅ ៖</dt>
                            <dd class="mt-1">- អាចធ្វើការស្វែងរកឯកសារឌីជីថលដូចជា e-Book, e-Project, e-Journal ដោយអាច
                                filter តាម metadata មួយចំនួនដូចជា ឆ្នាំបោះពុម្ភ ឈ្មោះអ្នកនិពន្ធ ចំណងជើង ប្រភេទអត្ថបទ
                                និងពាក្យគន្លឹះបាន។</dd>
                            <dd>- អាចទាញយកឯកសារ។</dd>
                        </dl>
                        <a href="#" class="btn btn-success"
                            style="color: #fff; font-family: 'Bayon', sans-serif; background-color: #336666;">ឯកសារស្រាវជ្រាវ</a>
                        <div class="col-sm-12">
                            <div class="containct-contact-us float-end">
                                <div class="contanct-title">
                                    Contact-us៖
                                </div>
                                <div class="email">
                                    <i class="fa-solid fa-envelope fs-5" style="color: orange;"></i><a href=""
                                        class="text-decoration-none mx-2 text-light fw-bolder">info@ksit.edu.kh,
                                        bunhe@ksit.edu.kh</a>
                                </div>
                                <div class="phone d-flex">
                                    <i class="fa-solid fa-phone-volume fs-5" style="color: orange;"></i>
                                    <p class="mx-2 fw-bolder text-light">+855 97 222 0 829</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-flex justify-content-center align-items-center banner-ebook">
                    <div class="section-right-coner">

                        <!-- Swiper -->
                        <div class="swiper mySwiper mt-3">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="http://ebooks.elibrary-rule.com/public/images/saranas/thumb/2015thesis_Page_04.jpg"
                                        alt="" style="width: 100%; height: 100%;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="http://ebooks.elibrary-rule.com/public/images/saranas/thumb/2015thesis_Page_04.jpg"
                                        alt="" style="width: 100%; height: 100%;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="http://ebooks.elibrary-rule.com/public/images/saranas/thumb/2015thesis_Page_04.jpg"
                                        alt="" style="width: 100%; height: 100%;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="http://ebooks.elibrary-rule.com/public/images/saranas/thumb/2015thesis_Page_04.jpg"
                                        alt="" style="width: 100%; height: 100%;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="http://ebooks.elibrary-rule.com/public/images/saranas/thumb/2015thesis_Page_04.jpg"
                                        alt="" style="width: 100%; height: 100%;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="http://ebooks.elibrary-rule.com/public/images/saranas/thumb/2015thesis_Page_04.jpg"
                                        alt="" style="width: 100%; height: 100%;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="http://ebooks.elibrary-rule.com/public/images/saranas/thumb/2015thesis_Page_04.jpg"
                                        alt="" style="width: 100%; height: 100%;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="http://ebooks.elibrary-rule.com/public/images/saranas/thumb/2015thesis_Page_04.jpg"
                                        alt="" style="width: 100%; height: 100%;">
                                </div>
                                <div class="swiper-slide">
                                    <img src="http://ebooks.elibrary-rule.com/public/images/saranas/thumb/2015thesis_Page_04.jpg"
                                        alt="" style="width: 100%; height: 100%;">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                        <img class="mt-3" src="assets/images/table.png" style="width: 100%;">

                    </div>
                </div>
            </div>
        </div>
        <!-- End slide Show -->

        <!-- Start Content Computer -->
        <div class="section-computer my-2">

            <div class="title d-flex">
                <div class="computer">
                    <h5>កម្រងអត្ថបទ</h5>
                </div>
                <div class="rows"></div>
            </div>

            <div class="card" style="width: 100%;">

                <div class="container row my-4">
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                        <div id="myTable" class="card mb-2" style="width: 100%;">
                            <a href="page_activities.html" class="text-decoration-none">
                                <div class="card-body news-announcements">
                                    <div class="img-news">
                                        <img src="assets/images/banner-ksit.png" alt="">
                                    </div>
                                    <div class="detail-news">
                                        <h6 class="research-title">1ពិធីចុះកិច្ចព្រមព្រៀងសហប្រតិបត្តិការលើវិស័យអប់រំ
                                            រវាង
                                            វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ</h6>
                                        <p class="research-text">វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ, ថ្ងៃទី៤ ខែកុម្ភៈ
                                            ឆ្នាំ២០២២ ៖ ពិធីចុះកិច្ចព្រមព្រៀងសហប្រតិបត្តិការលើវិស័យអប់រំ រវាង
                                            វិទ្យាស្ថានបច្ចេកវិទ្យាកំពង់ស្ពឺ និងការិយាល័យអប់រំ យុវជន</p>
                                    </div>
                                </div>
                            </a>

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
                            <input id="myInput" class="form-control me-2 form-search" type="text" placeholder="..."
                                style="width: 22rem;">
                            <button class="btn btn-success submit-search" type="submit">ស្វែងរក</button>
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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        autoplay: {
            delay: 2000,
        },
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
    </script>

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