<!DOCTYPE html>
<html lang="en" manifest="{{asset('/manifest/client.appcache')}}">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>
            <?php
                $Path = Request::segment(1);
                if(is_null($Path) === true) {
                    $Path = "Home";
                }
                
                echo 'Test_Ltd. - '.$Path;
            ?>
        </title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{asset('img/favicon.png')}}" rel="icon">
        <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{asset('lib/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/jquery-ui/jquery-ui.theme.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/icofont/icofont.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/animate.css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/venobox/venobox.css')}}" rel="stylesheet">
        <link href="{{asset('lib/aos/aos.css')}}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{asset('css/site.css')}}" rel="stylesheet">

        <!-- =======================================================
        * Template Name: Restaurantly - v1.1.0
        * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>

    <body>
        <!-- ======= Top Bar ======= -->
        <div id="topbar" class="d-flex align-items-center fixed-top">
            <div class="container d-flex">
                <div class="contact-info mr-auto">
                    <i class="icofont-phone"></i> +1 0000 00000 00
                    <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Mon-Sat: 11:00 AM -
                        23:00 PM</span>
                </div>
            </div>
        </div>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">

                <h1 class="logo mr-auto">{{view()->shared('CompanyName')}}</h1>

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <!-- Set the active item in the navigation menu -->
                        <?php
                        if ($Path === "Home") {
                            echo '<li class="active"><a href="/Home">Home</a></li>';
                        } else {
                            echo '<li><a href="/Home">Home</a></li>';
                        }

                        if ($Path === "About") {
                            echo '<li class="active"><a href="/About">About</a></li>';
                        } else {
                            echo '<li><a href="/About">About</a></li>';
                        }

                        if ($Path === "Menu") {
                            echo '<li class="active"><a href="/Menu">Menu</a></li>';
                        } else {
                            echo '<li><a href="/Menu">Menu</a></li>';
                        }

                        if ($Path === "Specials") {
                            echo '<li class="active"><a href="/Specials">Specials</a></li>';
                        } else {
                            echo '<li><a href="/Specials">Specials</a></li>';
                        }

                        if ($Path === "Events") {
                            echo '<li class = "active"><a href="/Events">Events</a></li>';
                        } else {
                            echo '<li><a href="/Events">Events</a></li>';
                        }

                        if ($Path === "Gallery") {
                            echo '<li class = "active"><a href="/Gallery">Gallery</a></li>';
                        } else {
                            echo '<li><a href="/Gallery">Gallery</a></li>';
                        }

                        if ($Path === "Chefs") {
                            echo '<li class = "active"><a href="/Chefs">Chefs</a></li>';
                        } else {
                            echo '<li><a href="/Chefs">Chefs</a></li>';
                        }

                        if ($Path === "Contact") {
                            echo '<li class = "active"><a href="/Contact">Contact</a></li>';
                        } else {
                            echo '<li><a href="/Contact">Contact</a></li>';
                        }
                        ?>
                        <li class="book-a-table text-center"><a href="/Booking">Book a table</a></li>
                    </ul>
                </nav><!-- .nav-menu -->

            </div>
        </header><!-- End Header -->
