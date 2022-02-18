<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

	<title>My Account - Rumantra - By ERav Technology</title>

	<?php include "include/headerscript.php"; ?>

    <style>


 :root {
            --color1: #FD8F33;
            --color2: #0DC8AB;
            --color3: #05B0DE;
            --color4: #8E7CCC;
        }

        .main-timeline {
            font-family: 'Source Sans Pro', sans-serif;
            position: relative;
        }

        .main-timeline:after {
            content: '';
            display: block;
            clear: both;
        }

        .main-timeline .timeline {
            width: 50.1%;
            padding: 20px 0 20px 100px;
            float: right;
            position: relative;
            z-index: 1;
        }

        .main-timeline .timeline:before,
        .main-timeline .timeline:after {
            content: '';
            background: var(--color1);
            height: 100%;
            width: 28px;
            position: absolute;
            left: -11px;
            top: 0;
        }

        .main-timeline .timeline:after {
            background: var(--color1);
            height: 18px;
            width: 200px;
            box-shadow: 0 0 10px -5px #000;
            transform: translateY(-50%);
            top: 50%;
            left: -90px;
        }

        .main-timeline .timeline-content {
            color: #517d82;
            background-color: var(--color1);
            padding: 0 0 0 80px;
            box-shadow: 0 0 20px -10px #000;
            border-radius: 10px;
            display: block;
        }

        .main-timeline .timeline-content:hover {
            color: #517d82;
            text-decoration: none;
        }

        .main-timeline .timeline-icon {
            color: #fff;
            background-color: var(--color1);
            font-size: 35px;
            text-align: center;
            line-height: 62px;
            height: 60px;
            width: 60px;
            border-radius: 50%;
            transform: translateY(-50%);
            position: absolute;
            left: -100px;
            top: 50%;
            z-index: 1;
        }

        .main-timeline .timeline-year {
            color: #517d82;
            background-color: #fff;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            line-height: 93px;
            height: 113px;
            width: 113px;
            border: 6px solid var(--color1);
            box-shadow: 0 0 10px -5px #000;
            border-radius: 50%;
            transform: translateY(-50%);
            position: absolute;
            left: 50px;
            top: 50%;
            z-index: 1;
        }

        .main-timeline .inner-content {
            background-color: #fff;
            padding: 10px;
        }

        .main-timeline .title {
            color: var(--color1);
            font-size: 22px;
            font-weight: 600;
            margin: 0 0 5px 0;
        }

        .main-timeline .description {
            font-size: 14px;
            letter-spacing: 1px;
            margin: 0;
        }

        .main-timeline .timeline:nth-child(even) {
            padding: 20px 100px 20px 0;
            float: left;
        }

        .main-timeline .timeline:nth-child(even):before {
            left: auto;
            right: -14.5px;
        }

        .main-timeline .timeline:nth-child(even):after {
            left: auto;
            right: -90px;
        }

        .main-timeline .timeline:nth-child(even) .timeline-content {
            padding: 0 80px 0 0;
        }

        .main-timeline .timeline:nth-child(even) .timeline-icon {
            left: auto;
            right: -100px;
        }

        .main-timeline .timeline:nth-child(even) .timeline-year {
            left: auto;
            right: 50px;
        }

        .main-timeline .timeline:nth-child(4n+2):before,
        .main-timeline .timeline:nth-child(4n+2):after {
            background: var(--color2);
        }

        .main-timeline .timeline:nth-child(4n+2) .timeline-content,
        .main-timeline .timeline:nth-child(4n+2) .timeline-icon {
            background-color: var(--color2);
        }

        .main-timeline .timeline:nth-child(4n+2) .timeline-year {
            border-color: var(--color2);
        }

        .main-timeline .timeline:nth-child(4n+2) .title {
            color: var(--color2);
        }

        .main-timeline .timeline:nth-child(4n+3):before,
        .main-timeline .timeline:nth-child(4n+3):after {
            background: var(--color3);
        }

        .main-timeline .timeline:nth-child(4n+3) .timeline-content,
        .main-timeline .timeline:nth-child(4n+3) .timeline-icon {
            background-color: var(--color3);
        }

        .main-timeline .timeline:nth-child(4n+3) .timeline-year {
            border-color: var(--color3);
        }

        .main-timeline .timeline:nth-child(4n+3) .title {
            color: var(--color3);
        }

        .main-timeline .timeline:nth-child(4n+4):before,
        .main-timeline .timeline:nth-child(4n+4):after {
            background: var(--color4);
        }

        .main-timeline .timeline:nth-child(4n+4) .timeline-content,
        .main-timeline .timeline:nth-child(4n+4) .timeline-icon {
            background-color: var(--color4);
        }

        .main-timeline .timeline:nth-child(4n+4) .timeline-year {
            border-color: var(--color4);
        }

        .main-timeline .timeline:nth-child(4n+4) .title {
            color: var(--color4);
        }

        @media only screen and (max-width:1200px) {
            .main-timeline .timeline:before {
                left: -12.5px;
            }

            .main-timeline .timeline:nth-child(even):before {
                right: -14px;
            }
        }

        @media only screen and (max-width:990px) {
            .main-timeline .timeline:before {
                left: -12.5px;
            }
        }

        @media only screen and (max-width:767px) {

            .main-timeline .timeline,
            .main-timeline .timeline:nth-child(even) {
                width: 100%;
                padding: 20px 0 20px 37px;
            }

            .main-timeline .timeline:before {
                left: 0;
            }

            .main-timeline .timeline:nth-child(even):before {
                right: auto;
                left: 0;
            }

            .main-timeline .timeline:after,
            .main-timeline .timeline:nth-child(even) .timeline:after {
                display: none;
            }

            .main-timeline .timeline-icon,
            .main-timeline .timeline:nth-child(even) .timeline-icon {
                left: 0;
                display: none;
            }

            .main-timeline .timeline-year,
            .main-timeline .timeline:nth-child(even) .timeline-year {
                height: 75px;
                width: 75px;
                line-height: 30px;
                font-size: 15px;
                left: 1px;
            }

            .main-timeline .timeline-content,
            .main-timeline .timeline:nth-child(even) .timeline-content {
                padding: 0 0 0 40px;
            }
        }
        .pointer{
            cursor: pointer;
        }
    </style>

