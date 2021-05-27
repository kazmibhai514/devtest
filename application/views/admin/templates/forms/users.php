	<?php
	$name="";
	$email="";
	$username="";
	$password="";
	$province="";
	$status="Active";
	$role="";
	$p_center=array();
	$created_by="";
	if(!empty($id))
	{
		$rowdata=$this->Admin_model->getRow("users",array("user_id"=>$id));
		if($rowdata)
		{
			$name=$rowdata['name'];
			$email=$rowdata['email'];;
			$username=$rowdata['username'];
			$password=$rowdata['password'];
			$province=$rowdata['province_id'];
			$status=$rowdata['status'];
			$role=$rowdata['role'];
			$created_by=$rowdata['created_by'];
		}
		
	}
	?>
	<form method="POST" name="myForm" id="myForm"  enctype="multipart/form-data" onsubmit="return submit_form('#myForm','Admin/submit_users')">
		<div class="form-group row">
			<div class="col-md-12">
				<label class="col-form-label">Name</label>
				<input type="text"  name="name" required placeholder="Enter Name" value="<?php echo $name ?>" class="form-control-sm form-control">
				<?php
				if(!empty($id))
				{
					?>
					<input type="hidden"  name="id" required placeholder="Enter Title" value="<?php echo $id ?>" class="form-control-sm form-control">
					<?php
				}
				?>

			</div>
			<div class="col-md-12">
				<label class="col-form-label">Email</label>
				<input type="text"  name="email" required placeholder="Enter Email" value="<?php echo $email ?>" class="form-control-sm form-control">

			</div>
			<div class="col-md-12">
				<label class="col-form-label">Username</label>
				<input type="text"  name="username" required placeholder="Enter Username" value="<?php echo $username ?>" class="form-control-sm form-control">

			</div>

			<div class="col-md-12">
				<label class="col-form-label">Password</label>
				<input type="password" required name="password" placeholder="Enter Password" value="<?php echo $password ?>" class="form-control-sm form-control">

			</div>
			<div class="col-md-12">
				<label class="col-form-label">Role </label>
				<Select required name="role" id="urole"  class="form-control-sm form-control">
					<option value="Admin">Admin</option>
			
				</Select>
				<script type="text/javascript">
					document.getElementById("urole").value="<?php echo $role ?>";
				</script>				

			</div>
		
		
			<div class="col-md-12">
				<label class="col-form-label">Status</label>
				<Select required name="status" id="ustatus"  class="form-control-sm form-control">
					<option value="Active">Active</option>
					<option value="Inactive">Inactive</option>
				</Select>
				<script type="text/javascript">
					document.getElementById("ustatus").value="<?php echo $status ?>";
				</script>				

			</div>


		</div>
		<span class="preview-area"></span>


		<div  style="text-align:center">
			<input type="submit" class="btn btn-primary"  name="">
		</div>  
	</form>