<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

	<title>My Account - Rumantra - By ERav Technology</title>

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Wolmart eCommmerce Marketplace HTML Template">
	<meta name="author" content="D-THEMES">

	<?php include "include/headerscript.php"; ?>

    <style>
        .modal-body{
            font-size: medium;
        }
		.collapsible {
background-color: #dfdfdf75;
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}


.collapsible:after {
	content: '\002B';
  color: black;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: '\2212';
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
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

								<table class="shop-table account-orders-table mb-6">
									<thead>
										<tr>
											<th class="order-id">Order</th>
											<th class="order-date">Date</th>
											<th class="order-status">Status</th>
											<th class="order-total">Total</th>
											<th class="order-actions">Actions</th>
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
																<select class="form-control form-control-sm text-dark selectpicker" style="width:100%;" name="regcity" id="regcity" required>
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
																	<select name="regbank" id="regbank" class="col-9 form-control form-control-sm selectpicker" style="width:75%;" required>
																		<option value="">Select</option>
																		<?php foreach($banklist->result() as $rowbanklist){ ?>
																		<option value="<?php echo $rowbanklist->code ?>" <?php if($this->session->userdata('loggedin')==1 && $customerprofilebank->num_rows()>0){if($rowbanklist->code==$customerprofilebank->row(0)->bankcode){echo 'selected';}} ?>><?php echo $rowbanklist->bank ?></option>
																		<?php } ?>
																	</select>
																	<input type="text" minlength="4" maxlength="4" name="regbankcode" id="regbankcode" class="col-3 bg-grey form-control form-control-sm" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php if($customerprofilebank->num_rows()>0){echo $customerprofilebank->row(0)->bankcode;} ?>" placeholder="Code" required readonly>
																</div>
															</div>
															<div class="col-lg-6 mb-20 pb-3">
																<label class="text-dark font-weight-bold">Branch & Code</label>
																<div class="row">
																	<select name="regbranch" id="regbranch" class="col-9 form-control form-control-sm selectpicker" style="width:75%;" required>
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
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-4 mt-5">
										<button class="collapsible">Level 02 - (0)</button>
										<div class="content">
  										<p>No Preview members</p>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 mt-5">
										<button class="collapsible">Level 03 - (0)</button>
										<div class="content">
  										<p>No Preview members</p>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 mt-5">
										<button class="collapsible">Level 04 - (0)</button>
										<div class="content">
  										<p>No Preview members</p>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 mt-5">
										<button class="collapsible">Level 05 - (0)</button>
										<div class="content">
  										<p>No Preview members</p>
										</div>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 mt-5">
										<button class="collapsible">Level 06 - (0)</button>
										<div class="content">
  										<p>No Preview members</p>
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

<script type="text/javascript">
    $('.selectpicker').selectpicker({});
</script>
	<script>
		// $(document).ready(function(){
		// 	$("#regcity").select2();
		// 	$("#regbank").select2();
		// 	$("#regbranch").select2();

			$('.btnpopupview').click(function (e){
			   let id = $(this).data('id');
			   let url_text = '<?= site_url() ?>/'+'Loginregister/get_single_order_ajax';

                $.ajax({
                    url: url_text,
                    type: 'POST',
                    data: {id: id},
                    success: function(res) {

                        let json = $.parseJSON(res);
                        //console.log(json.order)

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
                                '<table class="table w-auto text-xsmall">'+
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
                            '<div class="col-md-12 mt-3 text-right modal-body">' +
                            'Ship Cost : <strong> '+ parseFloat(json.order.shipcost).toFixed(2) +'</strong> <br>'+
                            'Total : <strong> '+ parseFloat(json.order.total).toFixed(2) +'</strong> <br>'+
                            'Discount : <strong> '+ parseFloat(json.order.discount).toFixed(2) +'</strong> <br>'+
                            'Net Total : <strong> '+ parseFloat(json.order.nettotal).toFixed(2)  +'</strong> <br>'+
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


	</script>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>

</body>

</html>