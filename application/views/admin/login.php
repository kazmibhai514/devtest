<!doctype html>
<html lang="en">
<?php
$this->load->view("admin/includes/htmlhead.php");
?>

<body class="">
	<div class="container">
		<div class="login-screen row align-items-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<form  action="<?=base_url()?>Admin/authenticate_login" method="POST" >
					<div class="login-container">
						<div class="row no-gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="login-box">
									<div class="row">
										<div class="col-sm-4 col-md-4">
											
										</div>
										<a  class="login-logo">
											<img src="<?= base_url() ?>assetsAdmin/img/<?= getCol("options","option_title","logo",'value') ?>" style="width:100px;max-height:100px"   />
										</a>
										<div class="col-sm-4 col-md-4">
											
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-sm-12">
											<?php
											$this->load->view("admin/includes/message.php");
											?>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-1 col-md-4">
											
										</div>
										<div class="col-sm-1 col-md-4">

											<div class="input-group">
												<span class="input-group-addon" id="username"><i class="icon-account_circle"></i></span>
												<input type="text"  class="form-control" placeholder="username" aria-label="username" aria-describedby="username" name="username">
											</div>
											<!-- <br> -->
											<div class="input-group">
												<span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
												<input type="password"  class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password" name="password">
											</div>
											<center>
												<div class="actions">

													<input  id="submit" class="btn btn-info btn-rounded" type="submit" name="" value="submit" > 
												</div>
											</center>
										</div>
										<div class="col-sm-4 col-md-4">
											
										</div>
									</div>
								</div>
							</div>


						</div>

					</div>

				</form>

			</div>
		</div>
	</div>
</body>
<?php
$this->load->view("admin/includes/js.php");
?>

</html>