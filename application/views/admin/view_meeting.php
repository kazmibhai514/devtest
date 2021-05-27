<!doctype html>
<?php

$heading="Meeting Details";
?>
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

								<div class="card-header"><?= $heading ?>

									

								</div>
								<div class="card-body">

									<table id="example" class="table table-striped table-bordered">
										<thead class="spThead">
											<tr>
												<th>Title</th>
												
												<th></th>
												
												
											</tr>
										</thead>
										<tbody class="spTbody">
											<?php

											$curl = curl_init();

											curl_setopt_array($curl, array(
											CURLOPT_URL => "https://api.zoom.us/v2/meetings/".$_GET['id'],
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
										$resArray=json_decode($response);
										$resArray=(Array)$resArray;
										
										
									}
									?>
									<tr><td>Title</td><td><?= $resArray['topic'] ?></td></tr>
									<tr><td>Agenda</td><td><?= $resArray['agenda'] ?></td></tr>
									<tr><td>Created At</td><td><?= $resArray['created_at'] ?></td></tr>
									<tr><td>Duration</td><td><?= $resArray['duration'] ?></td></tr>
									<tr><td>ID</td><td><?= $resArray['id'] ?></td></tr>
									<tr><td>Join Url</td><td><a class="btn btn-primary"  href="<?= base_url() ?>Admin/join_meeting?id=<?= $resArray['id'] ?>">Join Meeting</a></td></tr>
									<tr><td>Start Url</td><td><a class="btn btn-primary" href="https://us04web.zoom.us/wc/<?= $resArray['id'] ?>/start">Start Meeting</a></td></tr>
									<tr><td>Join Url</td><td><?= $resArray['join_url'] ?></td></tr>
									<tr><td>Start Time</td><td><?= $resArray['start_time'] ?></td></tr>
									<tr><td>Status</td><td><?= $resArray['status'] ?></td></tr>
									<tr><td>HOST ID</td><td><?= $resArray['host_id'] ?></td></tr>
								</tbody>
							</table>
						</div>
					</div>
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