</head>

<body class="my-account">
	<div class="page-wrapper">
		<?php include "include/menu.php"; ?>

		<!-- Start of Main -->
		<main class="main">
			<!-- Start of Page Header -->
			<div class="page-header">
				<div class="container">
					<h1 class="page-title mb-0">My Account</h1>
				</div>
			</div>
			<!-- End of Page Header -->

			<!-- Start of Breadcrumb -->
			<nav class="breadcrumb-nav">
				<div class="container">
					<ul class="breadcrumb">
						<li><a href="demo1.html">Home</a></li>
						<li>My account</li>
					</ul>
				</div>
			</nav>
			<!-- End of Breadcrumb -->
			<?php //print_r($profileinfo); ?>
			<!-- Start of PageContent -->
			<div class="page-content pt-2">
				<div class="container">
					<div class="tab tab-vertical row gutter-lg">
						<ul class="nav nav-tabs mb-6" role="tablist">
							<li class="nav-item">
								<a href="#account-dashboard" class="nav-link active">Dashboard</a>
							</li>
							<li class="nav-item">
								<a href="#account-orders" class="nav-link">Orders</a>
							</li>
							<li class="nav-item">
								<a href="#account-addresses" class="nav-link">Addresses</a>
							</li>
							<li class="nav-item">
								<a href="#account-details" class="nav-link">Account details</a>
							</li>
                            <li class="nav-item">
                                <a href="#view-commission" class="nav-link">View Commission</a>
                            </li>
							<li class="nav-item">
								<a href="#member" class="nav-link">Your Members</a>
							</li>
							<li class="link-item">
								<a href="<?php echo base_url().'Loginregister/Logout' ?>">Logout</a>
							</li>
						</ul>

						<div class="tab-content mb-6">
							<div class="tab-pane active in" id="account-dashboard">
								<?php //print_r($profileinfo); ?>
								<p class="greeting">
									Hello
									<span
										class="text-dark font-weight-bold"><?php echo $_SESSION['accountname'] ?></span>
									(not
									<span
										class="text-dark font-weight-bold"><?php echo $_SESSION['accountname'] ?></span>?
									<a href="<?php echo base_url().'Loginregister/Logout' ?>" class="text-primary">Log
										out</a>)
								</p>

								<p class="mb-4">
									From your account dashboard you can view your <a href="#account-orders"
										class="text-primary link-to-tab">recent orders</a>,
									manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
										and billing
										addresses</a>, and
									<a href="#account-details" class="text-primary link-to-tab">edit your password and
										account details.</a>
								</p>

								<div class="row">
									<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
										<a href="#account-orders" class="link-to-tab">
											<div class="icon-box text-center">
												<span class="icon-box-icon icon-orders">
													<i class="w-icon-orders"></i>
												</span>
												<div class="icon-box-content">
													<p class="text-uppercase mb-0">Orders</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
										<a href="#account-addresses" class="link-to-tab">
											<div class="icon-box text-center">
												<span class="icon-box-icon icon-address">
													<i class="w-icon-map-marker"></i>
												</span>
												<div class="icon-box-content">
													<p class="text-uppercase mb-0">Addresses</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
										<a href="#account-details" class="link-to-tab">
											<div class="icon-box text-center">
												<span class="icon-box-icon icon-account">
													<i class="w-icon-user"></i>
												</span>
												<div class="icon-box-content">
													<p class="text-uppercase mb-0">Account Details</p>
												</div>
											</div>
										</a>
									</div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#view-commission" class="link-to-tab">
                                            <div class="icon-box text-center">
												<span class="icon-box-icon icon-account">
													<i class="w-icon-money"></i>
												</span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">View Commission</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
									<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
										<a href="#member" class="link-to-tab">
											<div class="icon-box text-center">
												<span class="icon-box-icon icon-account">
													<i class="w-icon-user"></i>
												</span>
												<div class="icon-box-content">
													<p class="text-uppercase mb-0">Your Members</p>
												</div>
											</div>
										</a>
									</div>
									<div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
										<a href="#">
											<div class="icon-box text-center">
												<span class="icon-box-icon icon-logout">
													<i class="w-icon-logout"></i>
												</span>
												<div class="icon-box-content">
													<p class="text-uppercase mb-0">Logout</p>
												</div>
											</div>
										</a>
									</div>
								</div>
								<!-- Button trigger modal -->
							</div>

							<div class="tab-pane mb-4" id="account-orders">
								<div class="icon-box icon-box-side icon-box-light">
									<span class="icon-box-icon icon-orders">
										<i class="w-icon-orders"></i>
									</span>
									<div class="icon-box-content">
										<h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
									</div>
								</div>

								<table class="shop-table account-orders-table mb-6" id="ordertable">
									<thead>
										<tr>
											<th class="order-id">Order</th>
											<th class="order-date">Date</th>
											<th class="order-status">Status</th>
											<th class="order-total">Total</th>
											<th class="order-actions">Actions</th>
                                                <th>Cancel</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($customerorder->result() as $rowcustomerorder){ ?>
										<tr>
											<td class="order-id">#<?php echo $rowcustomerorder->idtbl_order ?></td>
											<td class="order-date"><?php echo date("F j, Y", strtotime($rowcustomerorder->orderdate)); ?></td>
											<td class="order-status"><?php if($rowcustomerorder->callstatus==1){echo '<a id="popoverData" class="text-primary" href="#" data-content="ඔබගෙන් ඇණැවුම් කල පාරිභෝගිකයා දුරකතනයට ප්‍රතිචාර නොදක්වන බැවින් , ඈණවුම හර්බ්ලයින් ආයතනයේ රදවාගෙන ඇත.එය යැවීමට අවශ්‍ය නම් තහවුරු කර 0769909994 ට ඇනවුම් අංකය සමග sms කරන්න" rel="popover" data-placement="bottom" data-original-title="දැන්වීම" data-trigger="hover">Cutomer Not Answer</a>';} else if($rowcustomerorder->deliverystatus==1){echo '<span class="success">Completed</span>';}else if($rowcustomerorder->status==2){echo '<span class="text-danger">Order Cancel</span>';}else{echo 'Processing';} ?></td>
											<td class="order-total">
												<span class="order-price"><?php echo number_format($rowcustomerorder->nettotal, 2) ?></span>
											</td>
											<td class="order-action">
                                                <button type="button" class="btn btn-outline btn-default btn-block btn-sm btn-rounded btn-quickview btnpopupview" data-id="<?php echo $rowcustomerorder->idtbl_order; ?>">View</button>
											</td>
											<td class="order-action"><?php if($rowcustomerorder->status==1){if($rowcustomerorder->acceptstatus==0){ ?><button class="btn btn-outline btn-default btn-block btn-sm btn-rounded btncancel" id="<?php echo $rowcustomerorder->idtbl_order ?>"><i class="icon-close"></i> Cancel</button><?php }else{echo '<span class="text-success"><i class="icon-check"></i> Accepted</span>';}} ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>

								<a href="<?php echo base_url().'Shop' ?>" class="btn btn-dark btn-rounded btn-icon-right">Go
									Shop<i class="w-icon-long-arrow-right"></i></a>
							</div>

							<div class="tab-pane" id="account-addresses">
								<div class="icon-box icon-box-side icon-box-light">
									<span class="icon-box-icon icon-map-marker">
										<i class="w-icon-map-marker"></i>
									</span>
									<div class="icon-box-content">
										<h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
									</div>
								</div>
								<p>The following addresses will be used on the checkout page
									by default.</p>
								<div class="row">
									<div class="col-sm-6 mb-6">
										<div class="ecommerce-address billing-address pr-lg-8">
											<h4 class="title title-underline ls-25 font-weight-bold">Billing Address
											</h4>
											<address class="mb-4">
												<p><strong><?php if($this->session->userdata('loggedin')==1){echo $customerprofile->row(0)->firstname.' '.$customerprofile->row(0)->lastname; } ?></strong></p>
												<?php if($this->session->userdata('loggedin')==1){echo $customerprofile->row(0)->address.'<br>'.$customerprofile->row(0)->city; } ?>
											</address>
										</div>
									</div>
									<div class="col-sm-6 mb-6">
										<div class="ecommerce-address shipping-address pr-lg-8">
											<h4 class="title title-underline ls-25 font-weight-bold">Shipping Address
											</h4>
											<address class="mb-4">
												<address class="mb-4">
												<p><strong><?php if($this->session->userdata('loggedin')==1){echo $customerprofile->row(0)->firstname.' '.$customerprofile->row(0)->lastname; } ?></strong></p>
												<?php if($this->session->userdata('loggedin')==1){echo $customerprofile->row(0)->address.'<br>'.$customerprofile->row(0)->city; } ?>
											</address>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="account-details">
								<div class="icon-box icon-box-side icon-box-light">
									<span class="icon-box-icon icon-account mr-2">
										<i class="w-icon-user"></i>
									</span>
									<div class="icon-box-content">
										<h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
									</div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">Name</div>
									<div class="col-10"><?php echo $customerprofile->row(0)->firstname.' '.$customerprofile->row(0)->lastname; ?></div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">Phone</div>
									<div class="col-10"><?php echo $customerprofile->row(0)->phone; ?></div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">Email</div>
									<div class="col-10"><?php echo $customerprofile->row(0)->email; ?></div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">Address</div>
									<div class="col-10"><?php echo $customerprofile->row(0)->address; ?></div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">City</div>
									<div class="col-10"><?php echo $customerprofile->row(0)->city; ?></div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">Ref Code</div>
									<div class="col-2"><?php echo $customerprofile->row(0)->refcode; ?></div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">Date of birth</div>
									<div class="col-2"><?php echo $customerprofile->row(0)->dob; ?></div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">NIC</div>
									<div class="col-2"><?php echo $customerprofile->row(0)->nicno; ?></div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">Bank</div>
									<div class="col-10"><?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->bank.' - '.$customerprofilebank->row(0)->bankcode;} ?></div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">Branch</div>
									<div class="col-10"><?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->branch.' - '.$customerprofilebank->row(0)->branchcode;;} ?></div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">Account Name</div>
									<div class="col-10"><?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->accountname;} ?></div>
								</div>
								<div class="row">
									<div class="col-2 font-weight-bold">Account No</div>
									<div class="col-10"><?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->accountno;} ?></div>
								</div>
								<div class="row mt-2">
									<div class="col-6">
										<!-- <p class="d-none" id="hideurl"><?php //echo base_url().'Loginregister/Registerwithcode/'.$profileinfo->profileinfo[0]->refcode; ?></p> -->

									</div>
									<div class="row">
										<p class="d-none" id="hideurl"><?php echo base_url().'Loginregister/Register'; ?></p>
										<span class="btn btn-primary btn-sm rounded-0" onclick="copyfunction('#hideurl')"><i class="icon-share"></i>&nbsp;Share your friends</span>
									</div>
								</div>
								<?php //if(date('H:i:s')>'21:00:00' && date('H:i:s')<'08:00:00'){ ?>
								<div class="row mt-3">
									<div class="col-12">
										<div class="accordion accordion-icon accordion-simple">
											<div class="card">
												<div class="card-header">
													<a href="#collapse3-1" class="collapse"><i class="w-icon-long-arrow-right"></i>Update Profile </a>
												</div>
												<div class="card-body collapsed" id="collapse3-1">
													<form action="<?php echo base_url().'Loginregister/Updateprofile' ?>" id="formprofileupdate" method="post" autocomplete="off">
														<div id="flashdata"></div>
														<div class="row">
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">First Name <span>*</span></label>
																<input type="text" class="form-control form-control-sm text-dark" name="regfirst" id="regfirst" value="<?php echo $customerprofile->row(0)->firstname ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Last Name <span>*</span></label>
																<input type="text" class="form-control form-control-sm text-dark" name="reglast" id="reglast" value="<?php echo $customerprofile->row(0)->lastname ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Phone <span>*</span></label>
																<input type="text" class="form-control form-control-sm text-dark <?php if(!empty($customerprofile->row(0)->phone)){echo "bg-grey";} ?>" name="regphone" id="regphone" minlength="10" maxlength="10" <?php if(!empty($customerprofile->row(0)->phone)){echo "readonly";} ?> value="<?php echo $customerprofile->row(0)->phone ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Email <span>*</span></label>
																<input type="email" class="form-control form-control-sm text-dark bg-grey" name="regemail" id="regemail" value="<?php echo $customerprofile->row(0)->email ?>" readonly>
															</div>
															<div class="col-lg-12 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Address <span>*</span></label>
																<input type="text" class="form-control form-control-sm text-dark" name="regaddress" id="regaddress" value="<?php echo $customerprofile->row(0)->address ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">City <span>*</span></label>
																<select class="form-control form-control-sm  selectpicker" style="width:100%; display:none" name="regcity"  id="regcity" required>
																	<option value="">Select</option>
																	<?php foreach($citylist->result() as $rowcitylist){ ?>
																	<option value="<?php echo $rowcitylist->city ?>" <?php if($this->session->userdata('loggedin')==1){if($rowcitylist->city==$customerprofile->row(0)->city){echo 'selected';}} ?>><?php echo $rowcitylist->city ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label for="country">country <span>*</span></label><br>
																<select class="form-control form-control-sm text-dark selectpicker" style="border: 1px solid #ededed;outline:0px !important;box-shadow: none !important;" name="regcountry" id="regcountry" required>
																	<option value="">Select</option>
																	<?php foreach($countrylist->result() as $rowcountrylist){ ?>
																	<option value="<?php echo $rowcountrylist->idtbl_country ?>" <?php if($customerprofile->row(0)->tbl_country_idtbl_country==$rowcountrylist->idtbl_country){echo 'selected';} ?>><?php echo $rowcountrylist->country ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Date of birth <span>*</span></label>
																<input type="date" class="form-control form-control-sm text-dark selectpicker" name="dob" id="dob" value="<?php echo $customerprofile->row(0)->dob ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">NIC <span>*</span></label>
																<input type="text" class="form-control form-control-sm text-dark <?php if(!empty($customerprofile->row(0)->nicno)){echo "bg-light";} ?>" name="nic" id="nic" minlength="10" maxlength="12" <?php if(!empty($customerprofile->row(0)->nicno)){echo "readonly";} ?>  value="<?php echo $customerprofile->row(0)->nicno ?>" required>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Bank & Code</label>
																<div class="row">
																	<select name="regbank" id="regbank" class="col-9 form-control selectpicker" style="width:75%;display:none" required>
																		<option value="">Select</option>
																		<?php foreach($banklist->result() as $rowbanklist){ ?>
																		<option value="<?php echo $rowbanklist->code ?>" 
																		<?php if($this->session->userdata('loggedin')
																		==1 && $customerprofilebank->num_rows()>0)
																		{if($rowbanklist->code==$customerprofilebank->row(0)->bankcode)
																		{echo 'selected';}} ?>>
																		<?php echo $rowbanklist->bank ?></option>
																		<?php } ?>
																	</select>
																	<input type="text" minlength="4" maxlength="4" name="regbankcode" id="regbankcode" class="col-3 bg-grey form-control form-control-sm" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->bankcode;} ?>" placeholder="Code" required readonly>
																</div>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Branch & Code</label>
																<div class="row">
																	<select name="regbranch" id="regbranch" class="col-9 form-control form-control-sm selectpicker" style="width:75%;display:none" required>
																		<option value="">Select</option>
																	</select>
																	<input type="text" minlength="3" maxlength="3" name="regbranchcode" id="regbranchcode" class="col-3 bg-grey form-control form-control-sm" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->branchcode;} ?>" placeholder="Code" required readonly>
																</div>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Account Name</label>
																<input type="text" class="form-control form-control-sm text-dark" name="regaccount" id="regaccount" value="<?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->accountname;} ?>">
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Account No</label>
																<input type="text" class="form-control form-control-sm text-dark" name="regaccountno" id="regaccountno" maxlength="12" value="<?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->accountno;} ?>">
															</div>
														</div>
														<div class="login_submit">
															<button type="button" class="btn btn-primary btn-sm rounded-0" id="profilesubmitbtn">Update Profile</button>
															<input type="submit" class="d-none" id="btnhidesubmit">
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php //} ?>
							</div>

                            <div class="tab-pane" id="view-commission">
                                <div class="icon-box icon-box-side icon-box-light">
									<span class="icon-box-icon icon-money">
										<i class="w-icon-money"></i>
									</span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title mb-0 ls-normal">Commission</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong> From </strong>
                                        <input type="date" class="form-control"/>
                                    </div>
                                    <div class="col-md-3">
                                        <strong> To </strong>
                                        <input type="date" class="form-control"/>
                                    </div>
                                    <div class="col-md-3">
                                        <br>
                                         <button type="button" class="btn btn-primary mt-1">View</button>
                                    </div>
                                </div>
                            </div>
							<div class="tab-pane" id="member">
								<div class="icon-box icon-box-side icon-box-light">
									<span class="icon-box-icon icon-map-marker">
									<i class="fa fa-user"></i>

									</span>
									<div class="icon-box-content">
										<h4 class="icon-box-title mb-0 ls-normal">Your Members</h4>
									</div>
								</div>
								<div class="row mt-3">
                                    <div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading2">
													<a href="#collapse1-1" class="expand">Level 02 - (<span id="memcount2"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist2">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading3">
													<a href="#collapse1-1" class="expand">Level 03 - (<span id="memcount3"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist3">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading4">
													<a href="#collapse1-1" class="expand">Level 04 - (<span id="memcount4"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist4">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading5">
													<a href="#collapse1-1" class="expand">Level 05 - (<span id="memcount5"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist5">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading6">
													<a href="#collapse1-1" class="expand">Level 06 - (<span id="memcount6"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist6">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading7">
													<a href="#collapse1-1" class="expand">Level 07 - (<span id="memcount7"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist7">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 pb-2">
										<div class="accordion accordion-bg accordion-gutter-md accordion-border">
											<div class="card">
												<div class="card-header clickacco" id="heading8">
													<a href="#collapse1-1" class="expand">Level 08 - (<span id="memcount8"></span>)</a>
												</div>
												<div id="collapse1-1" class="card-body p-0 collapsed">
													<ul class="list-group list-group-flush m-0" id="memlist8">
														<li class="list-group-item px-2 py-1 text-center"><img src="<?php echo base_url() ?>images/spinner.gif" class="img-fluid"></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- End of PageContent -->
		</main>
		<!-- End of Main -->

		<?php include "include/footercontent.php"; ?>
	</div>
	<!-- End of Page Wrapper -->

    <div class="product product-single product-popup">
        <div class="row gutter-lg" id="orderview">
            <div class="col-md-12 mb-4 mb-md-0">
                <div id="order_response">

                </div>
            </div>
        </div>
    </div>

	<?php include "include/footerscript.php"; ?>
	<script src="/js/Bootstrap/Select/bootstrap-select.js"></script> 

<script>
	        $(document).ready(function(){
    $('.selectpicker').selectpicker();
			});
</script>
	<script>
        $('#ordertable tbody').on('click', '.btncancel', function() {
            var r = confirm("Are you sure, You want to cancel this order ? ");
            if (r == true) {
                var orderID = $(this).attr('id');
                var email = '<?php echo $customerprofile->row(0)->email; ?>';

                $.ajax({
                    url: "<?php echo base_url('Loginregister/Ordercancel');?>",
                    method: "POST",
                    data: {
                        orderID:orderID,
                        email:email
                    },
                    success: function(data) { 
                        location.reload();
                    }
                });
            }
        });
		$('#formSearchBtn').click(function(){
            if (!$("#searchFrom")[0].checkValidity()) {
                // If the form is invalid, submit it. The form won't actually submit;
                // this will just cause the browser to display the native HTML5 error messages.
                $("#hidesubmitbtn").click();
            } else {
                var fromdate = $('#fromdate').val();
                var todate = $('#todate').val();

                $('#viewresult').html('<div class="card border-0 shadow-none"><div class="card-body text-center"><img src="<?php echo base_url() ?>images/spinner.gif" alt=""></div></div>');

                $.ajax({
                    type: "POST",
                    data: {
                        fromdate: fromdate,
                        todate: todate
                    },
                    url: '<?php echo base_url('Loginregister/Commissionview');?>',
                    success: function(result) { //alert(result);
                        // var obj = JSON.parse(result);
                        // $('#viewresult').html(obj.htmlview);
                        // $('#showcommisson').html(obj.totalcom)
                        $('#viewresult').html(result);
                        // $('#htmtotal').html(obj.comtothtml);
                        totaloption();
                    }
                });  
            }
        });

		function copyfunction(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }

			$('.btnpopupview').click(function (e){
			   let id = $(this).data('id');
			   let url_text = '<?= site_url() ?>/'+'Loginregister/get_single_order_ajax';

                $.ajax({
                    url: url_text,
                    type: 'POST',
                    data: {id: id},
                    success: function(res) {

                        let json = $.parseJSON(res);
                        console.log(json.customer_details)

                        let order = ''+
                            '<h3> Order #'+json.order.idtbl_order+' </h3>'+
                            '<div class="row modal-body">'+
                            '<div class="col-md-4">'+
                            'Order Date : <strong> '+ json.order.orderdate +'</strong>'+
                            '</div>';

                        let deli_label = '';
                        if(json.order.deliverystatus == '0'){
                            deli_label = '<span style="color: darkred"> Not Delivered </span>';
                        }else{
                            deli_label = '<span style="color: darkgreen"> Delivered </span>';
                        }
                        order +=
                            '<div class="col-md-4">'+
                            'Delivery Status : <strong> '+ deli_label +'</strong>'+
                            '</div>';

                        let acc_label = '';
                        if(json.order.acceptstatus == '0'){
                            acc_label = '<span style="color: darkred"> Not Accepted </span>';
                        }else{
                            acc_label = '<span style="color: darkgreen"> Accepted </span>';
                        }
                        order +=
                            '<div class="col-md-4">'+
                            'Accept Status : <strong> '+ acc_label +'</strong>'+
                            '</div>';

                        let ship_label = '';
                        if(json.order.shipstatus == '0'){
                            ship_label = '<span style="color: darkred"> Not Shipped </span>';
                        }else{
                            ship_label = '<span style="color: darkgreen"> Shipped </span>';
                        }
                        order +=
                            '<div class="col-md-4">'+
                            'Ship Status : <strong> '+ ship_label +'</strong>'+
                            '</div>'

                        order +=
                            '<div class="col-md-4">'+
                            'Tracking No : <strong> '+ json.order.trackingnum +'</strong>'+
                            '</div>'+
                            '<div class="col-md-4">'+
                            'Tracking Web Site : <strong> '+ json.order.trackingwebsite +'</strong>'+
                            '</div>'+
                            '<div class="col-md-4">'+
                            'Narration : <strong> '+ json.order.narration +'</strong>'+
                            '</div>';
                        if(json.order.cancelreason != ''){
                            order +=
                                '<div class="col-md-4">'+
                                'Cancel Reason : <strong> '+ json.order.cancelreason +'</strong>'+
                                '</div>';
                        }

                        if(json.order.returnstatus != '0') {
                            order +=
                                '<div class="col-md-4">' +
                                'Return Status : <strong> ' + json.order.returnstatus + '</strong>' +
                                '</div>';
                        }

                        order += '</div>';

                        let items = ''+
                            '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<table class="table">'+
                                    '<thead>'+
                                        '<tr>'+
                                            '<th> Product </th>'+
                                            '<th> Qty </th>'+
                                            '<th class="text-right"> Price </th>'+
                                            '<th class="text-right"> Total </th>'+
                                        '</tr>'+
                                    '</thead>'+
                                    '<tbody>';

                                    $.each(json.order_details, function(key,value) {
                                        items += '<tr>' +
                                            '<td> '+ value.product_name+' </td>' +
                                            '<td> '+ value.qty+' </td>' +
                                            '<td class="text-right"> '+ value.price+' </td>' +
                                            '<td class="text-right"> '+ value.total+' </td>' +
                                            '</tr>';
                                    });

                        items +=   '</tbody>'+
                                '</table>'+
                            '<div>'+
                            '</div>'

							items += '' +
                            '<div class="row">' +
                            '<div class="col-md-12 text-right modal-body">' +
                            'Sub Total : <strong> '+ parseFloat(json.order.total).toFixed(2) +'</strong> <br>';
							if(json.order.dropdiscountstatus==1){
								items +='Discount : <strong> (0.00)</strong> <br>';
							}
							else{
								items +='Discount : <strong> '+ parseFloat(json.order.discount).toFixed(2) +'</strong> <br>';
							}
                            items +='Ship Cost : <strong> '+ parseFloat(json.order.shipcost).toFixed(2) +'</strong> <br>';
							if(json.order.dropdiscountstatus==1){
								var nettotal = parseFloat(json.order.total)+parseFloat(json.order.shipcost);
								items +='Net Total : <strong> '+ parseFloat(nettotal).toFixed(2)  +'</strong> <br>';
							}
							else{
								items +='Net Total : <strong> '+ parseFloat(json.order.nettotal).toFixed(2)  +'</strong> <br>';
							}
                            '</div> ' +
                            '</div>'



							items += '' +
                            '<div class="row">' +
                            '<div class="col-md-12 text-left modal-body">' +
							'Customer Name : <strong> '+ json.customer_details.name +'</strong> <br>';
							items +='Customer Address : <strong> '+ json.customer_details.addressone +'</strong> <br>';
							if(json.customer_details.mobiletwo == ''){
								items +='Customer Phone : <strong> '+ json.customer_details.mobile +'</strong> <br>';
                        	}else{
								items +='Customer Phone : <strong> '+ json.customer_details.mobile +'</strong> <br>';
								items +='Customer Other Phone  : <strong> '+ json.customer_details.mobiletwo +'</strong> <br>';
                        	}
                            '</div> ' +
                            '</div>'




                        $('#order_response').html(order + items);

                    },
                    error: function(xhr, status, data){
                        alert(data)
                        // let errors = xhr.responseJSON.errors
                        // let error_text = ''
                        // $.each(errors, function(key,value) {
                        //     error_text += value + '<br>';
                        // });
                        //show_error_alert("#response", error_text);

                    }
                });
            });

			$("#regcity").select2();
        	$("#regbank").select2();
        	$("#regbranch").select2();
			
			var branchcode = '<?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->branchcode;} ?>';
			if(branchcode!=''){
				var bankcode = $('#regbank').val();
				branchlist(bankcode, branchcode);
			}

			$('#regbank').change(function(){
				var bankcode = $(this).val();
				$('#regbankcode').val(bankcode);
				var branchcode = '';
				branchlist(bankcode, branchcode);
			});

			$('#regbranch').change(function(){
				var branchcode = $(this).val();
				$('#regbranchcode').val(branchcode);
			});

			$('#profilesubmitbtn').click(function(){
				if (!$("#formprofileupdate")[0].checkValidity()) {
					// If the form is invalid, submit it. The form won't actually submit;
					// this will just cause the browser to display the native HTML5 error messages.
					$("#btnhidesubmit").click();
				} else {
					var niccheck=nicvalidation();
					// alert(niccheck);

					if(niccheck==true){
						$("#formprofileupdate").submit();
					}else{
						$('#flashdata').html('<div class="alert alert-danger alert-dismissible" role="alert">Insert valid NIC number or your NIC / DOB mismatch. PLease check and re enter correct data</div>');
					}
				}
			});

			$('.clickacco').click(function(){
				var lvlno=$(this).attr('id');
				const lvlinfo = lvlno.split("heading");
				
				var levelno=lvlinfo[1];
				var dataset='memlist'+levelno;
				var countshow='memcount'+levelno;

				getmemberlist(levelno, dataset, countshow);
			});

		// });

		function copyfunction(element) {
			var $temp = $("<input>");
			$("body").append($temp);
			$temp.val($(element).text()).select();
			document.execCommand("copy");
			$temp.remove();
		}
		function nicvalidation(e){
			var NICNo = $("#nic").val();
			var Dob = $("#dob").val();

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
		function branchlist(bankcode, branchcode){
        $.ajax({
            url: "<?php echo base_url('Loginregister/Branchlist');?>",
            method: "POST",
            data: {bankcode:bankcode},
            success: function(data) { //alert(data);
                var objfirst = JSON.parse(data);
                var html = '';
                html += '<option value="">Select</option>';
                $.each(objfirst, function(i, item) {
                    //alert(objfirst[i].id);
                    html += '<option value="' + objfirst[i].code + '">';
                    html += objfirst[i].branch;
                    html += '</option>';
                });

                $('#regbranch').empty().append(html);

                if (branchcode != '') {
                    $('#regbranch').val(branchcode);
                }
            }
        });
    }
		function getmemberlist(levelno, dataset, countshow){
			$.ajax({
				url: "<?php echo base_url('Loginregister/Getmemberlist');?>",
				method: "POST",
				data: {
					levelno:levelno
				},
				success: function(data) { //alert(data);
					var obj = JSON.parse(data);
					$('#'+dataset).empty().html(obj.htmlview);
					$('#'+countshow).empty().html(obj.htmlcount);
				}
			});
		}

	</script>


</body>

</html>