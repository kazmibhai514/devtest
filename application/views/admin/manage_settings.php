<!doctype html>
<html lang="en">
<?php $this->load->view('admin/includes/htmlhead');?>

<body>

	<?php $this->load->view('admin/includes/loading');?>

	<div class="app-wrap">
		<?php $this->load->view('admin/includes/topbar');?>
		<div class="app-container">
			<?php $this->load->view('admin/includes/sidebar');?>


			<div class="app-main">
				
				<div class="main-content">
					<div class="row">
						<div class="col-xl-12" id="flash_data">
							<?php $this->load->view('admin/includes/message');?>

						</div>
					</div>
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="card">

								<div class="card-header">Settings
								</div>
								<div class="card-body">
									<form method="POST" name="myForm" id="myForm"  enctype="multipart/form-data" onsubmit="return submit_form('#myForm','Admin/submit_settings')">
										<div class="form-group row">
											<div class="col-md-6">
												<label class="col-form-label">Title</label>
												<input type="hidden"  name="option_title[]" value="title" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text"  name="value[]"  placeholder="Enter Title" value="<?= getCol("options","option_title","title",'value') ?>" class="form-control-sm form-control">

												
											</div>
											<?php
											$fieldnameval="Email";
											$sendname="email";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="email" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Contact No";
											$sendname="cn1";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="number" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Contact No 2";
											$sendname="cn2";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="tel" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Address";
											$sendname="address";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Timing Of Office";
											$sendname="tooffice";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Shift Timing";
											$sendname="st";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Keywords";
											$sendname="keywords";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="About Us";
											$sendname="about_us";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<textarea name="value[]" rows="5"  placeholder="Enter <?= $fieldnameval ?>" value="" class="form-control-sm form-control"><?= getCol("options","option_title",$sendname ,'value') ?> </textarea>

												
											</div>
											<?php
											$fieldnameval="Facebook Url";
											$sendname="fb";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Instagram Url";
											$sendname="instagram";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
												<?php
											$fieldnameval="Twitter Url";
											$sendname="twitter";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
												<?php
											$fieldnameval="Linkdin Url";
											$sendname="linkdin";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Google Url";
											$sendname="google";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Body text";
											$sendname="bodytext";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<textarea name="value[]" rows="5"  placeholder="Enter <?= $fieldnameval ?>" value="" class="form-control-sm form-control"> <?= getCol("options","option_title", $sendname,'value') ?></textarea>

												
											</div>
											<?php
											$fieldnameval="Header text";
											$sendname="headertext";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<textarea name="value[]" rows="5"  placeholder="Enter <?= $fieldnameval ?>" value="" class="form-control-sm form-control"> <?= getCol("options","option_title", $sendname ,'value') ?></textarea>

												
											</div>
											<?php
											$fieldnameval="Footer text";
											$sendname="footertext";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<textarea name="value[]" rows="5"  placeholder="Enter <?= $fieldnameval ?>" value="" class="form-control-sm form-control"> <?= getCol("options","option_title", $sendname ,'value') ?></textarea>

												
											</div>
											<?php
											$fieldnameval="Copyright text";
											$sendname="crtext";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<textarea name="value[]" rows="5"  placeholder="Enter <?= $fieldnameval ?>" value="" class="form-control-sm form-control"> <?= getCol("options","option_title", $sendname ,'value') ?></textarea>

												
											</div>
											<div class="col-md-6">
												<label class="col-form-label">Logo</label>
												<input type="hidden"  name="option_title[]" value="logo" />
												<input type="hidden"  name="type[]" value="img" />
												<input type="file" name="logo" class="form-control">
												<input type="hidden"  name="value[]"  value="logo" class="form-control-sm form-control">
												<img src="<?= base_url() ?>assetsAdmin/img/<?= getCol("options","option_title","logo",'value') ?>" style="height:100px">
												
											</div>
											<?php
											$fieldnameval="Alt logo";
											$sendname="altlogo";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Logo2";
											$sendname="logo2";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="img" />
												<input type="file" name="<?= $sendname ?>" class="form-control">
												<input type="hidden"  name="value[]"  value="<?= $sendname ?>" class="form-control-sm form-control">
												<img src="<?= base_url() ?>assetsAdmin/img/<?= getCol("options","option_title",$sendname,'value') ?>" style="height:100px">
												
											</div>
												<?php
											$fieldnameval="Alt logo2";
											$sendname="altlogo2";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Login Image";
											$sendname="loginimage";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="img" />
												<input type="file" name="<?= $sendname ?>" class="form-control">
												<input type="hidden"  name="value[]"  value="<?= $sendname ?>" class="form-control-sm form-control">
												<img src="<?= base_url() ?>assetsAdmin/img/<?= getCol("options","option_title",$sendname,'value') ?>" style="height:100px">
												
											</div>
											<?php
											$fieldnameval="SignUp Image";
											$sendname="signupimage";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="img" />
												<input type="file" name="<?= $sendname ?>" class="form-control">
												<input type="hidden"  name="value[]"  value="<?= $sendname ?>" class="form-control-sm form-control">
												<img src="<?= base_url() ?>assetsAdmin/img/<?= getCol("options","option_title",$sendname,'value') ?>" style="height:100px">
												
											</div>
											<?php
											$fieldnameval="Forgot Image";
											$sendname="forgotimage";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="img" />
												<input type="file" name="<?= $sendname ?>" class="form-control">
												<input type="hidden"  name="value[]"  value="<?= $sendname ?>" class="form-control-sm form-control">
												<img src="<?= base_url() ?>assetsAdmin/img/<?= getCol("options","option_title",$sendname,'value') ?>" style="height:100px">
												
											</div>
											<?php
											$fieldnameval="Currency";
											$sendname="currency";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="text" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="EFMS  min amount";
											$sendname="eminamount";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="number" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="EFMS max amount";
											$sendname="emaxamount";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="number" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											
											<?php
											$fieldnameval="Package Sold Months";
											$sendname="psm";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="number" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Package End initial income multiply by";
											$sendname="endlimit";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="number" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
											<?php
											$fieldnameval="Lucky No of Days";
											$sendname="luckydays";
											?>
											<div class="col-md-6">
												<label class="col-form-label"><?= $fieldnameval ?></label>
												<input type="hidden"  name="option_title[]" value="<?= $sendname ?>" />
												<input type="hidden"  name="type[]" value="text" />
												<input type="number" name="value[]"   placeholder="Enter <?= $fieldnameval ?>" value="<?= getCol("options","option_title",$sendname,'value') ?>" class="form-control-sm form-control"> 

												
											</div>
												
											
											<div class="col-md-12">
												<br>
												<?php  if(getPer("settings","p_edit")){ ?>

												<input type="submit" class="btn btn-primary"  name="">
												<?php } ?>
											</div>

										</div>


									</form>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
		<?php $this->load->view('admin/includes/footer');?>

	</div>

	<?php $this->load->view('admin/includes/js');?>

</body>

</html>