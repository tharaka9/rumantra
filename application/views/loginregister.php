<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Register - Rumantra - By ERav Technology</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Wolmart eCommmerce Marketplace HTML Template">
    <meta name="author" content="D-THEMES">

    <?php include "include/headerscript1.php"; ?>
    <style>
        .vendor-widget-2:hover{border-color:#eee}
        .border-danger {border-color: #e81500 !important;}
    </style>
</head>

<body>
    <div class="page-wrapper">
        <?php include "include/menu1.php"; ?>
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Register</h1>
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
                        <li>Register</li>
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
                                        <form id="registerform" autocomplete="off">
                                            <div id="flashdata"></div>
                                            <div class="row gutter-sm">
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label>First Name *</label>
                                                        <input type="text" class="form-control text-dark" name="regfirst" id="regfirst"  autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label>Last Name *</label>
                                                        <input type="text" class="form-control text-dark" name="reglast" id="reglast" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutter-sm mb-3">
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label>Mobile *</label>
                                                        <input type="tel" class="form-control text-dark" name="regphone" id="regphone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" minlength="10" maxlength="10" >
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label>Refcode *</label>
                                                        <input type="text" class="form-control text-dark" name="regrefcode" id="regrefcode">                                                     
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Address *</label>
                                                <input type="text" class="form-control text-dark" name="regaddress" id="regaddress" >
                                            </div>
                                            <div class="row gutter-sm mb-3">
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label>City *</label>
                                                        <select class="form-control text-dark" name="regcity" id="regcity" >
                                                            <option value="">Select</option>
                                                            <?php foreach($citylist->result() as $rowcitylist){ ?>
                                                            <option value="<?php echo $rowcitylist->city ?>"><?php echo $rowcitylist->city ?></option>
                                                            <?php } ?>
                                                        </select>                                                     
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label>Country *</label>
                                                        <select class="form-control text-dark" name="regcountry" id="regcountry" >
                                                            <option value="">Select</option>
                                                            <?php foreach($countrylist->result() as $rowcountrylist){ ?>
                                                            <option value="<?php echo $rowcountrylist->idtbl_country ?>" <?php if($rowcountrylist->idtbl_country==210){echo 'selected';} ?>><?php echo $rowcountrylist->country ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Email address *</label>
                                                <input type="email" class="form-control text-dark" name="regemail" id="regemail" >
                                            </div>
                                            <div class="row gutter-sm mb-3">
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label>Password *</label>
                                                        <input type="password" class="form-control text-dark" name="regpassword" id="regpassword" >
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label>Enter Confirm Password *</label>
                                                        <input type="password" class="form-control text-dark" name="regrepassword" id="regrepassword" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutter-sm mb-3">
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label>Date Of Birth*</label>
                                                        <input type="date" class="form-control text-dark" name="regdob" id="regdob" >
                                                    </div>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label>NIC*</label>
                                                        <input type="text" class="form-control text-dark" name="regnic" id="regnic" minlength="10" maxlength="12" >
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Your personal data will be used to support your experience 
                                                throughout this website, to manage access to your account, 
                                                and for other purposes described in our <a href="#" class="text-primary">privacy policy</a>.</p>
                                            <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                                                <input type="checkbox" class="custom-checkbox" id="agree" name="agree" >
                                                <label for="agree" class="font-size-md">I agree to the <a  href="#" class="text-primary font-size-md">privacy policy</a></label>
                                            </div>
                                            <input type="submit" class="d-none" id="hidesubmit">
                                            <button type="button" id="submitbtn" class="btn btn-primary w-100">Sign Up</button>
                                        </form>
                                    </div>
                                </div>
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

    <script>
        $(document).ready(function(){
            $("#regcountry").select2();
            $("#regcity").select2();

            $("#regrepassword").keyup(checkPasswordMatch);

            $('#submitbtn').click(function(){
                if (!$("#registerform")[0].checkValidity()) {
                    // If the form is invalid, submit it. The form won't actually submit;
                    // this will just cause the browser to display the native HTML5 error messages.
                    $("#hidesubmit").click();
                } else { 
                    var niccheck=nicvalidation();
                    // alert(niccheck);

                    if(niccheck==true){
                        var regfirst = $('#regfirst').val();
                        var reglast = $('#reglast').val();
                        var regphone = $('#regphone').val();
                        var regemail = $('#regemail').val();
                        var regaddress = $('#regaddress').val();
                        var regcity = $('#regcity').val();
                        var regrefcode = $('#regrefcode').val();
                        var regpassword = $('#regpassword').val();
                        var regcountry = $('#regcountry').val();
                        var regdob = $('#regdob').val();
                        var regnic = $('#regnic').val();

                        $.ajax({
                            url: "<?php echo base_url('Loginregister/Signup');?>",
                            method: "POST",
                            data: {
                                regfirst:regfirst,
                                reglast:reglast,
                                regphone:regphone,
                                regemail:regemail,
                                regaddress:regaddress,
                                regcity:regcity,
                                regrefcode:regrefcode,
                                regpassword:regpassword,
                                regcountry:regcountry,
                                regdob:regdob,
                                regnic:regnic
                            },
                            success: function(data) {
                                var obj = JSON.parse(data);

                                if(obj.status==0){
                                    $('#flashdata').html('<div class="alert alert-danger alert-dismissible" role="alert">'+obj.msgstatus+'</div>');
                                }
                                else{
                                    // $('#modalloading').modal('show');
                                    var number = obj.mobilenum;
                                    var code = obj.msg;
                                    var lastID = obj.lastID;

                                    var url = '<?php echo base_url('Loginregister/Signupapprove/') ?>'+lastID;
                                    $.get('https://bulksms.hutch.lk/sendsmsmultimask.php?USER=Eravtechno&PWD=Ervtc@123&MASK=Rumantra&NUM=94'+number+'&MSG='+code);

                                    setTimeout(function() {
                                        location.replace(url);
                                    }, 3000);
                                }
                            }
                        });
                    }
                    else{
                         $('#flashdata').html('<div class="alert alert-danger alert-dismissible" role="alert">Insert valid NIC number or your NIC / DOB mismatch. PLease check and re enter correct data</div>');
                    }
                }
            });
        });
        function checkPasswordMatch() {
            var password = $("#regpassword").val();
            var confirmPassword = $("#regrepassword").val();
            if (password != confirmPassword){
                $("#regpassword").addClass('border-danger');
                $("#regrepassword").addClass('border-danger');
            }                
            else{
                $("#regpassword").removeClass('border-danger');
                $("#regrepassword").removeClass('border-danger');
            }   
        }

        function nicvalidation(e){
            var NICNo = $("#regnic").val();
            var Dob = $("#regdob").val();

            if (NICNo.length != 10 && NICNo.length != 12) {
                // $("#error").html("Invalid NIC NO");
                return false;
            } else if (NICNo.length == 10 && !$.isNumeric(NICNo.substr(0, 9))) {
                // $("#error").html("Invalid NIC NO");
                return false;
            }
            else {
                // Year
                if (NICNo.length == 10) {
                    year = "19" + NICNo.substr(0, 2);
                    dayText = parseInt(NICNo.substr(2, 3));
                } else {
                    year = NICNo.substr(0, 4);
                    dayText = parseInt(NICNo.substr(4, 3));
                }

                // Gender
                if (dayText > 500) {
                    gender = "Female";
                    dayText = dayText - 500;
                } else {
                    gender = "Male";
                }

                // Day Digit Validation
                if (dayText < 1 && dayText > 366) {
                    // $("#error").html("Invalid NIC NO");
                    return false;
                } else {

                    //Month
                    if (dayText > 335) {
                        day = dayText - 335;
                        month = "12";
                    }
                    else if (dayText > 305) {
                        day = dayText - 305;
                        month = "11";
                    }
                    else if (dayText > 274) {
                        day = dayText - 274;
                        month = "10";
                    }
                    else if (dayText > 244) {
                        day = dayText - 244;
                        month = "09";
                    }
                    else if (dayText > 213) {
                        day = dayText - 213;
                        month = "08";
                    }
                    else if (dayText > 182) {
                        day = dayText - 182;
                        month = "07";
                    }
                    else if (dayText > 152) {
                        day = dayText - 152;
                        month = "06";
                    }
                    else if (dayText > 121) {
                        day = dayText - 121;
                        month = "05";
                    }
                    else if (dayText > 91) {
                        day = dayText - 91;
                        month = "04";
                    }
                    else if (dayText > 60) {
                        day = dayText - 60;
                        month = "03";
                    }
                    else if (dayText < 32) {
                        month = "01";
                        day = dayText;
                    }
                    else if (dayText > 31) {
                        day = dayText - 31;
                        month = "02";
                    }

                    if(day<10){day='0'+day;}
                    
                    var createdob=year+'-'+month+'-'+day;

                    // console.log(createdob);
                    // console.log(Dob);
                    
                    if(createdob==Dob){
                        return true;
                    }
                    else{   
                        return false;
                    }
                    // console.log(createdob);
                    // if(Dob)
                }
            }
        }
    </script>
</body>

</html>