<?php 

$rejectcontent=[" ", "(", ")", "&", "'", ","]; 

$replaceword=["", "", "", "", "`", ""]; 

?>

<!-- Start of Header -->

<header class="header header-border">

    <div class="header-top">

        <div class="container">

            <div class="header-left">

                <p class="welcome-msg">Welcome to Rumantra</p>

            </div>

            <div class="header-right pr-0">

                <div class="dropdown">

                    <a href="#currency">LKR</a>

                    <div class="dropdown-box">

                        <a href="#LKR">LKR</a>

                    </div>

                </div>

                <!-- End of DropDown Menu -->

                <span class="divider d-lg-show"></span>

                <a href="<?php if(!empty($_SESSION['user_id'])){echo base_url().'Loginregister/Account'; }else{echo base_url().'Loginregister/Account';} ?>"

                    class="d-lg-show">My Account</a>

                <?php if(!empty($_SESSION['user_id'])){ ?>

                <a href="#" class="d-lg-show">

                    <div class="dropdown">

                        <i class="w-icon-account"></i>

                        <?php echo $_SESSION['accountname'] ?>

                        <div class="dropdown-box">

                            <a href="<?php echo base_url().'Loginregister/Logout' ?>">Logout</a>

                        </div>

                    </div>

                </a>

                <?php }else{ ?>

                <a href="<?php echo base_url().'Loginregister/Login'; ?>" class="d-lg-show login"><i

                        class="w-icon-account"></i>Sign In</a>

                <span class="delimiter d-lg-show">/</span>

                <a href="<?php echo base_url().'Loginregister/Register'; ?>" class="ml-0 d-lg-show login">Register</a>

                <?php } ?>

            </div>

        </div>

    </div>

    <!-- End of Header Top -->







    <div class="header-middle">

        <div class="container">

            <div class="header-left mr-md-4">

                <a href="#" class="mobile-menu-toggle  w-icon-hamburger">

                </a>

                <a href="<?php echo base_url() ?>" class="logo ml-lg-0">

                    <img src="<?php echo base_url('images/logo.png');?>" alt="logo" />

                </a>

                <form method="get" action="#" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">

                    <div class="select-box">

                        <select id="category" name="category">

                            <?php foreach ($productcategory as $row) { ?>

                            <option value="<?php echo $row->idtbl_product_category;?>">

                                <?php echo $row->product_category;?></option>



                            <?php }?>





                        </select>

                    </div>

                    <input type="text" class="form-control" name="search" id="search" placeholder="Search in..."

                        required />

                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>

                    </button>

                </form>

            </div>

            <div class="header-right ml-4">

                <div class="header-call d-xs-show d-lg-flex align-items-center">

                    <a href="tel:#" class="w-icon-call"></a>

                    <div class="call-info d-lg-show">

                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">

                            <a href="mailto:#" class="text-capitalize">Call Us Now</a> :</h4>

                        <a href="tel:#" class="phone-number font-weight-bolder ls-50">070 728 3848</a>

                    </div>

                </div>

                <div class="dropdown cart-dropdown mr-0 mr-lg-2" id="topmenucart">

                    <div class="dropdown-box">

                        <div class="products">

                            <div class="product product-cart">

                                <div class="product-detail">

                                    <a href="product-default.html" class="product-name">Beige knitted

                                        elas<br>tic

                                        runner shoes</a>

                                    <div class="price-box">

                                        <span class="product-quantity">1</span>

                                        <span class="product-price">$25.68</span>

                                    </div>

                                </div>

                                <figure class="product-media">

                                    <a href="product-default.html">

                                        <img src="assets/images/cart/product-1.jpg" alt="product" height="84"

                                            width="94" />

                                    </a>

                                </figure>

                                <button class="btn btn-link btn-close">

                                    <i class="fas fa-times"></i>

                                </button>

                            </div>



                            <div class="product product-cart">

                                <div class="product-detail">

                                    <a href="product-default.html" class="product-name">Blue utility

                                        pina<br>fore

                                        denim dress</a>

                                    <div class="price-box">

                                        <span class="product-quantity">1</span>

                                        <span class="product-price">$32.99</span>

                                    </div>

                                </div>

                                <figure class="product-media">

                                    <a href="product-default.html">

                                        <img src="assets/images/cart/product-2.jpg" alt="product" width="84"

                                            height="94" />

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

                    </div>

                    <!-- End of Dropdown Box -->

                </div>

            </div>

        </div>

    </div>

    <!-- End of Header Middle -->



    <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">

        <div class="container">

            <div class="inner-wrap">

                <div class="header-left">

                    <div class="dropdown category-dropdown has-border" data-visible="true">

                        <a href="#" class=" category-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"

                            aria-expanded="true" data-display="static" title="Browse Categories">

                            <i class="w-icon-category"></i>

                            <span>Browse Categories</span>

                        </a>



                        <div class="dropdown-box">



                            <ul class="menu vertical-menu category-menu">

                                <?php foreach ($productcategory as $key => $row): ?>

                                <li>



                                    <a

                                        href="<?php echo base_url().'product/productlist/'.$row->idtbl_product_category.'/'.$row->product_category ?>">

                                        <i class="w-icon-tshirt2"></i><?php echo $row->product_category ;?>

                                    </a>







                                </li>

                                <?php endforeach; ?>

                            </ul>



                        </div>

                    </div>





                    <nav class="main-nav">

                        <ul class="menu active-underline">



                            <li class="<?php

                                           if ($this->uri->uri_string() == '') {

                                           echo "active";

                                           }

                                           ?>"><a href="<?php echo base_url('/'); ?>">Home</a>

                            </li>



                            <li class="<?php

                                           if ($this->uri->uri_string() == 'shop') {

                                           echo "active";

                                           }

                                           ?>"><a href="">Shop</a>

                                <ul>

                                    <?php foreach ($productcategory as $row) { ?>

                                    <li>

                                        <a

                                            href="<?php echo base_url().'product/productlist/'.$row->idtbl_product_category.'/'.$row->product_category ?>"><?php echo $row->product_category ?></a>

                                    </li>

                                    <?php }?>

                                </ul>

                            </li>





                            <li class="<?php

                                           if ($this->uri->uri_string() == 'other/contactus') {

                                           echo "active";

                                           }

                                           ?>"><a href="<?php echo base_url('other/contactus');?>">Contact</a>

                            </li>



                            <li class="<?php

                                           if ($this->uri->uri_string() == 'other/aboutus') {

                                           echo "active";

                                           }

                                           ?>"><a href="<?php echo base_url('other/aboutus');?>">About</a>

                            </li>

                            </li>

                        </ul>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</header>