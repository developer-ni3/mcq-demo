<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?= base_url('admin/dashboard') ?>" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							MCQ - Demo
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal" style="line-height: 58px; height: 60px;">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?= base_url('assets/admin/images/avatars/avatar2.png'); ?>" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?= $this->session->userdata('name'); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							    <!-- <li>
									<a href="<?= base_url('admin/user/changePassword'); ?>">
										<i class="ace-icon fa fa-lock"></i>
										Change Password
									</a>
								</li> -->
								<li>
									<a href="<?= base_url('admin/admin/logout'); ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>