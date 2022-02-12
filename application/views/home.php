<!DOCTYPE html>

<html lang="en">



<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">



	<title>Home - Rumantra - By ERav Technology</title>



	<meta name="keywords" content="HTML5 Template" />

	<meta name="description" content="Wolmart eCommmerce Marketplace HTML Template">

	<meta name="author" content="D-THEMES">



	<?php include "include/headerscript1.php"; ?>



</head>



<style>

    #owl-demo .item img{

        display: block;

        width: 100%;

        height: auto;

    }





    </style>





<body >

	

		<?php include "include/menu1.php"; ?>



        <!-- start of .main -->

        <main class="main">

            <div class="page-content">

                <section class="intro-section">

                <div class="intro-slider owl-carousel owl-theme row cols-xl-1 cols-1 animation-slider gutter-no"

                        data-owl-options="{

                        'nav': false,

                        'dots': false,

                        'loop': true,

                        'autoplay': true,

                        'autoplayTimeout': 5000

                    }">

     

     <div class="item"><img src="<?php echo base_url() ?>images/slides/slide-1.jpg"></div>

     <div class="item"><img src="<?php echo base_url() ?>images/slides/slide-2.jpg"></div>

     <div class="item"><img src="<?php echo base_url() ?>images/slides/slide-3.jpg"></div>

    

   </div>





                </section>



                <div class="container">

                    <div class="owl-carousel owl-theme row cols-md-4 cols-sm-3 cols-1 icon-box-wrapper appear-animate br-sm mb-10 appear-animate"

                        data-owl-options="{

                        'nav': false,

                        'dots': false,

                        'loop': true,

                        'autoplay': true,

                        'autoplayTimeout': 4000,

                        'responsive': {

                            '0': {

                                'items': 1

                            },

                            '576': {

                                'items': 2

                            },

                            '992': {

                                'items': 3

                            },

                            '1200': {

                                'items': 4

                            }

                        }

                    }">

                        <div class="icon-box icon-box-side text-dark">

                            <span class="icon-box-icon icon-shipping">

                                <i class="w-icon-truck"></i>

                            </span>

                            <div class="icon-box-content">

                                <h4 class="icon-box-title ls-normal font-weight-bolder">Free Shipping & Returns</h4>

                                <p class="text-default">For all orders over $99</p>

                            </div>

                        </div>

                        <div class="icon-box icon-box-side text-dark">

                            <span class="icon-box-icon icon-payment">

                                <i class="w-icon-bag"></i>

                            </span>

                            <div class="icon-box-content">

                                <h4 class="icon-box-title ls-normal font-weight-bolder">Secure Payment</h4>

                                <p class="text-default">We ensure secure payment</p>

                            </div>

                        </div>

                        <div class="icon-box icon-box-side text-dark icon-box-money">

                            <span class="icon-box-icon icon-money">

                                <i class="w-icon-money"></i>

                            </span>

                            <div class="icon-box-content">

                                <h4 class="icon-box-title ls-normal font-weight-bolder">Money Back Guarantee</h4>

                                <p class="text-default">Any back within 30 days</p>

                            </div>

                        </div>

                        <div class="icon-box icon-box-side text-dark icon-box-chat">

                            <span class="icon-box-icon icon-chat">

                                <i class="w-icon-chat"></i>

                            </span>

                            <div class="icon-box-content">

                                <h4 class="icon-box-title ls-normal font-weight-bolder">Customer Support</h4>

                                <p class="text-default">Call or email us 24/7</p>

                            </div>

                        </div>

                    </div>

                    <!-- End of Iocn Box Wrapper -->





                    <div class="title-link-wrapper title-deals appear-animate">

                        <h2 class="title">Deals Hot Of The Week</h2>

                        <a href="shop-boxed-banner.html" class="font-weight-bold ls-25">More Products<i

                                class="w-icon-long-arrow-right"></i></a>

                    </div>

                    <div class="row appear-animate">

                    <?php foreach ($dealofweek as $row)

                                    { ?>

                    

                        <div class="col-lg-6 mb-4">

                            <div class="product product-list br-xs mb-0">

                                <figure class="product-media">

                                     <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>">

                                        <img src="<?php echo base_url($rownewarrival->listimagepath);?>" alt="Product" width="315"

                                            height="355">

                                    </a>

                                    <div class="product-action-vertical">

                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"

                                            title="Quick View"></a>

                                    </div>

                                    <div class="product-countdown-container">

                                        <div class="product-countdown countdown-compact" data-until="2021, 9, 9"

                                            data-format="DHMS" data-compact="false"

                                            data-labels-short="Days, Hours, Mins, Secs">

                                            00:00:00:00</div>

                                    </div>

                                </figure>

                                <div class="product-details">

                                    <h4 class="product-name">

                                         <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>"><?php echo $rownewarrival->product; ?></a>

                                    </h4>

                                    <div class="ratings-container">

                                        <div class="ratings-full">

                                            <span class="ratings" style="width: 100%;"></span>

                                            <span class="tooltiptext tooltip-top"></span>

                                        </div>

                                        <a href="#" class="rating-reviews">(<?php echo $rownewarrival->avgrate; ?>)</a>

                                    </div>

                                    <div class="product-price">Rs: <?php echo $rownewarrival->price; ?></div>

                                    <ul class="product-desc">

                                        <li><?php echo $rownewarrival->shortdesc; ?></li>

                                        

                                    </ul>

                                    <div class="product-action">

                                    <a href="#" class="btn-product-icon btn-cart addtocart" id="<?php echo $rownewarrival->productid; ?>" title="Add to cart"> Add To Cart</a>

                                        

                                    </div>

                                </div>

                            </div>



                           

                        </div>

                       

                   

                    <?php } ?>   

                    </div>

                    <!-- End of Product List -->





                    <div class="title-links-wrapper title-underline mb-4 d-flex align-items-center appear-animate">

                        <h2 class="title">Latest Products</h2>

                       

                    </div>

                    <?php //print_r($newarrivalproduct) ?>

                    <div class="row banner-product-wrapper appear-animate">

                        <div class="col-xl-12 col-lg-12 col-md-12">

                            <div class="owl-carousel owl-theme row cols-xl-4 cols-lg-3 cols-md-2 cols-2"

                                data-owl-options="{

                                'nav': false,

                                'dots': true,

                                'margin': 20,

                                'responsive': {

                                    '0': {

                                        'items': 2

                                    },

                                    '768': {

                                        'items': 2

                                    },

                                    '992': {

                                        'items': 3

                                    },

                                    '1200': {

                                        'items': 4

                                    }

                                }

                            }">

                            <?php foreach(array_slice($newarrivalproduct, 0, 5) as $rownewarrival){ ?>

                                <div class="product-col">

                                    <div class="product product-slideup-content">

                                        <figure class="product-media">

                                             <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>">

                                                <img src="<?php echo base_url().$rownewarrival->imagepath ?>" alt="Product"

                                                    width="239" height="269">

                                            </a>

                                            <div class="product-action-vertical">

                                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"

                                                    title="Quick View"></a>

                                            </div>

                                        </figure>

                                        <div class="product-details">

                                            <h3 class="product-name">

                                                 <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>"><?php echo $rownewarrival->product; ?></a>

                                            </h3>

                                            <div class="ratings-container">

                                                <div class="ratings-full">

                                                    <span class="ratings" style="width: 100%;"></span>

                                                    <span class="tooltiptext tooltip-top"></span>

                                                </div>

                                                <a href="#" class="rating-reviews">(3 Reviews)</a>

                                            </div>

                                            <div class="product-price">

                                            <ins class="new-price">Rs <?php echo number_format($rownewarrival->price); ?></ins>

											

                                            </div>

                                        </div>



                                        <div class="product-hidden-details">



                                            <div class="product-action">

                                            <a href="#" class="btn-product-icon btn-cart addtocart" id="<?php echo $rownewarrival->productid; ?>" title="Add to cart"> Add To Cart</a>

                                               

                                            </div>

                                        </div>

                                    </div>

                                    

                                </div>

                            <?php } ?>  

                         

                              

                                <!-- End of Product Col -->

                            </div>

                        </div>

                    </div>

                    <!-- End of Banner Product Wrapper -->

                    

                    <div class="row mb-4 appear-animate">

                        <div class="col-lg-3 col-sm-6 mb-6">

                            <h4 class="title title-underline mb-2 pt-1">Best Selling</h4>

                            <div class="widget widget-products">

                            <?php foreach(array_slice($bestsaleproduct, 1, 5) as $rowbestsale){ ?>

                                <div class="product product-widget">

                                    <figure class="product-media">

                                         <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>">

                                            <img src="<?php echo base_url().$rowbestsale->imagepath ?>" alt="Product"

                                            style="width: 100px;height: 100px;">

                                        </a>

                                    </figure>

                                    <div class="product-details">

                                        <h4 class="product-name">

                                             <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>"><?php echo $rowbestsale->product; ?></a>

                                        </h4>

                                        <div class="ratings-container">

                                            <div class="ratings-full">

                                                <span class="ratings" style="width: 100%;"></span>

                                                <span class="tooltiptext tooltip-top"></span>

                                            </div>

                                        </div>

                                        <div class="product-price">

                                            <ins class="new-price">Rs <?php echo number_format($rowbestsale->price); ?></ins>

                                        </div>

                                    </div>

                                </div>

                            <?php } ?>

                                <!-- End of Product Widget -->

                               

                                <!-- End of Product Widget -->

                                

                                <!-- End of Product Widget -->

                            </div>

                            <!-- End of Widget Products -->

                        </div>

                        <!-- End of Col -->



                        <div class="col-lg-3 col-sm-6 mb-6">

                            <h4 class="title title-underline mb-2 pt-1">Featured Products</h4>

                            <div class="widget widget-products">

                                <?php foreach(array_slice($featuredproduct, 1, 5) as $rowfeatured){ ?>

                                <div class="product product-widget">

                                    <figure class="product-media">

                                         <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>">

                                            <img src="<?php echo base_url().$rowfeatured->imagepath ?>" alt="Product"

                                            style="width: 100px;height: 100px;">

                                        </a>

                                    </figure>

                                    <div class="product-details">

                                        <h4 class="product-name">

                                             <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>"><?php echo $rowfeatured->product; ?></a>

                                        </h4>

                                        <div class="ratings-container">

                                            <div class="ratings-full">

                                                <span class="ratings" style="width: 100%;"></span>

                                                <span class="tooltiptext tooltip-top"></span>

                                            </div>

                                        </div>

                                        <div class="product-price">

                                            <ins class="new-price">Rs <?php echo number_format($rowfeatured->price); ?></ins>

                                        </div>

                                    </div>

                                </div>

                                <?php } ?>

                                <!-- End of Product Widget -->

                                

                                <!-- End of Product Widget -->

                                

                                <!-- End of Product Widget -->

                            </div>

                            <!-- End of Widget Products -->

                        </div>

                        <!-- End of Col -->



                        <div class="col-lg-3 col-sm-6 mb-6">

                            <h4 class="title title-underline mb-2 pt-1">Top Collections</h4>

                            <div class="widget widget-products">

                            <?php foreach ($gettopproducts as $row)

                            { ?>

                                <div class="product product-widget">

                                    <figure class="product-media">

                                         <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>">

                                            <img src="<?php echo base_url($rownewarrival->listimagepath);?>" alt="Product"

                                            style="width: 100px;height: 100px;">

                                        </a>

                                    </figure>

                                    <div class="product-details">

                                        <h4 class="product-name">

                                             <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>"><?php echo $rownewarrival->product; ?></a>

                                        </h4>

                                        <div class="ratings-container">

                                            <div class="ratings-full">

                                                <span class="ratings" style="width: 100%;"></span>

                                                <span class="tooltiptext tooltip-top"></span>

                                            </div>

                                        </div>

                                        <div class="product-price">

                                            <ins class="new-price">Rs: <?php echo $rownewarrival->price; ?></ins>

                                        </div>

                                    </div>

                                </div>

                            <?php } ?>

                                <!-- End of Product Widget -->

                               

                                <!-- End of Product Widget -->

                              

                                <!-- End of Product Widget -->

                            </div>

                            <!-- End of Widget Products -->

                        </div>

                        <!-- End of Col -->



                        <div class="col-lg-3 col-sm-6 mb-6">

                            <h4 class="title title-underline mb-2 pt-1">Latest Products</h4>

                            <div class="widget widget-products">

                            <?php foreach(array_slice($newarrivalproduct, 0, 5) as $rownewarrival){ ?>

                                <div class="product product-widget">

                                    <figure class="product-media">

                                         <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>">

                                            <img src="<?php echo base_url().$rownewarrival->imagepath ?>" alt="Product"

                                            style="width: 100px;height: 100px;">

                                        </a>

                                    </figure>

                                    <div class="product-details">

                                        <h4 class="product-name">

                                             <a href="<?php echo base_url().'Product/Productview/'.$rownewarrival->productid.'/'.str_replace(' ', '', $rownewarrival->product); ?>"><?php echo $rownewarrival->product; ?>/a>

                                        </h4>

                                        <div class="ratings-container">

                                            <div class="ratings-full">

                                                <span class="ratings" style="width: 100%;"></span>

                                                <span class="tooltiptext tooltip-top"></span>

                                            </div>

                                        </div>

                                        <div class="product-price">

                                            <ins class="new-price">Rs <?php echo number_format($rownewarrival->price); ?></ins>

                                        </div>

                                    </div>

                                </div>

                            <?php } ?> 

                                <!-- End of Product Widget -->

                                

                                <!-- End of Product Widget -->

                               

                                <!-- End of Product Widget -->

                            </div>

                            <!-- End of Widget Products -->

                        </div>

                        <!-- End of Col -->

                    </div>

                    <!-- End of Row -->



                   

                    <!-- End of Brands Wrapper -->



                    

                       

                    <!-- End of Blog Post -->



                    

                   

                    <!-- End of Reviewed Producs -->

                </div>

                <!-- End of Container -->

            </div>

            <!-- End of Page Cotent -->

        </main>

        <!-- end of .main -->

        <?php include "include/footercontent.php"; ?>

	</div>

	<!-- End of Page-wrapper-->



	<?php include "include/footerscript.php"; ?>





<script>

    



    $(document).ready(function() {

     

     $("#owl-demo").owlCarousel({

    

         navigation : true, // Show next and prev buttons

         slideSpeed : 100,

         paginationSpeed : 100,

         singleItem:true

    

         // "singleItem:true" is a shortcut for:

         // items : 1, 

         // itemsDesktop : false,

         // itemsDesktopSmall : false,

         // itemsTablet: false,

         // itemsMobile : false

    

     });

    

   });





    </script>





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