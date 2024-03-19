<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themegenix.net/html/zaira/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Dec 2023 07:11:21 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mi Al-Aziz</title>
    <meta name="description" content="Zaira - News Magazine HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/profile/logo_s.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('asset/user/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/user/assets/css/animate.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('asset/user/assets/css/magnific-popup.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('asset/user/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/user/assets/css/flaticon.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('asset/user/assets/css/slick.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('asset/user/assets/css/swiper-bundle.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('asset/user/assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/user/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/user/assets/css/responsive.css') }}">

<body>

    <!-- preloader -->
    <div id="preloader">
        <div class="loader-inner">
            <div id="loader">
                <h2 id="bg-loader">Al-aziz<span></span></h2>
                <h2 id="fg-loader">Al-aziz<span></span></h2>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- Dark/Light-toggle -->
    <div class="darkmode-trigger">
        <label class="modeSwitch">
            <input type="checkbox">
            <span class="icon"></span>
        </label>
    </div>
    <!-- Dark/Light-toggle-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header class="header-style-five">
        <div id="header-fixed-height"></div>
        <div class="header-logo-area-three">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                        <div class="logo text-center">

                            <a href="index.html"><img src="{{ asset('storage/profile/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="header-top-social">
                            <ul class="list-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="menu-area menu-style-two menu-style-five">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="menu-wrap">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-4">
                                    <div class="logo d-none justify-content-center">
                                        <a href="index.html"><img src="{{ asset('storage/profile/mi.png') }}" alt=""></a>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a
                                                    href="{{ route('home') }}">Beranda</a>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">MI Al-aziz</a>
                                                <ul class="sub-menu">
                                                    <li
                                                        class="{{ Route::currentRouteName() == 'greeting' ? 'active' : '' }}">
                                                        <a href="{{ route('greeting') }}">Sambutan</a>
                                                    </li>
                                                    <li
                                                        class="{{ Route::currentRouteName() == 'visi' ? 'active' : '' }}">
                                                        <a href="{{ route('visi') }}">Visi Misi</a>
                                                    </li>
                                                    <li
                                                        class="{{ Route::currentRouteName() == 'history' ? 'active' : '' }}">
                                                        <a href="{{ route('history') }}">Sejarah</a>
                                                    </li>
                                                    <li
                                                        class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                                                        <a href="{{ route('contact') }}">Kontak</a>
                                                    </li>

                                                </ul>
                                            </li>
                                        
                                            <li
                                                class="{{ Route::currentRouteNamed('class', 'class.show','class1','class2','class3','class4','class5','class6') ? 'active' : '' }}">
                                                <a href="{{ route('kelas') }}">Kelas</a>
                                            </li>

                                            <li
                                                class="{{ Route::currentRouteName() == 'prestation' ? 'active' : '' }}">
                                                <a href="{{ route('prestation') }}">Prestasi</a>
                                            </li>
                                            <li
                                                class="{{ Route::currentRouteNamed('ekstrakurikuler', 'ekstra.show', 'ekstrakurikuler.show_index','ekstra.shows') ? 'active' : '' }}">
                                                <a href="{{ route('ekstrakurikuler') }}">Ekstrakurikuler</a>
                                            </li>
                                            <li
                                                class="{{ Route::currentRouteNamed('announcement', 'announcement.show') ? 'active' : '' }}">
                                                <a href="{{ route('announcement') }}">Pengumuman</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        </div>

                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <nav class="menu-box">
                                <div class="close-btn"><i class="fas fa-times"></i></div>
                                <div class="nav-logo">
                                    <a href="index.html"><img src="assets/img/logo/logo.png" alt="Logo"></a>
                                </div>
                                <div class="nav-logo d-none">
                                    <a href="index.html"><img src="assets/img/logo/w_logo.png" alt="Logo"></a>
                                </div>
                                <div class="mobile-search">
                                    <form action="#">
                                        <input type="text" placeholder="Search here...">
                                        <button><i class="flaticon-search"></i></button>
                                    </form>
                                </div>
                                <div class="menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix list-wrap">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->

                    </div>
                </div>
            </div>
        </div>

        <!-- header-search -->
        <div class="search__popup">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="search__wrapper">
                            <div class="search__close">
                                <button type="button" class="search-close-btn">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="search__form">
                                <form method="get" action="https://themedox.com/gerow/">
                                    <div class="search__input">
                                        <input class="search-input-field" type="text" name="s"
                                            value="" placeholder="Type keywords here">
                                        <span class="search-focus-border"></span>
                                        <button>
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-popup-overlay"></div>
        <!-- header-search-end -->

        <!-- offCanvas-area -->
        <div class="offCanvas-wrap">
            <div class="offCanvas-body">
                <div class="offCanvas-toggle">
                    <span></span>
                    <span></span>
                </div>
                <div class="offCanvas-content">
                    <div class="offCanvas-logo logo">
                        <a href="index.html" class="logo-dark"><img src="assets/img/logo/logo.png"
                                alt="Logo"></a>
                        <a href="index.html" class="logo-light"><img src="assets/img/logo/w_logo.png"
                                alt="Logo"></a>
                    </div>
                    <p>The argument in favor of using filler text goes something like this: If you use any real content
                        in the Consulting Process anytime you reach.</p>
                    <ul class="offCanvas-instagram list-wrap">
                        <li><a href="assets/img/blog/hr_post01.jpg" class="popup-image"><img
                                    src="assets/img/blog/hr_post01.jpg" alt="img"></a></li>
                        <li><a href="assets/img/blog/hr_post02.jpg" class="popup-image"><img
                                    src="assets/img/blog/hr_post02.jpg" alt="img"></a></li>
                        <li><a href="assets/img/blog/hr_post03.jpg" class="popup-image"><img
                                    src="assets/img/blog/hr_post03.jpg" alt="img"></a></li>
                        <li><a href="assets/img/blog/hr_post04.jpg" class="popup-image"><img
                                    src="assets/img/blog/hr_post04.jpg" alt="img"></a></li>
                        <li><a href="assets/img/blog/hr_post05.jpg" class="popup-image"><img
                                    src="assets/img/blog/hr_post05.jpg" alt="img"></a></li>
                        <li><a href="assets/img/blog/hr_post06.jpg" class="popup-image"><img
                                    src="assets/img/blog/hr_post06.jpg" alt="img"></a></li>
                    </ul>
                </div>
                <div class="offCanvas-contact">
                    <h4 class="title">Get In Touch</h4>
                    <ul class="offCanvas-contact-list list-wrap">
                        <li><i class="fas fa-envelope-open"></i><a href="mailto:info@webmail.com">info@webmail.com</a>
                        </li>
                        <li><i class="fas fa-phone"></i><a href="tel:88899988877">888 999 888 77</a></li>
                        <li><i class="fas fa-map-marker-alt"></i> 12/A, New Booston, NYC</li>
                    </ul>
                    <ul class="offCanvas-social list-wrap">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fab fa-tiktok"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="offCanvas-overlay"></div>
        <!-- offCanvas-area-end -->
    </header>
    <!-- header-area-end -->


    <!-- main-area -->
    @yield('content')
    <!-- main-area-end -->

    <!-- footer-area -->
    <footer>
        <div class="footer-area">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-7">
                            <div class="footer-widget">
                                <div class="fw-logo">
                                    <a href="index.html"><img src="assets/img/logo/w_logo.png" alt=""></a>
                                </div>
                                <div class="footer-content">
                                    <p>Browned butter and brown sugar caramelly goodness, crispy edges thick and soft
                                        centers and melty little puddles of chocolate.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="footer-widget">
                                <h4 class="fw-title">Bantuan</h4>
                                <div class="footer-link-wrap">
                                    <ul class="list-wrap">
                                        <li><a href="contact.html">Contact & Faq</a></li>
                                        <li><a href="contact.html">Oders & Returns</a></li>
                                        <li><a href="contact.html">Gift Cards</a></li>
                                        <li><a href="contact.html">Register</a></li>
                                        <li><a href="contact.html">Catalog</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="footer-widget">
                                <h4 class="fw-title">Ikuti Sosial media kami</h4>
                                <div class="footer-link-wrap">
                                    <ul class="list-wrap">
                                        <li><a href="#">facebook</a></li>
                                        <li><a href="#">Twitter</a></li>
                                        <li><a href="#">Instagram</a></li>
                                        <li><a href="#">Youtube</a></li>
                                        <li><a href="#">Pinterest</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-bottom-menu">
                                <ul class="list-wrap">
                                    <li><a href="contact.html">Privacy Policy & Terms</a></li>
                                    <li><a href="contact.html">Site Credits</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="copyright-text">
                                <p>© 2023 All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->


    <!-- JS here -->
    <script src="{{ asset('asset/user/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('asset/user/assets/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('asset/user/assets/js/jquery.magnific-popup.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('asset/user/assets/js/slick.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('asset/user/assets/js/swiper-bundle.js') }}"></script> --}}
    {{-- <script src="{{ asset('asset/user/assets/js/ajax-form.js') }}"></script> --}}
    {{-- <script src="{{ asset('asset/user/assets/js/wow.min.js') }}"></script> --}}
    <script src="{{ asset('asset/user/assets/js/main.js') }}"></script>

</body>


</html>
