<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">	
			<?php //if($this->session->logged_in && $this->session->user_type == 'superadmin') { ?>		
			<li>
				<a href="<?php echo base_url('/'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-user"></i> Manage Admin Users<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?php echo base_url('users');  ?>">All Admin Users</a>
					</li>
					<li>
						<a href="<?php echo base_url('new-user');  ?>">Add Admin User</a>
					</li>
				</ul>
			</li>	
			<li>
				<a href="#"><i class="fa fa-user"></i> Manage Coaches<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?php echo base_url('coaches');  ?>">All Coaches</a>
					</li>
					<li>
						<a href="<?php echo base_url('new-coach');  ?>">Add New Coach</a>
					</li>
				</ul>
			</li>	
			<li>
				<a href="#"><i class="fa fa-list-alt"></i> Manage Orders<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?php echo base_url('orders');  ?>">All Order</a>
					</li>
					<li>
						<a href="<?php echo base_url('new-order');  ?>">Add New Order</a>
					</li>
				</ul>
				<!-- /.nav-second-level -->
			</li>			
			<li>
				<a href="#"><i class="fa fa-bank"></i> Manage Agencies<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="<?php echo base_url('agencies');  ?>">All Agencies</a>
					</li>
					<li>
						<a href="<?php echo base_url('new-agency');  ?>">Add New Agency</a>
					</li>
				</ul>
			</li>	
			<li>
				<a href="#"><i class="fa fa-cubes"></i> Manage Strategies</span></a>
			</li>			
			<li>
				<a href="#"><i class="fa fa-credit-card"></i> Billing</a>
			</li>
			<li>
				<a href="<?php echo base_url('reports');  ?>"><i class="fa fa-file-o"></i> Reports</span></a>
			</li>
				
			<?php //} else{ redirect(base_url('login')); } ?>
		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
