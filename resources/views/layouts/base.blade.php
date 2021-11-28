<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Eqla-<span lang="en" >ETNIC</span></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('') }}css/responsive.css"> -->
</head>

<body>
    <!-- header-start -->
    <header role="banner">
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('img/site/logo_etnic.png') }}" height="100" alt="logo" role="logo">
                                    
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">

                                    <nav role="navigation">
                                        <ul id="navigation">
                                            <li><a href="{{ url('/') }}">Accueil</a></li>
                                            <li><a href="{{ route('fillDB.index') }}">RefreshDB</a></li>
                                            <li><a href=""  >DropDB</a></li>
                                            <li><a href="{{ route('php.index') }}"  >BackEnd</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3 aria-hidden="true">@yield('title1')</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->



    <!-- service_area_start  -->
    <div class="service_area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-90">
                        <span class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"></span>
                        <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">@yield('title2')</h1>
                    </div>
                </div>
            </div>



                @section('content')
            
                @show

        </div>
    </div>
    <!-- service_area_end  -->

    <!-- footer start -->
    <footer class="footer bg-dark" role="contentinfo">
        <div class="footer_top">
            <div class="container">
                
                        <div class="footer_widget wow fadeInUp row " data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="footer_logo col">
                                <a href="#">
                                    <img src="{{ asset('img/logo_eqla.png') }}" alt="logo" width="100px" role="logo" >
                                </a>
                            </div>
                            <div class="social_links col">
                                <ul class="mt-0 pt-0">
                                    <li class="mt-0 pt-0">
                                        <a href="" target="_blank" title="Linkedin" >
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" target="_blank" title="facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" target="_blank" title="twitter">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="info@eqla.be" target="_blank" title="infos">
                                            <i class="fa fa-info"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="copy-right_text wow fadeInUp col" data-wow-duration="1.4s" data-wow-delay=".3s">
                                <div class="container">
                                    <div class="footer_border"></div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <p class="copy_right text-center text-white font-weight-bold">
                                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Stage ETNIC  =>  Isaac T.N.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    
                    
                    
                
            </div>
        </div>

    </footer>
    <!--/ footer end  -->

    <!-- link that opens popup -->
    <!-- JS here -->
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/ajax-form.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/scrollIt.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/gijgo.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>



    <!--contact js-->
    <script src="{{ asset('js/contact.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>


    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>