<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Lost Password - Rumantra - By ERav Technology</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Wolmart eCommmerce Marketplace HTML Template">
    <meta name="author" content="D-THEMES">

    <?php include "include/headerscript1.php"; ?>
    <style>
        .vendor-widget-2:hover{border-color:#eee}
    </style>
</head>

<body>
    <div class="page-wrapper">
        <?php include "include/menu1.php"; ?>
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Lost Password</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li>Lost Password</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content mb-10 pb-2">
                <div class="container">
                    <section class="mb-10">
                        <!-- <h2 class="title title-center mb-5">Enter your security code</h2> -->
                        <div class="row justify-content-center">
                            <div class="login-popup">
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <form action="<?php echo base_url() ?>Loginregister/Accountcheck" method="post" autocomplete="off">
                                            <?php if($this->session->flashdata('msg')) { ?>
                                            <div class="alert alert-icon alert-error alert-bg alert-inline mb-4 text-center" role="alert">
                                                <h4 class="alert-title"><i class="w-icon-exclamation-circle"></i> Error</h4>
                                                <?php echo $this->session->flashdata('msg'); ?>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group">
                                                <label>Enter email Address *</label>
                                                <input type="email" class="form-control text-dark" name="accountemail" id="accountemail" required autofocus>
                                            </div>
                                            <p>Check the account validity befor change the password. Please enter your account email address. Thank you.</p>
                                            <button type="submit" class="btn btn-primary w-100">Check Account</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="cta-section mb-10 pt-1">
                        <!-- <h2 class="title title-center mb-5">Newsletter Banner
                            <span class="title-separator">/</span> With Background
                        </h2> -->
                        <div class="banner banner-newsletter">
                            <div class="banner-content text-center">
                                <h3 class="banner-title">Sign up to
                                    <strong class="text-uppercase">Rumantra Ceylon (PVT) ltd</strong>
                                </h3>
                                <p>Morbiin sem quis dui placerat ornare.pellentesque odio nisi, euismod in, pharetra a, ultricies
                                    in, diam. sed arcu, cras consequat.</p>
                                <form action="#" method="get" class="input-wrapper input-wrapper-inline justify-content-center">
                                    <input class="form-control mb-4" type="email" id="email_3" name="email" placeholder="Your E-mail Address" autocomplete="off"
                                    />
                                    <button class="btn btn-dark btn-rounded mb-4">Subscribe
                                        <i class="w-icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->

        <?php include "include/footercontent.php"; ?>
    </div>
    <!-- End of Page Wrapper -->

    <?php include "include/footerscript.php"; ?>
</body>

</html>