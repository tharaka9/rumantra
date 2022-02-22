<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Login - Rumantra - By ERav Technology</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Wolmart eCommmerce Marketplace HTML Template">
    <meta name="author" content="D-THEMES">

    <?php include "include/headerscript1.php"; ?>
    <style>
        .vendor-widget-2:hover {
            border-color: #eee
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <?php include "include/menu1.php"; ?>
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Login</h1>
                <h4 class="page-subtitle">Welcome to Rumantra - By ERav Technology</h4>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-3 pb-1">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content mb-10 pb-2">
                <div class="container">
                    <section class="mb-10">
                        <div class="row justify-content-center">
                            <div class="login-popup">
                                <div class="vendor-widget">
                                    <div class="vendor-widget-2">
                                        <form action="<?php echo base_url().'Loginregister/Loginaccount' ?>" method="post" autocomplete="off">
                                            <?php if($this->session->flashdata('msg')) { ?>
                                            <div class="alert alert-icon alert-error alert-bg alert-inline mb-4 text-center" role="alert">
                                                <h4 class="alert-title"><i class="w-icon-exclamation-circle"></i> Error</h4>
                                                <?php echo $this->session->flashdata('msg'); ?>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group">
                                                <label>NIC or Email address *</label>
                                                <input type="text" class="form-control" name="logusername" id="logusername" required>
                                            </div>
                                            <div class="form-group mb-0">
                                                <label>Password *</label>
                                                <input type="password" class="form-control" name="logpassword" id="logpassword" required>
                                                <span class="far fa-eye" id="togglePassword2" style=" float: right;margin-right: 6px;margin-top: -29px;position: relative;z-index: 2;"></span>
                                            </div>
                                            <div class="form-checkbox d-flex align-items-center justify-content-between">
                                                <a href="<?php echo base_url().'Loginregister/Register' ?>" class="text-primary">New member? Register here</a>
                                                <a href="<?php echo base_url().'Loginregister/Lostpassword' ?>">Lost your password?</a>
                                            </div>
                                            <p>Your personal data will be used to support your experience 
                                            throughout this website, to manage access to your account, 
                                            and for other purposes described in our <a href="#" class="text-primary">privacy policy</a>.</p>
                                            <button type="submit" class="btn btn-primary w-100 mb-3">Sign In</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <h2 class="title title-center mb-5">Enter your security code</h2> -->
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

    <script type='text/javascript'>

    const togglePassword2 = document.querySelector('#togglePassword2');
    const logpassword = document.querySelector('#logpassword');

    togglePassword2.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = logpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    logpassword.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
    });

</script>

</body>

</html>