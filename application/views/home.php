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

<body >
	
		<?php include "include/menu1.php"; ?>

        <!-- start of .main -->
        <main class="main">
            <div class="page-content">
                <section class="intro-section">
                    <div class="intro-slider owl-carousel owl-theme row cols-xl-1 cols-1 animation-slider gutter-no"
                        data-owl-options="{
                            'nav': false,
                            'dots': true,
                            'loop': false,
                            'items': 1,
                            'autoPlay': false,
                            'dotsContainer': '.custom-dots'
                        }">
                        <div class="banner banner-fixed intro-slide intro-slide1"
                            style="background-image: url(<?php echo base_url() ?>images/slides/slide-1.jpg); background-color: #EEEDEB;">
                            <!-- <div class="container">
                                <div class="banner-content d-inline-block y-50">
                                    <div class="slide-animate" data-animation-options="{
                                        'name': 'fadeInUpShorter', 'duration': '1s'
                                    }">
                                        <h5 class="banner-subtitle text-uppercase font-weight-bold">
                                            Performance &amp; Lifestyle
                                        </h5>
                                        <h3 class="banner-title ls-25 mb-6">
                                            <span class="text-primary">Introducing</span>
                                            Fashion lifestyle collection
                                        </h3>
                                        <a href="shop-banner-sidebar.html"
                                            class="btn btn-dark btn-outline btn-rounded btn-icon-right">
                                            Shop Now<i class="w-icon-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- End of Intro Slide 1 -->
                        <div class="banner banner-fixed intro-slide intro-slide2"
                            style="background-image: url(<?php echo base_url() ?>images/slides/slide-2.jpg); background-color: #A9A9A9;">
                            <!-- <div class="container text-right">
                                <div class="banner-content y-50 d-inline-block">
                                    <div class="slide-animate" data-animation-options="{
                                        'name': 'zoomIn', 'duration': '1s'
                                    }">
                                        <h5 class="banner-subtitle text-uppercase font-weight-bold ls-25 mb-0">
                                            Up To <strong class="text-primary text-capitalize">30% Off</strong>
                                        </h5>
                                        <h3 class="banner-title text-white text-uppercase ls-25">Calisthenics</h3>
                                        <div class="banner-price-info text-white">Start at $125.00</div>
                                        <a href="shop-banner-sidebar.html"
                                            class="btn btn-white btn-outline btn-rounded btn-icon-right">
                                            Shop Now<i class="w-icon-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- End of Intro Slide 2 -->
                        <div class="banner banner-fixed intro-slide intro-slide3"
                            style="background-image: url(<?php echo base_url() ?>images/slides/slide-3.jpg); background-color: #F3F3F3;">
                            <!-- <div class="container">
                                <div class="banner-content y-50 d-inline-block">
                                    <div class="slide-animate" data-animation-options="{
                                        'name': 'fadeInDownShorter', 'duration': '1s'
                                    }">
                                        <h5 class="banner-subtitle text-uppercase text-primary font-weight-bold mb-1">
                                            From Online Store
                                        </h5>
                                        <h3 class="banner-title text-uppercase ls-25">Sprimgchic</h3>
                                        <h4 class="ls-25 mb-0">Recommend</h4>
                                        <p class="ls-25">Free shipping on all orders over <span
                                                class="text-dark">$99.00</span></p>
                                        <a href="shop-banner-sidebar.html"
                                            class="btn btn-dark btn-rounded btn-outline btn-icon-right">
                                            Shop Now<i class="w-icon-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="custom-dots owl-img-dots appear-animate">
                        <a href="#" class="active appear-animate">
                            <img src="images/slides/dot-1.png" alt="Slide Thumb" width="70"
                                height="70">
                        </a>
                        <a href="#" class="appear-animate">
                            <img src="images/slides/dot-2.png" alt="Slide Thumb" width="70"
                                height="70">
                        </a>
                        <a href="#" class="appear-animate">
                            <img src="images/slides/dot-3.png" alt="Slide Thumb" width="70"
                                height="70">
                        </a>
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
                                                width="124" height="140">
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
                                                width="124" height="140">
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
                                                width="124" height="140">
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
                                                width="124" height="140">
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