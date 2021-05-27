<!doctype html>
<?php
$key="user_id";
$tablename="users";
$callview="users";
$heading="Super Admin Management";
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

									<button class='btn btn-primary btn-sm float-right' onclick="add_data('<?= $callview ?>','','','','','<?= $tablename ?>','<?= $key ?>')">Add</button>

								</div>
								<div class="card-body">

									<table id="example" class="table table-striped table-bordered">
										<thead class="spThead">
											<tr>
												<th>Name</th>
												
												<th>Email</th>
												
												<th>Status</th>
											<th>Created By</th>
											<th>Created At</th>	
												<th style="text-align:center">Action</th>
											</tr>
										</thead>
										<tbody class="spTbody">
											<?php 

											$data=$this->Admin_model->getRows($tablename ,array());

											foreach ($data as $row): extract($row);?>
											<tr id="row<?=$row[$key]?>">
												
												
												<td><?= $name ?></td>
												<td><?= $email ?></td>
												<td><?= $status?></td>
												<td><?= $created_by?></td>
												<td><?= $created_at?></td>
												
												<td style="padding: 2px;text-align: center;" width="15%">


													<button data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Record"  onclick="update('<?=$row[$key]?>','<?= $callview ?>','<?= $tablename ?>','<?= $key ?>')" class="btn btn-outline-success btn-sm"><span class="icon-pencil" ></span>
													</button>


													

													<button class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Record" onclick="deleteRecord('<?=$key?>',<?=$row[$key]?>,'<?= $tablename ?>')"><span class="icon-trash2" ></span>
													</button>



												</td>
											</tr> 
										<?php endforeach ?>
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