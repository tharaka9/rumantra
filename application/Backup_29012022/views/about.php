<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>About - Rumantra - By ERav Technology</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Wolmart eCommmerce Marketplace HTML Template">
    <meta name="author" content="D-THEMES">

    <?php include "include/headerscript1.php"; ?>
</head>

<body>
    <div class="page-wrapper">
        <?php include "include/menu1.php"; ?>
        <!-- Start of Main -->
        <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">About Us</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10 pb-8">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo1.html">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->
            
            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <section class="introduce">
                        <h2 class="title title-center">
                            Welcome to Rumantra Ceylon (pvt) ltd
                        </h2>
                        <p class="mx-auto text-center">Ancient secrets of Natural herbs</p>
                    </section>

                    <section class="customer-service mb-7">
                        <div class="row justify-content-center">
                            <div class="col-md-6 mb-8">
                                <p>Our products are made with natural herbal ingredients. We create all our products carefully and hygienically and by hand. And also, small bathes by ensuring the final results being nothing but a range of luxurious, natural skin and hair care.</p>
                                <ul>
                                <li>We guarantee that all our Rumantra products contain herbal extract.</li>
                                </ul>
                                <p>&nbsp;</p>
                                <p>Why Rumantra?</p>
                                <ul>
                                <li>100% natural extract with innovative research</li>
                                <li>Harmful chemical free</li>
                                <li>Manufactured carefully</li>
                                <li>Manufactured in small batches</li>
                                <li>100% responsible</li>
                                </ul>
                                <p>&nbsp;</p>
                                <p>Our all range of products here to find out more.</p>
                                <p><strong>&nbsp;<u>Face</u></strong></p>
                                <ul>
                                <li>Lotus natural fairness Day cream</li>
                                <li>Lotus natural fairness Night cream</li>
                                <li>Lotus natural fairness Face wash</li>
                                <li>Lotus natural fairness Cleanser</li>
                                <li>Lotus natural fairness Scrub</li>
                                <li>Lotus natural fairness Mud pack</li>
                                <li>Lotus natural fairness Toner</li>
                                </ul>
                                <p>&nbsp;</p>
                                <p><strong><u>Hair </u></strong></p>
                                <ul>
                                <li>Hair cream (Neelyadilepaya)</li>
                                <li>Shampoo (Neelakeshadhi)</li>
                                <li>Conditioner (Neelakeshadhi)</li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </main>
        <!-- End of Main -->

        <?php include "include/footercontent.php"; ?>
    </div>
    <!-- End of Page Wrapper -->

    <?php include "include/footerscript.php"; ?>

    <script>
		$(document).ready(function(){
			$('.addtocart').click(function(e){
                e.preventDefault();
                var productID = $(this).attr('id'); 
                var qty = '1';

                addtocart(productID, qty);
            });
		});
	</script>
</body>

</html>