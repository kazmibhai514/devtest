<aside class="app-side" id="app-side" style="background:  black">
	<div class="side-content ">
		<div class="user-profile" style="background:  black">
			<?php if($this->Admin_model->getsessioninfo('role')=="Admin")
			{ 
				?>
				<img src="<?= base_url() ?>assetsAdmin/img/<?= getCol("options","option_title","logo",'value') ?>" class="profile-thumb" alt="User Thumb">

				<?php }else{
					?>
					<img src="<?= base_url() ?>assetsAdmin/img/<?= getInfo("image") ?>" class="profile-thumb" alt="User Thumb">
					<h6 class="profile-name"><?php echo $this->Admin_model->getsessioninfo('abh_id') ?></h6>
					<?php
				} ?>
				<h6 class="profile-name"><?php echo $this->Admin_model->getsessioninfo('name') ?></h6>
			</div>
			<nav class="side-nav">
				<ul class="unifyMenu" id="unifyMenu">
					

					<?php if($this->Admin_model->getsessioninfo('role')=="Admin")
					{ 
						?>
						<li>
							<a href="<?=base_url()?>Admin/cmeeting" aria-expanded="false" >
								<span class="has-icon">
									<i class="icon-star"></i>
								</span>
								<span class="nav-title">Create Meeting</span>
							</a>

						</li>
						<li>
							<a href="<?=base_url()?>Admin/dashboard" aria-expanded="false" >
								<span class="has-icon">
									<i class="icon-star"></i>
								</span>
								<span class="nav-title">Meetings</span>
							</a>

						</li>
                    


						<?php }
							?>
							
					</ul>
				</nav>
			</div>
		</aside>