<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Medimoor</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- custom css -->
        <link rel = "stylesheet" href = "assets/css/main.css" />
        <link rel = "stylesheet" href = "assets/css/utilities.css" />
        <!-- normalize.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        
        <div class="page-wrapper">
            <!-- header -->
            <header class = "header">
                <nav class = "navbar">
                    <div class="container">
                        <div class="navbar-content d-flex justify-content-between align-items-center">
                            <div class = "brand-and-toggler d-flex align-items-center justify-content-between">
                                <a href = "/" class = "navbar-brand d-flex align-items-center">
                                    <span class="brand-shape d-inline-block text-white">M</span>
                                    <span class="brand-text fw-7">Medimoor</span>
                                </a>
                                <button type = "button" class = "d-none navbar-show-btn">
                                    <i class = "fas fa-bars"></i>
                                </button>
                            </div>

                            <div class = "navbar-box">
                                <button type = "button" class = "navbar-hide-btn">
                                    <i class = "fas fa-times"></i>
                                </button>

                                <ul class = "navbar-nav d-flex align-items-center">
                                    <li class = "nav-item">
                                        <a href = "/" class = "nav-link text-white nav-active text-nowrap">Home</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href = "#" class = "nav-link text-white text-nowrap">Alur Kerja</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href="{{ route('login') }}" class = "nav-link text-white text-nowrap">Log In</a>
                                    </li>
                                    <!-- <li class = "nav-item">
                                        <a href = "#" class = "nav-link text-white text-nowrap">About us</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="element-one">
                    <img src = "assets/images/element-img-1.png" alt = "">
                </div>

                <div class="banner">
                    <div class="container">
                        <div class="banner-content">
                            <div class="banner-left">
                                <div class="content-wrapper">
                                    <!-- Content -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>
            <!-- end of header -->

            <footer class = "footer">
                <div class = "container">
                    <div class = "footer-content">
                        <div class = "footer-list d-grid text-white">
                            <div class = "footer-item">
                                <a href = "#" class = "navbar-brand d-flex align-items-center">
                                    <span class = "brand-shape d-inline-block text-white">M</span>
                                    <span class = "brand-text fw-7">Medimoor</span>
                                </a>
                                <p class = "text-white">Medimoor provides progressive, and affordable healthcare, accessible on mobile and online for everyone</p>
                                <p class = "text-white copyright-text">&copy; Medimoor PTY LTD 2024. All rights reserved.</p>
                            </div>

                            <div class = "footer-item">
                                <h3 class = "footer-item-title">Company</h3>
                                <ul class = "footer-links">
                                    <li><a href = "#">About</a></li>
                                    <li><a href = "#">Find a doctor</a></li>
                                    <li><a href = "#">Apps</a></li>
                                </ul>
                            </div>

                            <div class = "footer-item">
                                <h3 class = "footer-item-title">Region</h3>
                                <ul class = "footer-links">
                                    <li><a href = "#">Indonesia</a></li>
                                    <li><a href = "#">Singapore</a></li>
                                    <li><a href = "#">Hongkong</a></li>
                                    <li><a href = "#">Canada</a></li>
                                </ul>
                            </div>

                            <div class = "footer-item">
                                <h3 class = "footer-item-title">Help</h3>
                                <ul class = "footer-links">
                                    <li><a href = "#">Help center</a></li>
                                    <li><a href = "#">Contact support</a></li>
                                    <li><a href = "#">Instructions</a></li>
                                    <li><a href = "#">How it works</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "footer-element-1">
                    <img src = "assets/images/element-img-4.png" alt = "">
                </div>
                <div class = "footer-element-2">
                    <img src = "assets/images/element-img-5.png" alt = "">
                </div>
            </footer>
        </div>

        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- owl carousel -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src = "assets/js/script.js"></script>
    </body>
</html>