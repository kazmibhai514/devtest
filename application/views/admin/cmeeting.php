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

								<div class="card-header">Create Meeting
								</div>
								<div class="card-body">
									<form method="POST" name="myForm" id="myForm"  enctype="multipart/form-data" action="<?= base_url() ?>Admin/submit_meeting">
										<div class="form-group row">


											<div class="col-md-6">
												<label class="col-form-label">Meeting Title</label>
												
												<input type="text" required name="meeting_title"  class="form-control-sm form-control"> 

												
											</div>
											<div class="col-md-6">
												<label class="col-form-label">Meeting Type</label>
												
												<select name="type" required  class="form-control-sm form-control"> 
													<option value="1">Schedule Meeting</option>
													<option value="2">Other</option>
												</select>

												
											</div>
											<div class="col-md-6">
												<label class="col-form-label">Meeting Duration</label>
												
												<input type="number" required name="duration"  class="form-control-sm form-control"> 

											</div>
											
											<div class="col-md-6">
												<label class="col-form-label">Meeting Password</label>
												
												<input type="text" maxlength="10" required name="password"  class="form-control-sm form-control"> 

											</div>
											<div class="col-md-6">
												<label class="col-form-label">Meeting Time</label>
												
												<input type="datetime-local" required  name="meeting_time"  class="form-control-sm form-control"> 

												
											</div>
											<div class="col-md-6">
											</div>
											<div class="col-md-6">
												<input type="checkbox"   name="join_befor_host" value="true"  >
												 <label class="col-form-label">Join Befor Admin</label>
												
												

												
											</div>
											<div class="col-md-6">
												<input type="checkbox"   name="host_video" value="true"  >
												 <label class="col-form-label">Host Video</label>
												
												

												
											</div>
											<div class="col-md-6">
												<input type="checkbox"   name="participant_video" value="true"  >
												 <label class="col-form-label">Participant_video</label>
												
												

												
											</div>
											<div class="col-md-6">
												<input type="checkbox"   name="registrants_email_notification" value="true"  >
												 <label class="col-form-label">Registrants email notification</label>
												
												

												
											</div>
											<div class="col-md-12">
												<br>
												

												<input type="submit" class="btn btn-primary"  name="">

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