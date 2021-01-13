<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PT BPR Bumi Bandung Kencana</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Mamba - v2.1.0
    * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    @yield("css")
</head>

<body>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
            <i class="icofont-phone"></i> (022) 6016018
        </div>
        <div class="social-links float-right">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="#" class="skype"><i class="icofont-skype"></i></a>
            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
        </div>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header">
    <div class="container">

        <div class="logo float-left">
            <h1 class="text-light"><a href="/"><img src="/assets/img/logobbk_1.png"></a></h1>
            <!-- Uncomment below if you prefer to use an image logo 0-->
            <!-- <a href="index.html"><img src="/assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu float-right d-none d-lg-block">
            <ul>
                <li class="active"><a href="#hero">Home</a></li>
                <li><a href="#profile">Profile</a></li>
                <li><a href="#pko">Pengajuan Kredit Online</a></li>

                <li class="drop-down"><a href="#produk">Produk</a>
                    <ul>
                        <li><a href="#produk">Tabungan Kencana</a></li>
                        <li><a href="#produk">Deposito Kencana</a></li>
                        <li><a href="#produk">Kredit Pegawai</a></li>
                        <li><a href="#produk">Kredit Pensiun</a></li>
                    </ul>
                </li>
                <li><a href="{{route("login")}}">Login</a></li>

            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
@if(Route::currentRouteName() == "landing.index")
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url('/assets/img/bbkmelong1.jpg');">
                    <div class="carousel-container">
                        <div class="carousel-content container">
                            <h2 class="animated fadeInDown">Welcome to <span>BPRBBK</span></h2>
                            <p class="animated fadeInUp">PT BPR Bumi Bandung Kencana merupakan perusahaan yang bergerak di bidang perbankan. Perusahaan ini sudah berdiri sejak tahun 2000 sampai dengan sekarang. Kami membantu nasabah yang membutuhkan kredit dengan berbagai macam produk</p>
                            <a href="#about" class="btn-get-started animated fadeInUp scrollto">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url('/assets/img/bbksriwijaya.jpg');">
                    <div class="carousel-container">
                        <div class="carousel-content container">
                            <h2 class="animated fadeInDown">Lorem Ipsum Dolor</h2>
                            <p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                            <a href="#about" class="btn-get-started animated fadeInUp scrollto">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url('/assets/img/bbksubang1.jpg');">
                    <div class="carousel-container">
                        <div class="carousel-content container">
                            <h2 class="animated fadeInDown">Sequi ea ut et est quaerat</h2>
                            <p class="animated fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                            <a href="#about" class="btn-get-started animated fadeInUp scrollto">Read More</a>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</section><!-- End Hero -->
@endif

<main id="main">
    @yield("content")
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-2 col-md-6 footer-info">
                    <h3></h3>
                    <p>
                        <b>Kantor Pusat</b><br>
                        Jl. Melong Asih No.30, Melong<br>Kec. Cimahi Sel., Kota Cimahi, Jawa Barat 40534
                        <br><br>
                        <strong>Phone:</strong><br> (022) 6016018<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-info">
                    <h3></h3>
                    <p>
                        <b>Cabang 1</b><br>
                        Jl. Sriwijaya No.26, Cigereleng<br>Kec. Regol, Kota Bandung, Jawa Barat 40253
                        <br><br>
                        <strong>Phone:</strong><br> (022) 5229730<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-info">
                    <h3></h3>
                    <p>
                        <b>Cabang 2</b><br>
                        Jl. Kapten Hanafiah No.01, Karanganyar<br>Kec. Subang, Kabupaten Subang, Jawa Barat 41211
                        <br><br>
                        <strong>Phone:</strong><br> (0260) 417063<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#profile">Profile</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#karir">Karir</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#pko">Pengajuan Kredit Online</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#produk">Produk</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#informasi">Informasi</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#tkp">Tata Kelola Perusahaan</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Get news delivered directly to your inbox</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div><br>
                    <p>PT BPR Bumi Bandung Kecana terdaftar dan diawasi oleh
                        <a target="_blank" href="https://ojk.go.id/id/Default.aspx">Otoritas Jasa Keuangan</a><br>
                        <img src="/assets/img/ojk_white.png" style="width:; height:50px;">
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!--  <div class="col-lg-3 col-md-6 footer-links">
       <p>PT BPR Bumi Bandung Kecana terdaftar dan diawasi oleh</p><br>
         <ul><li><a href="https://ojk.go.id/id/Default.aspx">Otoritas Jasa Keuangan</a></li></ul>
     </div> -->

    <div class="container">
        <div class="copyright">
            &copy;<strong><span> 2020 PT BPR Bumi Bandung Kencana</span></strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>
<script src="/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="/assets/vendor/venobox/venobox.min.js"></script>
<script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="/assets/vendor/counterup/counterup.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

@yield("js")
</body>

</html>
