<!DOCTYPE html>
<html lang="en">

<head>

    <style>
    @media print {
        body * {
            visibility: hidden;
        }

        #section-to-print,
        #section-to-print * {
            visibility: visible;
        }

        #section-to-print {
            position: absolute;
            left: 0;
            top: 0;
        }
        #section-to-print2,
        #section-to-print2 * {
            visibility: visible;
        }

        #section-to-print2 {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Hellomet - AIOT For Helmet Detection </title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/templatemo-digimedia-v3.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/animated.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/owl.css">
    <link href="<?= base_url() ?>template/dist/css/style.min.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url(); ?>/vendor/simple-datatables/simple-datatables.js"></script>
    <!-- CSS Boostrap only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- JavaScript Bundle Boostrap with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Additional Datatables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!--

TemplateMo 568 DigiMedia

https://templatemo.com/tm-568-digimedia

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow header-text wow slideInDown" data-wow-duration="0.75s"
        data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="<?= base_url(); ?>/assets/images/unugha-logo2.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="<?php echo base_url('c_report/index') ?>"
                                    <?php if ($reportPage == "active") { ?> class="active" <?php } ?>>Report</a></li>
                            <li class="scroll-to-section"><a href="<?php echo base_url('c_profile/index') ?>"
                                    <?php if ($profilePage == "active") { ?> class="active" <?php } ?>>Profile</a></li>

                            <li></li>
                            <li></li>
                            <li></li>
                            <li class="scroll-to-section">
                                <p style="margin-top:5px"><?= $user['user_email']; ?></p>
                            </li>
                            <!-- <li class="scroll-to-section">
                                <div class="border-first-button"><a href="#contact"><i class="fa fa-question"></i>&nbsp;</a></div>
                            </li> -->
                            <li class="scroll-to-section">
                                <div class="border-first-button"><a href="<?php echo base_url('c_login/logout') ?>"><i
                                            class="fa fa-sign-out"></i>&nbsp; Log Out</a></div>
                            </li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <!-- 
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6>Digital Media Agency</h6>
                                        <h2>We Boost Your Website Traffic</h2>
                                        <p>This template is brought to you by TemplateMo website. Feel free to use this for a commercial purpose. You are not allowed to redistribute the template ZIP file on any other template website. Thank you.</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border-first-button scroll-to-section">
                                            <a href="#contact">Free Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="assets/images/slider-dec-v3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->