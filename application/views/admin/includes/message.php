
<?php 
if($this->session->flashdata("formmessageerror")){?>
<div class="card text-white bg-danger">
	<div class="card-header">Error</div>
	<div class="card-body">
		<h4 class="card-title">Message</h4>
		<p class="card-text"><?php echo $this->session->flashdata("formmessageerror") ?></p>
	</div>
</div>

<?php } ?>
<?php 
if($this->session->flashdata("formmessagesuccess")){ ?>
<div class="card text-white bg-success">
	<div class="card-header">Success</div>
	<div class="card-body">
		<h4 class="card-title">Message</h4>
		<p class="card-text"><?php echo $this->session->flashdata("formmessagesuccess")?></p>
	</div>
</div>
<?php } ?>
