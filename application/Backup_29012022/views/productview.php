<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title><?php echo $productinfo->product[0]->productname; ?> - Omative</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Wolmart eCommmerce Marketplace HTML Template">
    <meta name="author" content="D-THEMES">

    <?php include "include/headerscript1.php"; ?>
</head>

<body>
    <div class="page-wrapper">
        <?php include "include/menu1.php"; ?>


        <!-- Start of Main -->
        <main class="main mb-10 pb-1 mt-5">
			<?php //print_r($productinfo); ?>
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav container mb-5">
                <ul class="breadcrumb bb-no">
                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                    <li>Products</li>
                    <li><?php echo $productinfo->product[0]->productname; ?></li>
                </ul>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="main-content">
                            <div class="product product-single row">
                                <div class="col-md-6 mb-6">
                                    <div class="product-gallery product-gallery-sticky">
                                        <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
											<?php if(!empty($productinfo->productimages)){ foreach($productinfo->productimages as $productimagelist){ ?>
                                            <figure class="product-image">
                                                <img src="<?php echo base_url($productimagelist->imagepath);?>"
                                                    data-zoom-image="<?php echo base_url($productimagelist->imagepath);?>"
                                                    alt="<?php echo $productinfo->product[0]->productname; ?>" width="800" height="900">
											</figure>
											<?php }}else{ ?>
											<figure class="product-image">
                                                <img src="<?php echo base_url().'images/no-preview.jpg'; ?>"
                                                    data-zoom-image="<?php echo base_url().'images/no-preview.jpg'; ?>"
                                                    alt="<?php echo $productinfo->product[0]->productname; ?>" width="800" height="900">
											</figure>
											<?php } ?>
                                        </div>
                                        <div class="product-thumbs-wrap">
                                            <div class="product-thumbs row cols-4 gutter-sm">
												<?php $i=0; if(!empty($productinfo->productimages)){ foreach($productinfo->productimages as $productimagelist){ ?>
                                                <div class="product-thumb <?php if($i==0){echo 'active';} ?>">
                                                    <img src="<?php echo base_url().$productimagelist->imagepath; ?>"
                                                        alt="<?php echo $productinfo->product[0]->productname; ?>" width="800" height="900">
												</div>
												<?php $i++;}}else{ ?>
												<div class="product-thumb active">
                                                    <img src="<?php echo base_url().'images/no-preview.jpg'; ?>"
														alt="<?php echo $productinfo->product[0]->productname; ?>" width="800" height="900">	
												</div>
												<?php } ?>
                                            </div>
                                            <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                                            <button class="thumb-down disabled"><i
                                                    class="w-icon-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 mb-md-6">
                                    <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                        <h2 class="product-title"><?php echo $productinfo->product[0]->productname; ?></h2>
                                        <div class="product-bm-wrapper">
                                            <figure class="brand">
                                                <img src="<?php echo base_url().$productinfo->product[0]->listimagepath; ?>" alt="<?php echo $productinfo->product[0]->product_category; ?>"
                                                    width="102" height="48" />
                                            </figure>
                                            <div class="product-meta">
                                                <div class="product-categories">
                                                    Category:
                                                    <span class="product-category"><a href="#"><?php echo $productinfo->product[0]->product_category; ?></a></span>
                                                </div>
                                                <div class="product-sku">
                                                    SKU: <span></span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="product-divider">
                                        
                                        <?php //if($productinfo->product[0]->disprice>0){ ?>
                                        <!-- <div class="product-price"><ins class="new-price">Rs <?php //echo number_format($productinfo->product[0]->disprice); ?></ins>
                                        <del class="old-price">Rs <?php //echo number_format($productinfo->product[0]->price); ?></del>
                                        </div> -->
                                        <?php //}else{ ?>
                                        <div class="product-price"><ins class="new-price">Rs <?php echo number_format($productinfo->product[0]->price); ?></ins></div>
                                        <?php //} ?>
                                        
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="#product-tab-reviews" class="rating-reviews scroll-to">(3
                                                Reviews)</a>
                                        </div>

                                        <!-- <div class="product-short-desc">
                                            <?php //echo $productinfo->product[0]->shortdesc; ?>
                                        </div> -->

                                        <hr class="product-divider">

                                        <div class="fix-bottom product-sticky-content sticky-content">
                                            <div class="product-form container">
                                                <?php //if($productinfo->product[0]->stock>0){ ?>
                                                <div class="product-qty-form">
                                                    <div class="input-group">
                                                        <input class="quantity form-control" id="qtyvalue" type="number" min="1"
                                                            max="<?php //echo $productinfo->product[0]->stock; ?>">
                                                        <button class="quantity-plus w-icon-plus"></button>
                                                        <button class="quantity-minus w-icon-minus"></button>
                                                    </div>
                                                </div>
                                                <button class="btn btn-orange btn-cart buynow mr-1" id="<?php echo $productinfo->product[0]->idtbl_product; ?>">
                                                    <i class="w-icon-wallet"></i>
                                                    <span>Buy Now</span>
                                                </button>
                                                <button class="btn btn-primary btn-cart addtocart" id="<?php echo $productinfo->product[0]->idtbl_product; ?>">
                                                    <i class="w-icon-cart"></i>
                                                    <span>Add to Cart</span>
                                                </button>
                                                <?php //}else{ ?>
                                                <!-- <h2 class="banner-title"><span class="text-secondary">Out Stock</span></h2> -->
                                                <?php //} ?>
                                            </div>
                                        </div>

                                        <div class="social-links-wrapper">
                                            <div class="social-links">
                                                <div class="social-icons social-no-color border-thin">
                                                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                                    <a href="#"
                                                        class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                    <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                                    <a href="#"
                                                        class="social-icon social-youtube fab fa-linkedin-in"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#product-tab-description" class="nav-link active">Description</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="#product-tab-specification" class="nav-link">Specification</a>
                                    </li> -->
                                    <!-- <li class="nav-item">
                                        <a href="#product-tab-vendor" class="nav-link">Vendor Info</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a href="#product-tab-reviews" class="nav-link">Customer Reviews (3)</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="product-tab-description">
                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-5">
                                                <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                                <?php echo $productinfo->product[0]->desc; ?>
                                            </div>
                                            <div class="col-md-6 mb-5">
                                                <div class="banner banner-video product-video br-xs">
                                                    <figure class="banner-media">
                                                        <?php if(!empty($productinfo->product[0]->videolink)){ ?>
                                                        <div class="embed-responsive embed-responsive-4by3">
                                                            <iframe class="embed-responsive-item" width="610" height="300" src="<?php echo $productinfo->product[0]->videolink; ?>"></iframe>
                                                        </div>
                                                        <?php } ?>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row cols-md-3">
                                            <div class="mb-3">
                                                <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>Free
                                                    Shipping &amp; Return</h5>
                                                <p class="detail pl-5">We offer free shipping for products on orders
                                                    above 50$ and offer free delivery for all orders in US.</p>
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="sub-title font-weight-bold"><span>2.</span>Free and Easy
                                                    Returns</h5>
                                                <p class="detail pl-5">We guarantee our products and you could get back
                                                    all of your money anytime you want in 30 days.</p>
                                            </div>
                                            <div class="mb-3">
                                                <h5 class="sub-title font-weight-bold"><span>3.</span>Special Financing
                                                </h5>
                                                <p class="detail pl-5">Get 20%-50% off items over 50$ for a month or
                                                    over 250$ for a year with our special credit card.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="product-tab-specification">
                                        <ul class="list-none">
                                            <li>
                                                <label>Model</label>
                                                <p>Skysuite 320</p>
                                            </li>
                                            <li>
                                                <label>Color</label>
                                                <p>Black</p>
                                            </li>
                                            <li>
                                                <label>Size</label>
                                                <p>Large, Small</p>
                                            </li>
                                            <li>
                                                <label>Guarantee Time</label>
                                                <p>3 Months</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="product-tab-vendor">
                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-4">
                                                <figure class="vendor-banner br-sm">
                                                    <img src="<?php echo base_url(); ?>images/products/vendor-banner.jpg"
                                                        alt="Vendor Banner" width="610" height="295"
                                                        style="background-color: #353B55;" />
                                                </figure>
                                            </div>
                                            <div class="col-md-6 pl-2 pl-md-6 mb-4">
                                                <div class="vendor-user">
                                                    <figure class="vendor-logo mr-4">
                                                        <a href="#">
                                                            <img src="<?php echo base_url(); ?>images/products/vendor-logo.jpg"
                                                                alt="Vendor Logo" width="80" height="80" />
                                                        </a>
                                                    </figure>
                                                    <div>
                                                        <div class="vendor-name"><a href="#">Jone Doe</a></div>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 90%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <a href="#" class="rating-reviews">(32 Reviews)</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="vendor-info list-style-none">
                                                    <li class="store-name">
                                                        <label>Store Name:</label>
                                                        <span class="detail">OAIO Store</span>
                                                    </li>
                                                    <li class="store-address">
                                                        <label>Address:</label>
                                                        <span class="detail">Steven Street, El Carjon, CA 92020, United
                                                            States (US)</span>
                                                    </li>
                                                    <li class="store-phone">
                                                        <label>Phone:</label>
                                                        <a href="#tel:">1234567890</a>
                                                    </li>
                                                </ul>
                                                <a href="vendor-dokan-store.html"
                                                    class="btn btn-dark btn-link btn-underline btn-icon-right">Visit
                                                    Store<i class="w-icon-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <p class="mb-5"><strong class="text-dark">L</strong>orem ipsum dolor sit amet,
                                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua.
                                            Venenatis tellus in metus vulputate eu scelerisque felis. Vel pretium
                                            lectus quam id leo in vitae turpis massa. Nunc id cursus metus aliquam.
                                            Libero id faucibus nisl tincidunt eget. Aliquam id diam maecenas ultricies
                                            mi eget mauris. Volutpat ac tincidunt vitae semper quis lectus. Vestibulum
                                            mattis ullamcorper velit sed. A arcu cursus vitae congue mauris.
                                        </p>
                                        <p class="mb-2"><strong class="text-dark">A</strong> arcu cursus vitae congue
                                            mauris. Sagittis id consectetur purus
                                            ut. Tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla.
                                            Diam in
                                            arcu cursus euismod quis. Eget sit amet tellus cras adipiscing enim eu. In
                                            fermentum et sollicitudin ac orci phasellus. A condimentum vitae sapien
                                            pellentesque
                                            habitant morbi tristique senectus et. In dictum non consectetur a erat. Nunc
                                            scelerisque viverra mauris in aliquam sem fringilla.</p>
                                    </div>
                                    <div class="tab-pane" id="product-tab-reviews">
                                        <div class="row mb-4">
                                            <div class="col-xl-4 col-lg-5 mb-4">
                                                <div class="ratings-wrapper">
                                                    <div class="avg-rating-container">
                                                        <h4 class="avg-mark font-weight-bolder ls-50">3.3</h4>
                                                        <div class="avg-rating">
                                                            <p class="text-dark mb-1">Average Rating</p>
                                                            <div class="ratings-container">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 60%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                                <a href="#" class="rating-reviews">(3 Reviews)</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="ratings-value d-flex align-items-center text-dark ls-25">
                                                        <span
                                                            class="text-dark font-weight-bold">66.7%</span>Recommended<span
                                                            class="count">(2 of 3)</span>
                                                    </div>
                                                    <div class="ratings-list">
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 100%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <div class="progress-bar progress-bar-sm ">
                                                                <span></span>
                                                            </div>
                                                            <div class="progress-value">
                                                                <mark>70%</mark>
                                                            </div>
                                                        </div>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <div class="progress-bar progress-bar-sm ">
                                                                <span></span>
                                                            </div>
                                                            <div class="progress-value">
                                                                <mark>30%</mark>
                                                            </div>
                                                        </div>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <div class="progress-bar progress-bar-sm ">
                                                                <span></span>
                                                            </div>
                                                            <div class="progress-value">
                                                                <mark>40%</mark>
                                                            </div>
                                                        </div>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 40%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <div class="progress-bar progress-bar-sm ">
                                                                <span></span>
                                                            </div>
                                                            <div class="progress-value">
                                                                <mark>0%</mark>
                                                            </div>
                                                        </div>
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 20%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <div class="progress-bar progress-bar-sm ">
                                                                <span></span>
                                                            </div>
                                                            <div class="progress-value">
                                                                <mark>0%</mark>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-lg-7 mb-4">
                                                <div class="review-form-wrapper">
                                                    <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your
                                                        Review</h3>
                                                    <p class="mb-3">Your email address will not be published. Required
                                                        fields are marked *</p>
                                                    <form action="#" method="POST" class="review-form">
                                                        <div class="rating-form">
                                                            <label for="rating">Your Rating Of This Product :</label>
                                                            <span class="rating-stars">
                                                                <a class="star-1" href="#">1</a>
                                                                <a class="star-2" href="#">2</a>
                                                                <a class="star-3" href="#">3</a>
                                                                <a class="star-4" href="#">4</a>
                                                                <a class="star-5" href="#">5</a>
                                                            </span>
                                                            <select name="rating" id="rating" required=""
                                                                style="display: none;">
                                                                <option value="">Rate…</option>
                                                                <option value="5">Perfect</option>
                                                                <option value="4">Good</option>
                                                                <option value="3">Average</option>
                                                                <option value="2">Not that bad</option>
                                                                <option value="1">Very poor</option>
                                                            </select>
                                                        </div>
                                                        <textarea cols="30" rows="6"
                                                            placeholder="Write Your Review Here..." class="form-control"
                                                            id="review"></textarea>
                                                        <div class="row gutter-md">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Your Name" id="author">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Your Email" id="email_1">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="checkbox" class="custom-checkbox"
                                                                id="save-checkbox">
                                                            <label for="save-checkbox">Save my name, email, and website
                                                                in this browser for the next time I comment.</label>
                                                        </div>
                                                        <button type="submit" class="btn btn-dark">Submit
                                                            Review</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a href="#show-all" class="nav-link active">Show All</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#helpful-positive" class="nav-link">Most Helpful
                                                        Positive</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#helpful-negative" class="nav-link">Most Helpful
                                                        Negative</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#highest-rating" class="nav-link">Highest Rating</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="show-all">
                                                    <ul class="comments list-style-none">
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="<?php echo base_url(); ?>images/agents/1-100x100.png"
                                                                        alt="Commenter Avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">John Doe</a>
                                                                        <span class="comment-date">March 22, 2021 at
                                                                            1:54 pm</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: 60%;"></span>
                                                                            <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>pellentesque habitant morbi tristique senectus
                                                                        et. In dictum non consectetur a erat.
                                                                        Nunc ultrices eros in cursus turpis massa
                                                                        tincidunt ante in nibh mauris cursus mattis.
                                                                        Cras ornare arcu dui vivamus arcu felis bibendum
                                                                        ut tristique.</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            (0)
                                                                        </a>
                                                                        <div class="review-image">
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo base_url(); ?>images/products/default/review-img-1.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo base_url(); ?>images/products/default/review-img-1-800x900.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="<?php echo base_url(); ?>images/agents/2-100x100.png"
                                                                        alt="Commenter Avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">John Doe</a>
                                                                        <span class="comment-date">March 22, 2021 at
                                                                            1:52 pm</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: 80%;"></span>
                                                                            <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>Nullam a magna porttitor, dictum risus nec,
                                                                        faucibus sapien.
                                                                        Ultrices eros in cursus turpis massa tincidunt
                                                                        ante in nibh mauris cursus mattis.
                                                                        Cras ornare arcu dui vivamus arcu felis bibendum
                                                                        ut tristique.</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            (0)
                                                                        </a>
                                                                        <div class="review-image">
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo base_url(); ?>images/products/default/review-img-2.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo base_url(); ?>images/products/default/review-img-2.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo base_url(); ?>images/products/default/review-img-3.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo base_url(); ?>images/products/default/review-img-3.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="<?php echo base_url(); ?>images/agents/3-100x100.png"
                                                                        alt="Commenter Avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">John Doe</a>
                                                                        <span class="comment-date">March 22, 2021 at
                                                                            1:21 pm</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: 60%;"></span>
                                                                            <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>In fermentum et sollicitudin ac orci phasellus. A
                                                                        condimentum vitae
                                                                        sapien pellentesque habitant morbi tristique
                                                                        senectus et. In dictum
                                                                        non consectetur a erat. Nunc scelerisque viverra
                                                                        mauris in aliquam sem fringilla.</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful (0)
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            (1)
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="helpful-positive">
                                                    <ul class="comments list-style-none">
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="<?php echo base_url(); ?>images/agents/1-100x100.png"
                                                                        alt="Commenter Avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">John Doe</a>
                                                                        <span class="comment-date">March 22, 2021 at
                                                                            1:54 pm</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: 60%;"></span>
                                                                            <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>pellentesque habitant morbi tristique senectus
                                                                        et. In dictum non consectetur a erat.
                                                                        Nunc ultrices eros in cursus turpis massa
                                                                        tincidunt ante in nibh mauris cursus mattis.
                                                                        Cras ornare arcu dui vivamus arcu felis bibendum
                                                                        ut tristique.</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            (0)
                                                                        </a>
                                                                        <div class="review-image">
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo base_url(); ?>images/products/default/review-img-1.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo base_url(); ?>images/products/default/review-img-1.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="<?php echo base_url(); ?>images/agents/2-100x100.png"
                                                                        alt="Commenter Avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">John Doe</a>
                                                                        <span class="comment-date">March 22, 2021 at
                                                                            1:52 pm</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: 80%;"></span>
                                                                            <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>Nullam a magna porttitor, dictum risus nec,
                                                                        faucibus sapien.
                                                                        Ultrices eros in cursus turpis massa tincidunt
                                                                        ante in nibh mauris cursus mattis.
                                                                        Cras ornare arcu dui vivamus arcu felis bibendum
                                                                        ut tristique.</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            (0)
                                                                        </a>
                                                                        <div class="review-image">
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo base_url(); ?>images/products/default/review-img-2.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo base_url(); ?>images/products/default/review-img-2-800x900.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo base_url(); ?>images/products/default/review-img-3.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo base_url(); ?>images/products/default/review-img-3-800x900.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="helpful-negative">
                                                    <ul class="comments list-style-none">
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="<?php echo base_url(); ?>images/agents/3-100x100.png"
                                                                        alt="Commenter Avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">John Doe</a>
                                                                        <span class="comment-date">March 22, 2021 at
                                                                            1:21 pm</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: 60%;"></span>
                                                                            <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>In fermentum et sollicitudin ac orci phasellus. A
                                                                        condimentum vitae
                                                                        sapien pellentesque habitant morbi tristique
                                                                        senectus et. In dictum
                                                                        non consectetur a erat. Nunc scelerisque viverra
                                                                        mauris in aliquam sem fringilla.</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful (0)
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            (1)
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="highest-rating">
                                                    <ul class="comments list-style-none">
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="<?php echo base_url(); ?>images/agents/2-100x100.png"
                                                                        alt="Commenter Avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">John Doe</a>
                                                                        <span class="comment-date">March 22, 2021 at
                                                                            1:52 pm</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: 80%;"></span>
                                                                            <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>Nullam a magna porttitor, dictum risus nec,
                                                                        faucibus sapien.
                                                                        Ultrices eros in cursus turpis massa tincidunt
                                                                        ante in nibh mauris cursus mattis.
                                                                        Cras ornare arcu dui vivamus arcu felis bibendum
                                                                        ut tristique.</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            (0)
                                                                        </a>
                                                                        <div class="review-image">
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo base_url(); ?>images/products/default/review-img-2.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo base_url(); ?>images/products/default/review-img-2-800x900.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo base_url(); ?>images/products/default/review-img-3.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo base_url(); ?>images/products/default/review-img-3-800x900.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="lowest-rating">
                                                    <ul class="comments list-style-none">
                                                        <li class="comment">
                                                            <div class="comment-body">
                                                                <figure class="comment-avatar">
                                                                    <img src="<?php echo base_url(); ?>images/agents/1-100x100.png"
                                                                        alt="Commenter Avatar" width="90" height="90">
                                                                </figure>
                                                                <div class="comment-content">
                                                                    <h4 class="comment-author">
                                                                        <a href="#">John Doe</a>
                                                                        <span class="comment-date">March 22, 2021 at
                                                                            1:54 pm</span>
                                                                    </h4>
                                                                    <div class="ratings-container comment-rating">
                                                                        <div class="ratings-full">
                                                                            <span class="ratings"
                                                                                style="width: 60%;"></span>
                                                                            <span
                                                                                class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                    </div>
                                                                    <p>pellentesque habitant morbi tristique senectus
                                                                        et. In dictum non consectetur a erat.
                                                                        Nunc ultrices eros in cursus turpis massa
                                                                        tincidunt ante in nibh mauris cursus mattis.
                                                                        Cras ornare arcu dui vivamus arcu felis bibendum
                                                                        ut tristique.</p>
                                                                    <div class="comment-action">
                                                                        <a href="#"
                                                                            class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-up"></i>Helpful (1)
                                                                        </a>
                                                                        <a href="#"
                                                                            class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                            <i class="far fa-thumbs-down"></i>Unhelpful
                                                                            (0)
                                                                        </a>
                                                                        <div class="review-image">
                                                                            <a href="#">
                                                                                <figure>
                                                                                    <img src="<?php echo base_url(); ?>images/products/default/review-img-3.jpg"
                                                                                        width="60" height="60"
                                                                                        alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                                        data-zoom-image="<?php echo base_url(); ?>images/products/default/review-img-3-800x900.jpg" />
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <?php //print_r($categoryproductright) ?>
                        <!-- End of Main Content -->
                        <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                            <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                            <div class="sidebar-content scrollable">
                                <div class="sticky-sidebar">
                                    <div class="widget widget-icon-box mb-6">
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-truck"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Free Shipping & Returns</h4>
                                                <p>Order above 10,000 & 7 days returns</p>
                                            </div>
                                        </div>
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-bag"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Secure Payment</h4>
                                                <p>We ensure secure payment</p>
                                            </div>
                                        </div>
                                        <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-money"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <h4 class="icon-box-title">Money Back Guarantee</h4>
                                                <p>Any back within 30 days</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Widget Icon Box -->
                                    

                                  
                                </div>
                            </div>
                        </aside>
                        <!-- End of Sidebar -->
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        </main>
        <!-- End of Main -->

        <!-- Root element of PhotoSwipe. Must have class pswp -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

            <!-- Background of PhotoSwipe. It's a separate element as animating opacity is faster than rgba(). -->
            <div class="pswp__bg"></div>

            <!-- Slides wrapper with overflow:hidden. -->
            <div class="pswp__scroll-wrap">

                <!-- Container that holds slides.
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don't modify these 3 pswp__item elements, data is added later on. -->
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>

                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                <div class="pswp__ui pswp__ui--hidden">

                    <div class="pswp__top-bar">

                        <!--  Controls are self-explanatory. Order can be changed. -->

                        <div class="pswp__counter"></div>

                        <button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>

                        <div class="pswp__preloader">
                            <div class="loading-spin"></div>
                        </div>
                    </div>

                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>

                    <button class="pswp__button--arrow--left" aria-label="Previous (arrow left)"></button>
                    <button class="pswp__button--arrow--right" aria-label="Next (arrow right)"></button>

                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PhotoSwipe -->

        <?php include "include/footercontent.php"; ?>
    </div>
    <!-- End of Page Wrapper -->

    <?php include "include/footerscript.php"; ?>

    <script>
		$(document).ready(function(){
			$('.addtocart').click(function(e){
                e.preventDefault();
                var productID = $(this).attr('id'); 
                var qty = $('#qtyvalue').val();

                addtocart(productID, qty);
                setTimeout(function(){ $('.alertclose').click(); }, 3000);
            });
            $('.addtocartother').click(function(e){
                e.preventDefault();
                var productID = $(this).attr('id'); 
                var qty = '1';

                addtocart(productID, qty);
            });
            $('.buynow').click(function(e){
                e.preventDefault();
                var productID = $(this).attr('id'); 
                var qty = $('#qtyvalue').val();

                addtocart(productID, qty);
                
                location.href = '<?php echo base_url() ?>Cart/Buyitnow';
            });
		});
	</script>
</body>

</html>