<aside class="app-side" id="app-side" style="background:  #FFC44F">
	<div class="side-content ">
		<div class="user-profile" style="background:  #FFC44F">
			<?php if($this->Admin_model->getsessioninfo('role')=="Admin")
			{ 
				?>
				<img src="<?= base_url() ?>assetsAdmin/img/<?= getCol("options","option_title","logo",'value') ?>" class="profile-thumb" alt="User Thumb">

				<?php }else{
					?>
					<img src="<?= base_url() ?>assetsAdmin/img/<?= getInfo("image") ?>" class="profile-thumb" alt="User Thumb">
					<h6 class="profile-name">ABH-<?php echo $this->Admin_model->getsessioninfo('cu_id') ?></h6>
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
							<a href="<?=base_url()?>Admin/manage_packages" aria-expanded="false" >
								<span class="has-icon">
									<i class="icon-star"></i>
								</span>
								<span class="nav-title">Packages</span>
							</a>

						</li>
						<li style="background: #FFC44F">
							<a href="#" class="has-arrow" aria-expanded="false">
								<span class="has-icon">
									<i class="icon-star"></i>
								</span>
								<span class="nav-title">Website</span>
							</a>
							<ul aria-expanded="false">
								
								<li>
									<a href='<?=base_url()?>Admin/pages'>Pages</a>
								</li>
								<li>
									<a href='<?=base_url()?>Admin/manage_slider'>Slider</a>
								</li>
								<li>
									<a href='<?=base_url()?>Admin/manage_team'>Team</a>
								</li>
								<li>
									<a href='<?=base_url()?>Admin/manage_tes'>Testimonials</a>
								</li>
								<li>
									<a href='<?=base_url()?>Admin/manage_wf'>Work Flow</a>
								</li>
								<li>
									<a href='<?=base_url()?>Admin/manage_subscriber'>Subscribers</a>
								</li>
								<li>
									<a href='<?=base_url()?>Admin/manage_queries'>Queries</a>
								</li>
								<li>
									<a href='<?=base_url()?>Admin/manage_categories'>Categories</a>
								</li>
								<li>
									<a href='<?=base_url()?>Admin/manage_services'>Services</a>
								</li>
								<li>
									<a href='<?=base_url()?>Admin/manage_gallery'>Gallery</a>
								</li>
								<li>
									<a href='<?=base_url()?>Admin/manage_settings'>Settings</a>
								</li>
							</ul>
						</li>
						
						<li>
							<a href="<?=base_url()?>Admin/manage_levelsdata" aria-expanded="false">
								<span class="has-icon">
									<i class="icon-star"></i>
								</span>
								<span class="nav-title">Levels Management</span>
							</a>

						</li>
						<li>
							<a href="<?=base_url()?>Admin/manage_admin" aria-expanded="false">
								<span class="has-icon">
									<i class="icon-star"></i>
								</span>
								<span class="nav-title">Super Admins</span>
							</a>

						</li>
						<li>
							<a href="<?=base_url()?>Admin/customers" aria-expanded="false">
								<span class="has-icon">
									<i class="icon-star"></i>
								</span>
								<span class="nav-title">Customers</span>
							</a>

						</li>
						<li>
							<a href="<?=base_url()?>Admin/incomes" aria-expanded="false">
								<span class="has-icon">
									<i class="icon-star"></i>
								</span>
								<span class="nav-title">Incomes</span>
							</a>

						</li>
						<li>
							<a href="<?=base_url()?>Admin/payments" aria-expanded="false">
								<span class="has-icon">
									<i class="icon-star"></i>
								</span>
								<span class="nav-title">Payments</span>
							</a>

						</li>
						<li>
								<a href="<?=base_url()?>Admin/efms" aria-expanded="false">
									<span class="has-icon">
										<i class="icon-star"></i>
									</span>
									<span class="nav-title">EFMS</span>
								</a>

							</li>
							<li>
								<a href="<?=base_url()?>Admin/rewards" aria-expanded="false">
									<span class="has-icon">
										<i class="icon-star"></i>
									</span>
									<span class="nav-title">Rewards</span>
								</a>

							</li>
						<li>
							<a href="<?=base_url()?>Admin/manage_soldrequests" aria-expanded="false">
								<span class="has-icon">
									<i class="icon-star"></i>
								</span>
								<span class="nav-title">Sold Packages Requests</span>
							</a>

						</li>
						<li>
							<a href="<?=base_url()?>Admin/manage_news" aria-expanded="false">
								<span class="has-icon">
									<i class="icon-star"></i>
								</span>
								<span class="nav-title">News And Updates</span>
							</a>

						</li>


						<?php }else { 
							?>
							<li>
								<a href="<?=base_url()?>Admin/manage_userdashboard?id=<?= getInfo("rcode") ?>" aria-expanded="false">
									<span class="has-icon">
										<i class="icon-star"></i>
									</span>
									<span class="nav-title">Dashboard</span>
								</a>

							</li>

							<li>
								<a href="<?=base_url()?>Main/profile" aria-expanded="false">
									<span class="has-icon">
										<i class="icon-star"></i>
									</span>
									<span class="nav-title">Profile</span>
								</a>

							</li>
							<li>
								<a href="<?=base_url()?>Admin/userteam" aria-expanded="false">
									<span class="has-icon">
										<i class="icon-star"></i>
									</span>
									<span class="nav-title">Team</span>
								</a>

							</li>
							<li>
								<a href="<?=base_url()?>Admin/incomes" aria-expanded="false">
									<span class="has-icon">
										<i class="icon-star"></i>
									</span>
									<span class="nav-title">Incomes</span>
								</a>

							</li>
							<li>
								<a href="<?=base_url()?>Admin/payments" aria-expanded="false">
									<span class="has-icon">
										<i class="icon-star"></i>
									</span>
									<span class="nav-title">Transactions</span>
								</a>

							</li>
							<li>
								<a href="<?=base_url()?>Admin/efms" aria-expanded="false">
									<span class="has-icon">
										<i class="icon-star"></i>
									</span>
									<span class="nav-title">EFMS</span>
								</a>

							</li>
							<li>
								<a href="<?=base_url()?>Admin/rewards" aria-expanded="false">
									<span class="has-icon">
										<i class="icon-star"></i>
									</span>
									<span class="nav-title">Rewards</span>
								</a>

							</li>
							<?php 

							$userreq=getRow("soldrequests",array("user_id"=>getInfo("cu_id"),"status"=>"Pending"));

							if(empty($userreq))
							{
								if(getPackageStatus(getInfo("cu_id"))=="Active")
								{
									$userpac=getRow("user_packages",array("user_id"=>getInfo("cu_id")));
									if(!empty($userpac))
									{
										$psm=getCol("options","option_title","psm",'value');
										$datev=date("Y-m",strtotime($userpac['start_date']."+".$psm." month"));
										if($datev<=date("Y-m"))
										{

											?>
											<li>
												<a href="<?=base_url()?>Admin/soldrequest" aria-expanded="false">
													<span class="has-icon">
														<i class="icon-star"></i>
													</span>
													<span class="nav-title">Sold Your Packages</span>
												</a>

											</li>

											<?php
										}
									}
								}
							}


							?>
							
							<li>
								<a href="<?=base_url()?>Main/packages" aria-expanded="false">
									<span class="has-icon">
										<i class="icon-star"></i>
									</span>
									<span class="nav-title">Upgrade Packages</span>
								</a>

							</li>
							<?php

						} ?>

					</ul>
				</nav>
			</div>
		</aside>