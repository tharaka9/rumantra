<!-- Start of Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
    <a href="<?php echo base_url() ?>" class="sticky-link active">
        <i class="w-icon-home"></i>
        <p>Home</p>
    </a>
    <a href="<?php echo base_url() ?>/product/productlist/1/Skin Care" class="sticky-link">
        <i class="w-icon-category"></i>
        <p>Shop</p>
    </a>
    <a href="<?php if(!empty($_SESSION['user_id'])){echo base_url().'Loginregister/Account'; }else{echo base_url().'Loginregister/Account';} ?>" class="sticky-link">
        <i class="w-icon-account"></i>
        <p>Account</p>
    </a>
    <div class="cart-dropdown dir-up">
        <a href="<?php echo base_url().'Cart' ?>" class="sticky-link">
            <i class="w-icon-cart"></i>
            <p>Cart</p>
        </a>
        <!-- <div class="dropdown-box">
            <div class="products">
                <div class="product product-cart">
                    <div class="product-detail">
                        <h3 class="product-name">
                            <a href="product-default.html">Beige knitted elas<br>tic
                                runner shoes</a>
                        </h3>
                        <div class="price-box">
                            <span class="product-quantity">1</span>
                            <span class="product-price">$25.68</span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="<?php echo base_url('assets/images/cart/product-1.jpg');?>" alt="product" height="84" width="94" />
                        </a>
                    </figure>
                    <button class="btn btn-link btn-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="product product-cart">
                    <div class="product-detail">
                        <h3 class="product-name">
                            <a href="product-default.html">Blue utility pina<br>fore
                                denim dress</a>
                        </h3>
                        <div class="price-box">
                            <span class="product-quantity">1</span>
                            <span class="product-price">$32.99</span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="<?php echo base_url('assets/images/cart/product-2.jpg');?>" alt="product" width="84" height="94" />
                        </a>
                    </figure>
                    <button class="btn btn-link btn-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="cart-total">
                <label>Subtotal:</label>
                <span class="price">$58.67</span>
            </div>

            <div class="cart-action">
                <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
            </div>
        </div> -->
        <!-- End of Dropdown Box -->
    </div>

    <div class="header-search hs-toggle dir-up">
        <a href="<?php if(!empty($_SESSION['user_id'])){echo base_url().'Loginregister/Account'; }else{echo base_url().'Loginregister/Account';} ?>" class="search-toggle sticky-link">
        <i class="fas fa-sign-in-alt"></i>
        <p>Signin</p>
    </a>
    </div>
</div>
<!-- End of Sticky Footer -->

<!-- Start of Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
<!-- End of Scroll Top -->

<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                    <li>
                        <a href="#">Shop</a>
                        <ul>
                            <?php foreach ($productcategory as $row) { ?>
                            <li>
                                <a href="<?php echo base_url().'product/productlist/'.$row->idtbl_product_category.'/'.$row->product_category ?>"><?php echo $row->product_category ?></a>
                            </li>
                            <?php }?>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('other/contactus');?>">Contact</a></li>
                    <li><a href="<?php echo base_url('other/aboutus');?>">About</a></li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    <?php foreach ($productcategory as $key => $row): ?>
                    <li>
                        <a href="<?php echo base_url().'product/productlist/'.$row->idtbl_product_category.'/'.$row->product_category ?>">
                            <?php echo $row->product_category ;?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->

