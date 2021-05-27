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
					
					<div class="row gutters">
						<div class="col-md-12">
							<?php
							$userid=getUserId();
							$curl = curl_init();

							curl_setopt_array($curl, array(
								CURLOPT_URL => "https://api.zoom.us/v2/users/".$userid."/meetings",
								CURLOPT_RETURNTRANSFER => true,
								CURLOPT_ENCODING => "",
								CURLOPT_MAXREDIRS => 10,
								CURLOPT_TIMEOUT => 30,
								CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								CURLOPT_CUSTOMREQUEST => "GET",
								CURLOPT_HTTPHEADER => array(
									"authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IkktTlNqSnFWUU9Dc2ltYmowUVRXM1EiLCJleHAiOjE2MTk1MTYxODksImlhdCI6MTYxODkxMTM5MX0.ktZqUpErYUIlFIQGjRA4fZdjyCHR7EHSGusxHefsAdI",
									"content-type: application/json"
									),
								));

							$response = curl_exec($curl);
							$err = curl_error($curl);

							curl_close($curl);

							if ($err) {
								echo "cURL Error #:" . $err;
								exit;
							} else {
								$data=json_decode($response);
								$data=$data->meetings;
							}
							?>


							<table id="example" class="table table-striped table-bordered">
								<thead class="spThead">
									<tr>
									     <th>ID</th>
										<th>title</th>

										<th>datetime</th>
										<th>Duration</th>
										
										<th>Join</th>

									</tr>
								</thead>
								<tbody class="spTbody">
									<?php 


									foreach ($data as $row): ?>
									<tr >


										<td><?= $row->id ?></td>
										<td><?= $row->topic ?></td>
										<td><?= $row->start_time?></td>
										<td><?= $row->duration ?></td>
										<td><a href="<?= base_url() ?>Admin/join_meeting?id=<?= $row->id ?>">Join Meeting</a></td>
										<td><a href="<?= base_url() ?>Admin/view_meeting?id=<?= $row->id ?>">View Details</a></td>
										
									</tr> 
								<?php endforeach ?>
							</div>

						</div>


					</div>
				</div>
			</div>
			<?php $this->load->view('admin/templates/form_model');?>
			<?php $this->load->view('admin/includes/footer');?>

		</div>

		<?php $this->load->view('admin/includes/js');?>


	</body>

	</html>