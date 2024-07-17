<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap"
        rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Krona One' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('front/css/swiper.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('front/css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('front/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('front/css/magnific-popup.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>

    <!-- Document Title
	============================================= -->
    <title>Home - Corporate Layout 2 | Canvas</title>
    <style>
        .br-20 {
            border-radius: 20px;
        }
    </style>
    @yield('css')
</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
		============================================= -->
        <header id="header" class="full-header">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">

                        <!-- Logo
						============================================= -->
                        <div id="logo">
                            <a href="/" class="standard-logo" data-dark-logo="/frontimages/logo-dark.png"
                                style="font-family: 'Krona One';">SNAPGUIDE</a>
                            <a href="/" class="retina-logo" data-dark-logo="/frontimages/logo-dark@2x.png"
                                style="font-family: 'Krona One';">SNAPGUIDE</a>
                            {{-- <a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img
                                    src="images/logo.png" alt="Canvas Logo"></a>
                            <a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img
                                    src="images/logo@2x.png" alt="Canvas Logo"></a> --}}
                        </div><!-- #logo end -->

                        <div class="header-misc">

                            <!-- Top Search
							============================================= -->
                            {{-- <div id="top-search" class="header-misc-icon">
                                <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i
                                        class="icon-line-cross"></i></a>
                            </div> --}}
                            <!-- #top-search end -->

                            <!-- Top Cart
							============================================= -->
                            {{-- <div id="top-cart" class="header-misc-icon d-none d-sm-block">
                                <a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i><span
                                        class="top-cart-number">5</span></a>
                                <div class="top-cart-content">
                                    <div class="top-cart-title">
                                        <h4>Shopping Cart</h4>
                                    </div>
                                    <div class="top-cart-items">
                                        <div class="top-cart-item">
                                            <div class="top-cart-item-image">
                                                <a href="#"><img src="images/shop/small/1.jpg"
                                                        alt="Blue Round-Neck Tshirt" /></a>
                                            </div>
                                            <div class="top-cart-item-desc">
                                                <div class="top-cart-item-desc-title">
                                                    <a href="#">Blue Round-Neck Tshirt with a Button</a>
                                                    <span class="top-cart-item-price d-block">$19.99</span>
                                                </div>
                                                <div class="top-cart-item-quantity">x 2</div>
                                            </div>
                                        </div>
                                        <div class="top-cart-item">
                                            <div class="top-cart-item-image">
                                                <a href="#"><img src="images/shop/small/6.jpg"
                                                        alt="Light Blue Denim Dress" /></a>
                                            </div>
                                            <div class="top-cart-item-desc">
                                                <div class="top-cart-item-desc-title">
                                                    <a href="#">Light Blue Denim Dress</a>
                                                    <span class="top-cart-item-price d-block">$24.99</span>
                                                </div>
                                                <div class="top-cart-item-quantity">x 3</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="top-cart-action">
                                        <span class="top-checkout-price">$114.95</span>
                                        <a href="#" class="button button-3d button-small m-0">View Cart</a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- #top-cart end -->

                        </div>

                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path
                                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                                </path>
                                <path d="m 30,50 h 40"></path>
                                <path
                                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                                </path>
                            </svg>
                        </div>

                        <!-- Primary Navigation
						============================================= -->
                        <nav class="primary-menu">

                            <ul class="menu-container">
                                <li class="menu-item">
                                    <a class="menu-link" href="/">
                                        <div>Home</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="/katalog-studio">
                                        <div>Katalog Studio</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="/referensi">
                                        <div>Referensi</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="/promo">
                                        <div>Promo</div>
                                    </a>
                                </li>
                                <li class="menu-item" hidden>
                                    <a class="menu-link" href="/kontak">
                                        <div>Pengambilan Foto</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    @if(Auth::check())
                                    <a class="menu-link button button-small button-dark button-circle pt-2 pb-2"
                                        href="/home">
                                        Profil
                                    </a>
                                    @else
                                    <a class="menu-link button button-small button-dark button-circle pt-2 pb-2"
                                        href="/login">
                                        Login
                                    </a>
                                    @endif
                                </li>
                            </ul>
                        </nav><!-- #primary-menu end -->
                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header><!-- #header end -->
        @if(Session::has('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Info!</strong> {{Session::get('info')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @yield('content')

        <!-- Footer
		============================================= -->
        <footer id="footer" class="dark">
            <div class="container">

                <!-- Footer Widgets
				============================================= -->
                <div class="footer-widgets-wrap">

                    <div class="row col-mb-50">
                        <div class="col-lg-12">
                            <a href="/" class="standard-logo" data-dark-logo="/frontimages/logo-dark.png">
                                <h3 class="text-uppercase" style="font-family: 'Krona One';">snapguide</h3>
                            </a>
                            <div class="row col-mb-50">
                                <div class="col-md-3">
                                    <div class="widget clearfix">
                                        <div
                                            style="background: url('/front/images/world-map.png') no-repeat center center; background-size: 100%;">
                                            <b class="m-0">FIND US</b>
                                            <address>JI. Margasari - Jatibarang No.9, Turi, Jatibarang Kidul, Kec.
                                                Jatibarang, Kabupaten Brebes, Jawa Tengah
                                            </address>
                                            <b class="text-uppercase mb-2">customer support</b>
                                            <div class="d-flex">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.875 3.09155C14.111 2.31982 13.201 1.70794 12.198 1.2916C11.1951 0.875249 10.1192 0.66277 9.03331 0.666554C4.48331 0.666554 0.77498 4.37489 0.77498 8.92489C0.77498 10.3832 1.15831 11.7999 1.87498 13.0499L0.708313 17.3332L5.08331 16.1832C6.29165 16.8416 7.64998 17.1916 9.03331 17.1916C13.5833 17.1916 17.2916 13.4832 17.2916 8.93322C17.2916 6.72489 16.4333 4.64989 14.875 3.09155ZM9.03331 15.7916C7.79998 15.7916 6.59165 15.4582 5.53331 14.8332L5.28331 14.6832L2.68331 15.3666L3.37498 12.8332L3.20831 12.5749C2.5231 11.4807 2.15926 10.2159 2.15831 8.92489C2.15831 5.14155 5.24165 2.05822 9.02498 2.05822C10.8583 2.05822 12.5833 2.77489 13.875 4.07489C14.5145 4.71152 15.0214 5.46877 15.3661 6.30274C15.7109 7.13671 15.8867 8.03081 15.8833 8.93322C15.9 12.7166 12.8166 15.7916 9.03331 15.7916ZM12.8 10.6582C12.5916 10.5582 11.575 10.0582 11.3916 9.98322C11.2 9.91655 11.0666 9.88322 10.925 10.0832C10.7833 10.2916 10.3916 10.7582 10.275 10.8916C10.1583 11.0332 10.0333 11.0499 9.82498 10.9416C9.61665 10.8416 8.94998 10.6166 8.16665 9.91655C7.54998 9.36655 7.14165 8.69155 7.01665 8.48322C6.89998 8.27489 6.99998 8.16655 7.10831 8.05822C7.19998 7.96655 7.31665 7.81655 7.41665 7.69989C7.51665 7.58322 7.55831 7.49155 7.62498 7.35822C7.69165 7.21655 7.65831 7.09989 7.60831 6.99989C7.55831 6.89989 7.14165 5.88322 6.97498 5.46655C6.80831 5.06655 6.63331 5.11655 6.50831 5.10822H6.10831C5.96665 5.10822 5.74998 5.15822 5.55831 5.36655C5.37498 5.57489 4.84165 6.07489 4.84165 7.09155C4.84165 8.10822 5.58331 9.09155 5.68331 9.22489C5.78331 9.36655 7.14165 11.4499 9.20831 12.3416C9.69998 12.5582 10.0833 12.6832 10.3833 12.7749C10.875 12.9332 11.325 12.9082 11.6833 12.8582C12.0833 12.7999 12.9083 12.3582 13.075 11.8749C13.25 11.3916 13.25 10.9832 13.1916 10.8916C13.1333 10.7999 13.0083 10.7582 12.8 10.6582Z"
                                                        fill="#F9F9F9" />
                                                </svg>
                                                <abbr class="ml-2">
                                                    contact_us@gmail.com
                                                </abbr>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.6667 0.333252H2.33335C1.41669 0.333252 0.67502 1.08325 0.67502 1.99992L0.666687 11.9999C0.666687 12.9166 1.41669 13.6666 2.33335 13.6666H15.6667C16.5834 13.6666 17.3334 12.9166 17.3334 11.9999V1.99992C17.3334 1.08325 16.5834 0.333252 15.6667 0.333252ZM15.6667 3.66659L9.00002 7.83325L2.33335 3.66659V1.99992L9.00002 6.16658L15.6667 1.99992V3.66659Z"
                                                        fill="#F9F9F9" />
                                                </svg>
                                                <abbr class="ml-2">
                                                    (+62) 875-6353-6500
                                                </abbr>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="widget clearfix">
                                        <b class="m-0 text-capitalize">useful pages</b>
                                        <div>
                                            <a href="">Home</a>
                                        </div>
                                        <div>
                                            <a href="">Katalog Produk</a>
                                        </div>
                                        <div>
                                            <a href="">Blog</a>
                                        </div>
                                        <div>
                                            <a href="">About</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">

                                    <div class="widget clearfix">
                                        <b class="m-0 text-capitalize">useful links</b>
                                        <div>
                                            <a href="">Privacy Policy</a>
                                        </div>
                                        <div>
                                            <a href="">Contact Us</a>
                                        </div>
                                        <div>
                                            <a href="">FAQ's</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <b class="m-0 text-capitalize">follow us</b>
                                    <div class="clearfix">
                                        <a href="">
                                            <img src="{{asset('images/sosmed/Instagram.png')}}" alt="">
                                        </a>
                                        <a href="">
                                            <img src="{{asset('images/sosmed/Twitter.png')}}" alt="">
                                        </a>
                                        <a href="">
                                            <img src="{{asset('images/sosmed/Send.png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div><!-- .footer-widgets-wrap end -->
            </div>
            <div class="text-center p-2" style="background-color: white; color: black">
                Copyright @ 2024 snapguide. All right reserved
            </div>

            <!-- Copyrights
			============================================= -->
            {{-- <div id="copyrights">
                <div class="container">

                    <div class="row col-mb-30">

                        <div class="col-md-6 text-center text-md-left">
                            Copyrights &copy; 2020 All Rights Reserved by Canvas Inc.<br>
                            <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a>
                            </div>
                        </div>

                        <div class="col-md-6 text-center text-md-right">
                            <div class="d-flex justify-content-center justify-content-md-end">
                                <a href="#" class="social-icon si-small si-borderless si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-pinterest">
                                    <i class="icon-pinterest"></i>
                                    <i class="icon-pinterest"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-vimeo">
                                    <i class="icon-vimeo"></i>
                                    <i class="icon-vimeo"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-github">
                                    <i class="icon-github"></i>
                                    <i class="icon-github"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-yahoo">
                                    <i class="icon-yahoo"></i>
                                    <i class="icon-yahoo"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-linkedin">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-linkedin"></i>
                                </a>
                            </div>

                            <div class="clear"></div>

                            <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i
                                class="icon-headphones"></i> +1-11-6541-6369 <span class="middot">&middot;</span> <i
                                class="icon-skype2"></i> CanvasOnSkype
                        </div>

                    </div>

                </div>
            </div> --}}
            <!-- #copyrights end -->
        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- JavaScripts
	============================================= -->
    <script src="{{asset('front/js/jquery.js')}}"></script>
    <script src="{{asset('front/js/plugins.min.js')}}"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="{{asset('front/js/functions.js')}}"></script>
    @yield('js')
</body>

</html>