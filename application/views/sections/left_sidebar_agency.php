<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">	
			<?php //if($this->session->logged_in && $this->session->user_type == 'superadmin') { ?>		
			
			<li>
				<a href="#"><i class="fa fa-file-o"></i> View Profile</span></a>
			</li>
			
			<li>
				<a href="#"><i class="fa fa-paw"></i> Menu<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="#">Section-1</a>
					</li>
					<li>
						<a href="#">Section-2</a>
		             </li>
				</ul>
			</li>
			
			<?php //} else{ redirect(base_url('login')); } ?>

		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
