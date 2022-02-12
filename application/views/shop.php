<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Shop - Rumantra - By ERav Technology</title>

    <?php include "include/headerscript1.php"; ?>
</head>

<body>
    <div class="page-wrapper">
        <?php include "include/menu1.php"; ?>
 <!-- Start of Main -->
        <main class="main">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb bb-no">
                        <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                        <li><a href="#">Shop</a></li>
                       
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->
            <div class="container">
            <!-- Start of Page Content -->
            <div class="page-content mb-10">
                <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6"
                    style="background-image: url(assets/images/shop/banner2.jpg); background-color: #B8588D;">
                    <div class="container banner-content">
                        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10 text-center"><?php echo $categoryname->product_category; ?></h3>
                    </div>
                </div>
                <!-- End of Shop Banner -->
                <div class="container-fluid">
                    <!-- Start of Shop Content -->
                    <div class="shop-content">
                        <!-- Start of Shop Main Content -->
                        <div class="main-content">
                            <nav class="toolbox sticky-toolbox sticky-content fix-top">
                                <div class="toolbox-left">
                                    <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                                        btn-icon-left"><i class="w-icon-category"></i><span>Filters</span></a>
                                    <div class="toolbox-item toolbox-sort select-box text-dark">
                                        <label>Sort By :</label>
                                        <select name="orderby" class="form-control">
                                            <option value="default" selected="selected">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by latest</option>
                                            <option value="price-low">Sort by pric: low to high</option>
                                            <option value="price-high">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="toolbox-right">
                                    <div class="toolbox-item toolbox-show select-box">
                                        <select name="count" class="form-control">
                                            <option value="9">Show 9</option>
                                            <option value="12" selected="selected">Show 12</option>
                                            <option value="24">Show 24</option>
                                            <option value="36">Show 36</option>
                                        </select>
                                    </div>
                                    <div class="toolbox-item toolbox-layout">
                                        <a href="shop-fullwidth-banner.html" class="icon-mode-grid btn-layout active">
                                            <i class="w-icon-grid"></i>
                                        </a>
                                        <a href="shop-list.html" class="icon-mode-list btn-layout">
                                            <i class="w-icon-list"></i>
                                        </a>
                                    </div>
                                </div>
                            </nav>
                            <div class="product-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">

                            <?php foreach ($productlist as $row) {?>

                                <div class="product-wrap">
                                    <div class="product text-center">
                                        <figure class="product-media">
                                            <a href="<?php echo base_url().'Product/Productview/'.$row->idtbl_product.'/'.preg_replace('/[\-\(\)\@\.\;\" "]+/', '', $row->productname); ?>">
                                                <img src="<?php echo base_url($row->listimagepath);?>" alt="Product" width="300"
                                                    height="338" />
                                            </a>
                                            <?php if($row->qty==0){ ?>
                                            <div class="product-label-group">
                                                <span class="product-label label-new">Out Stock</span>
                                            </div>
                                            <?php }else{ ?>
                                            <div class="product-label-group">
                                                <span class="product-label label-new">Ava. <?php echo $row->qty; ?></span>
                                            </div>
                                            <?php } ?>
        
                                            <div class="product-action-horizontal"> 
                                            <?php if($row->qty>0){ ?>
												<a href="#" class="btn-product-icon btn-cart w-icon-cart addtocart" id="<?php echo $row->idtbl_product; ?>" title="Add to cart"></a>
												<?php } else{ ?>
												<a href="#" class="btn-product-icon btn-cart w-icon-times-circle" title="Out Stock"></a>
												<?php } ?>  
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="product-cat">
                                                <a href="shop-banner-sidebar.html"></a>
                                            </div>
                                            <h3 class="product-name">
                                                <a href="<?php echo base_url().'Product/Productview/'.$row->idtbl_product.'/'.preg_replace('/[\-\(\)\@\.\;\" "]+/', '', $row->productname); ?>"><?php echo $row->productname; ?></a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="<?php echo base_url().'Product/Productview/'.$row->idtbl_product.'/'.preg_replace('/[\-\(\)\@\.\;\" "]+/', '', $row->productname); ?>" class="rating-reviews">(<?php echo $row->avgrate; ?> reviews)</a>
                                            </div>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price">
                                                Rs: <?php echo $row->price; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>
                                
                            </div>
                            <p><?php echo $pagination; ?></p>
                        </div>
                        <!-- End of Shop Main Content -->

                        <!-- End of Shop Sidebar -->
                    </div>
                    <!-- End of Shop Content -->
                </div>
            </div>
            <!-- End of Page Content -->
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