<!-- Start of Quick View -->
<div class="product product-single product-popup">
    <div class="row gutter-lg">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="product-gallery product-gallery-sticky mb-0">
                <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                    <figure class="product-image">
                        <img src="<?php echo base_url('assets/images/products/popup/1-440x494.jpg');?>"
                            data-zoom-image="assets/images/products/popup/1-800x900.jpg"
                            alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                    <figure class="product-image">
                        <img src="<?php echo base_url('assets/images/products/popup/2-440x494.jpg');?>"
                            data-zoom-image="<?php echo base_url('assets/images/products/popup/2-800x900.jpg');?>"
                            alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                    <figure class="product-image">
                        <img src="<?php echo base_url('assets/images/products/popup/3-440x494.jpg');?>"
                            data-zoom-image="<?php echo base_url('assets/images/products/popup/3-800x900.jpg');?>"
                            alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                    <figure class="product-image">
                        <img src="<?php echo base_url('assets/images/products/popup/4-440x494.jpg');?>"
                            data-zoom-image="<?php echo base_url('assets/images/products/popup/4-800x900.jpg');?>"
                            alt="Water Boil Black Utensil" width="800" height="900">
                    </figure>
                </div>
                <div class="product-thumbs-wrap">
                    <div class="product-thumbs">
                        <div class="product-thumb active">
                            <img src="<?php echo base_url('assets/images/products/popup/1-103x116.jpg');?>" alt="Product Thumb" width="103"
                                height="116">
                        </div>
                        <div class="product-thumb">
                            <img src="<?php echo base_url('assets/images/products/popup/2-103x116.jpg');?>" alt="Product Thumb" width="103"
                                height="116">
                        </div>
                        <div class="product-thumb">
                            <img src="<?php echo base_url('assets/images/products/popup/3-103x116.jpg');?>" alt="Product Thumb" width="103"
                                height="116">
                        </div>
                        <div class="product-thumb">
                            <img src="<?php echo base_url('assets/images/products/popup/4-103x116.jpg');?>" alt="Product Thumb" width="103"
                                height="116">
                        </div>
                    </div>
                    <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                    <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-6 overflow-hidden p-relative">
            <div class="product-details scrollable pl-0">
                <h2 class="product-title">Electronics Black Wrist Watch</h2>
                <div class="product-bm-wrapper">
                    <figure class="brand">
                        <img src="<?php echo base_url('assets/images/products/brand/brand-1.jpg');?>" alt="Brand" width="102" height="48" />
                    </figure>
                    <div class="product-meta">
                        <div class="product-categories">
                            Category:
                            <span class="product-category"><a href="#">Electronics</a></span>
                        </div>
                        <div class="product-sku">
                            SKU: <span>MS46891340</span>
                        </div>
                    </div>
                </div>

                <hr class="product-divider">

                <div class="product-price">$40.00</div>

                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 80%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="#" class="rating-reviews">(3 Reviews)</a>
                </div>

                <div class="product-short-desc">
                    <ul class="list-type-check list-style-none">
                        <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                        <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                        <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                    </ul>
                </div>

                <hr class="product-divider">

                <div class="product-form product-variation-form product-color-swatch">
                    <label>Color:</label>
                    <div class="d-flex align-items-center product-variations">
                        <a href="#" class="color" style="background-color: #ffcc01"></a>
                        <a href="#" class="color" style="background-color: #ca6d00;"></a>
                        <a href="#" class="color" style="background-color: #1c93cb;"></a>
                        <a href="#" class="color" style="background-color: #ccc;"></a>
                        <a href="#" class="color" style="background-color: #333;"></a>
                    </div>
                </div>
                <div class="product-form product-variation-form product-size-swatch">
                    <label class="mb-1">Size:</label>
                    <div class="flex-wrap d-flex align-items-center product-variations">
                        <a href="#" class="size">Small</a>
                        <a href="#" class="size">Medium</a>
                        <a href="#" class="size">Large</a>
                        <a href="#" class="size">Extra Large</a>
                    </div>
                    <a href="#" class="product-variation-clean">Clean All</a>
                </div>

                <div class="product-variation-price">
                    <span></span>
                </div>

                <div class="product-form">
                    <div class="product-qty-form">
                        <div class="input-group">
                            <input class="quantity form-control" type="number" min="1" max="10000000">
                            <button class="quantity-plus w-icon-plus"></button>
                            <button class="quantity-minus w-icon-minus"></button>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cart">
                        <i class="w-icon-cart"></i>
                        <span>Add to Cart</span>
                    </button>
                </div>

                <div class="social-links-wrapper">
                    <div class="social-links">
                        <div class="social-icons social-no-color border-thin">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                            <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                            <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                        </div>
                    </div>
                    <span class="divider d-xs-show"></span>
                    <div class="product-link-wrapper d-flex">
                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                        <a href="#"
                            class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Quick view -->

<!-- Plugin JS File -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery.plugin/jquery.plugin.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/zoom/jquery.zoom.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/skrollr/skrollr.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/photoswipe/photoswipe.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/photoswipe/photoswipe-ui-default.js"></script>
 <!-- Script -->

<!-- Select2 JS -->
<script src="<?php echo base_url()?>assets/js/select2.full.js"></script>

<!-- Main JS -->
<script src="<?php echo base_url() ?>assets/js/main.js"></script>






<script>
$(document).ready(function(){
    var controllername='<?php echo $controllermenu; ?>';
    
    if(controllername=='welcome'){
        $('#topdropdown').addClass('show-dropdown');
    }
    showminicart();
});
function showminicart(){
    $.ajax({
        url: "<?php echo base_url('Cart/Showminicart');?>",
        method: "POST",
        data: {},
        success: function(data) { 
            $('#topmenucart').html(data);
            removecart();
        }
    });
}
function addtocart(productID, qty){
    $.ajax({
        url: "<?php echo base_url('Cart/Addtocart');?>",
        method: "POST",
        data: {
            productID: productID,
            qty: qty
        },
        success: function(data) { //alert(data);
            $('#topmenucart').html(data);
            removecart();
        }
    });
}
function removecart(){
    $('.removecartitem').click(function(e){
        e.preventDefault();

        var rowID = $(this).attr("id");
        
        $.ajax({
            url: "<?php echo base_url('Cart/Removeminicart');?>",
            method: "POST",
            data: {
                rowID: rowID
            },
            success: function(data) { 
                showminicart();
            }
        });
    });
}
</script>

   
    
    <script type='text/javascript'>
    $(document).ready(function(){

     // Initialize 
     $( "#listproduct" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?=base_url()?>Welcome/productList",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#listproduct').val(ui.item.label); // display the selected text
          return false;
        }
      });

    });
    </script>