<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Checkout - Rumantra - By ERav Technology</title>

    <?php include "include/headerscript1.php"; ?>
</head>

<body>
    <div class="page-wrapper">
        <?php include "include/menu1.php"; ?>

        <!-- Start of Main -->
        <main class="main checkout">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="passed"><a href="<?php echo base_url().'Cart' ?>">Shopping Cart</a></li>
                        <li class="active"><a href="<?php echo base_url().'Cart/Checkout' ?>">Checkout</a></li>
                        <li><a href="#">Order Complete</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->


            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <?php if(empty($_SESSION['user_id'])){ ?>
                    <div class="login-toggle">
                        Returning customer? <a href="#"
                            class="show-login font-weight-bold text-uppercase text-dark">Login</a>
                    </div>
                    <form class="login-content">
                        <p>If you have shopped with us before, please enter your details below. 
                            If you are a new customer, please proceed to the Billing section.</p>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Username or email *</label>
                                    <input type="text" class="form-control form-control-md text-dark" name="name"
                                        required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="text" class="form-control form-control-md text-dark" name="password"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group checkbox">
                            <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                            <label for="remember" class="mb-0 lh-2">Remember me</label>
                            <a href="#" class="ml-3">Last your password?</a>
                        </div>
                        <button class="btn btn-rounded btn-login">Login</button>
                    </form>
                    <?php } ?>
                    <!-- <div class="coupon-toggle">
                        Have a coupon? <a href="#"
                            class="show-coupon font-weight-bold text-uppercase text-dark">Enter your
                            code</a>
                    </div>
                    <div class="coupon-content mb-4">
                        <p>If you have a coupon code, please apply it below.</p>
                        <div class="input-wrapper-inline">
                            <input type="text" name="coupon_code" class="form-control form-control-md text-dark mr-1 mb-2" placeholder="Coupon code" id="coupon_code">
                            <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon" value="Apply coupon">Apply Coupon</button>
                        </div>
                    </div> -->

                    <form class="form checkout-form" action="<?php echo base_url() ?>Cart/Checkpayment" method="post">
                        <div class="row mb-9">
                            <div class="col-lg-7 pr-lg-4 mb-4">
                                <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                                    Billing Details
                                </h3>
                                <div class="row gutter-sm">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>First name *</label>
                                            <input type="text" class="form-control form-control-md text-dark bg-grey" name="firstname" value="<?php if(!empty($profileinfo->profileinfo[0]->firstname)){echo $profileinfo->profileinfo[0]->firstname;} ?>" readonly required>
                                        </div>

                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Last name *</label>
                                            <input type="text" class="form-control form-control-md text-dark bg-grey" name="lastname" value="<?php if(!empty($profileinfo->profileinfo[0]->lastname)){echo $profileinfo->profileinfo[0]->lastname;} ?>" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address *</label>
                                    <input type="text" placeholder="House number and street name" class="form-control form-control-md text-dark mb-2 <?php if(!empty($profileinfo->profileinfo[0]->address)){echo 'bg-grey';} ?>" name="streetaddress1" value="<?php if(!empty($profileinfo->profileinfo[0]->address)){echo $profileinfo->profileinfo[0]->address;} ?>" <?php if(!empty($profileinfo->profileinfo[0]->address1)){echo 'readonly';} ?> required>
                                    
                                </div>
                                <div class="row gutter-sm">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Town / City *</label>
                                            <input type="text" class="form-control form-control-md text-dark <?php if(!empty($profileinfo->profileinfo[0]->city)){echo 'bg-grey';} ?>" list="citylist" name="town" value="<?php if(!empty($profileinfo->profileinfo[0]->city)){echo $profileinfo->profileinfo[0]->city;} ?>" <?php if(!empty($profileinfo->profileinfo[0]->city)){echo 'readonly';} ?> required>
                                            <datalist id="citylist">
                                                <?php foreach($citylist->result() as $rowcitylist){ ?>
                                                <option value="<?php echo $rowcitylist->city; ?>">
                                                <?php } ?>
                                            </datalist>
                                        </div>
                                        <div class="form-group">
                                            <label>Email address *</label>
                                            <input type="email" class="form-control form-control-md text-dark bg-grey" value="<?php if(!empty($profileinfo->profileinfo[0]->email)){echo $profileinfo->profileinfo[0]->email;} ?>" name="email" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group d-none">
                                            <label>ZIP *</label>
                                            <input type="text" class="form-control form-control-md text-dark <?php if(!empty($profileinfo->profileinfo[0]->postalcode)){echo 'bg-grey';} ?>" value="<?php if(!empty($profileinfo->profileinfo[0]->postalcode)){echo $profileinfo->profileinfo[0]->postalcode;} ?>" name="zipcode" <?php if(!empty($profileinfo->profileinfo[0]->postalcode)){echo 'readonly';} ?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone *</label>
                                            <input type="text" class="form-control form-control-md text-dark bg-grey" name="phone" value="<?php if(!empty($profileinfo->profileinfo[0]->phone)){echo $profileinfo->profileinfo[0]->phone;} ?>" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group checkbox-toggle pb-2">
                                    <input type="checkbox" class="custom-checkbox" id="shipping-toggle"
                                        name="shipping-toggle">
                                    <label for="shipping-toggle">Ship to a different address?</label>
                                </div>
                                <div class="checkbox-content">
                                    <div class="row gutter-sm">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label>First name *</label>
                                                <input type="text" class="form-control form-control-md text-dark" name="firstnamedrop" id="firstnamedrop" >
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label>Last name *</label>
                                                <input type="text" class="form-control form-control-md text-dark" name="lastnamedrop" id="lastnamedrop">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Street address *</label>
                                        <input type="text" placeholder="" class="form-control form-control-md text-dark mb-2" name="streetaddress1drop" id="streetaddress1drop">
                                        <input type="text" placeholder="" class="form-control form-control-md text-dark" name="streetaddress2drop" id="streetaddress2drop">
                                    </div>
                                    <div class="row gutter-sm">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Town / City *</label>
                                                <input type="text" class="form-control form-control-md text-dark" list="citylistopt" name="citydrop">
                                                <datalist id="citylistopt">
                                                    <?php foreach($citylist->result() as $rowcitylist){ ?>
                                                    <option value="<?php echo $rowcitylist->city; ?>">
                                                    <?php } ?>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row gutter-sm">
                                        <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Phone *</label>
                                            <input type="text" class="form-control form-control-md text-dark"  name="phoneother" id="phone">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                            <label>Other Phone *</label>
                                            <input type="text" class="form-control form-control-md text-dark"  name="phone2" id="phone2">
                                            </div>
                                        </div>
                                    </div>




                                </div>


                                <div class="col-md-6">
                                            <label>Order discount for</label><br>
                                            <div class="custom-control custom-radio custom-control-inline mt-2">
                                                <input type="radio" id="deliverydiscount1"
                                                    name="deliverydiscount" class="custom-control-input" value="1">
                                                <label class="custom-control-label"
                                                    for="deliverydiscount1">Add to your account</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="deliverydiscount2"
                                                    name="deliverydiscount" class="custom-control-input" value="0">
                                                <label class="custom-control-label"
                                                    for="deliverydiscount2">Add to send customer</label>
                                            </div>
                                    </div>

                                <div class="form-group mt-3">
                                    <label for="order-notes">Order notes (optional)</label>
                                    <textarea class="form-control mb-0" id="ordernotes" name="ordernotes" cols="30"
                                        rows="4"
                                        placeholder="Notes about your order, e.g special notes for delivery"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                                <div class="order-summary-wrapper sticky-sidebar">
                                    <h3 class="title text-uppercase ls-10">Your Order</h3>
                                    <div class="order-summary">
                                        <table class="order-table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">
                                                        <b>Product</b>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($this->cart->contents() as $rowshopcart){ ?>
                                                <tr class="bb-no">
                                                    <td class="product-name"><?php echo $rowshopcart['name'] ?> <i class="fas fa-times"></i> <span class="product-quantity"><?php echo $rowshopcart['qty'] ?></span></td>
                                                    <td class="product-total">Rs <?php echo $rowshopcart['price'] ?></td>
                                                </tr>
                                                <?php } ?>
                                                <tr class="cart-subtotal bb-no">
                                                    <td><b>Subtotal</b></td>
                                                    <td><b>Rs <?php echo $this->cart->format_number($this->cart->total()) ?></b></td>
                                                </tr>
                                                <tr class="cart-subtotal bb-no">
                                                    <td><b>Discount</b></td>
                                                    <td id="discounttd"><b>Rs (<?php echo $this->cart->format_number(($this->cart->total()*25)/100) ?>)</b></td>
                                                </tr>
                                                <tr class="cart-subtotal" id="shiptd">
                                                    <td><b>Ship Cost</b></td>
                                                 
                                                    <?php if ($this->cart->total() < 4500){ ?>
                                                    <td>Rs.250</td>  
                                                    <?php }else{ ?>
                                                    <td>Rs. 0</td>
                                                    <?php } ?>
                                                    <!-- <td><b>Rs 250.00</b></td> -->
                                                   
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <!-- <tr class="shipping-methods">
                                                    <td colspan="2" class="text-left">
                                                        <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                                        </h4>
                                                        <ul id="shipping-method" class="mb-4">
                                                            <li>
                                                                <div class="custom-radio">
                                                                    <input type="radio" id="free-shipping"
                                                                        class="custom-control-input" name="shipping">
                                                                    <label for="free-shipping"
                                                                        class="custom-control-label color-dark">Free
                                                                        Shipping</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="custom-radio">
                                                                    <input type="radio" id="local-pickup"
                                                                        class="custom-control-input" name="shipping">
                                                                    <label for="local-pickup"
                                                                        class="custom-control-label color-dark">Local
                                                                        Pickup</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="custom-radio">
                                                                    <input type="radio" id="flat-rate"
                                                                        class="custom-control-input" name="shipping">
                                                                    <label for="flat-rate"
                                                                        class="custom-control-label color-dark">Flat
                                                                        rate: $5.00</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr> -->
                                                <tr class="order-total">
                                                    <th>
                                                        <b>Total</b>
                                                    </th>
                                                    <td id="nettotaltd">
                                                    <?php if ($this->cart->total() < 4500){ ?>
                                                    <b>Rs <?php echo $this->cart->format_number($this->cart->total()-$this->cart->total()*25/100+250)?></b>
                                                    <?php }else{ ?>
                                                    <b>Rs <?php echo $this->cart->format_number($this->cart->total()-$this->cart->total()*25/100)?></b>
                                                    <?php } ?>
                                                    
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <div class="payment-methods" id="payment_method">
                                            <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                            <div class="accordion payment-accordion">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a href="#cashbank" class="collapse">Credit / Debit</a>
                                                    </div>
                                                    <div id="cashbank" class="card-body expanded">
                                                        <p class="mb-0">
                                                            Make your payment directly into our bank account. 
                                                            Please use your Order ID as the payment reference. 
                                                            Your order will not be shipped until the funds have cleared in our account.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <a href="#delivery" class="expand">Cash on delivery</a>
                                                    </div>
                                                    <div id="delivery" class="card-body collapsed">
                                                        <p class="mb-0">
                                                            Pay with cash upon delivery.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group place-order pt-6">
                                            <?php if(!empty($_SESSION['user_id'])){ ?>
                                            <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hidden Field Start -->
                        <input type="hidden" name="paymenttype" id="paymenttype" value="1">
                        <!-- Hidden Field End -->
                    </form>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->

        <?php include "include/footercontent.php"; ?>
    </div>
    <!-- End of Page Wrapper -->

    <?php include "include/footerscript.php"; ?>
    <script>

        var carttotal=parseFloat(<?php echo $this->cart->total(); ?>);

        <?php if ($this->cart->total() < 4500){ ?>
            var shipcost=parseFloat(250);
        <?php }else{ ?>
            var shipcost=parseFloat(0);
        <?php } ?>
           

        $(document).ready(function(){
            $('a[href="#cashbank"]').click(function(){
                $('#paymenttype').val('1');
            }); 
            $('a[href="#delivery"]').click(function(){
                $('#paymenttype').val('0');
            }); 






            $("#shipping-toggle").change(function() {//alert('IN');
                if(this.checked) {
                    $('#firstnamedrop').prop('required',true);
                    $('#lastnamedrop').prop('required',true);
                    $('#streetaddress1drop').prop('required',true);
                    $('#citydrop').prop('required',true);
                    $('#phone').prop('required',true);
                    $('#phone2').prop('required',true);
                }
                else{
                    $('#firstnamedrop').prop('required',false);
                    $('#lastnamedrop').prop('required',false);
                    $('#streetaddress1drop').prop('required',false);
                    $('#citydrop').prop('required',true);
                    $('#phone').prop('required',true);
                    $('#phone2').prop('required',true);
                }
            });

            $('input[type=radio][name=deliverydiscount]').change(function() {
                if (this.value == '1') {
                    $('#discounttd').html('<b>Rs (0.00)</b>');
                    var nettotal = addCommas(parseFloat(carttotal+shipcost).toFixed(2));
                    $('#nettotaltd').html('<b>Rs '+nettotal+'</b>');                    
                }
                else{
                    var discount=addCommas(parseFloat((carttotal)*25/100).toFixed(2));
                    $('#discounttd').html('<b>Rs '+discount+'</b>');
                    var discount2 = carttotal*25/100;
                    var nettotal = addCommas(parseFloat((carttotal+shipcost)-discount2).toFixed(2));
                    console.log(nettotal);
                    $('#nettotaltd').html('<b>Rs '+nettotal+'</b>');
                }
            });
        });

        function addCommas(nStr){
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
</body>

</html>