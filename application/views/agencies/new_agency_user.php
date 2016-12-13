<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Add Agency User</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">	
		<div class="panel panel-default">
			<div class="panel-heading">
				Fill Agency User Details
			</div>
			<div class="panel-body">
				<div class="row">									
					<form role="form" action="<?php echo base_url('new-agency-user/'.$ag_id); ?>" method="POST" name="new_agency_user_form" id="new_agency_user_form">	
						<div class="col-lg-12">	
							<div class="col-lg-6">			
								<div class="form-group">
									<input type="hidden" name="agency_id" id="agency_id" value="<?php echo $ag_id;?>">
									<label>First Name*</label>
									<input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" class="form-control" placeholder="First Name">
									<?php if(isset($form_errors['firstname'])) { echo '<label class="error">'.$form_errors['firstname'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Last Name*</label>
									<input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" class="form-control" placeholder="Last Name">
									<?php if(isset($form_errors['lastname'])) { echo '<label class="error">'.$form_errors['lastname'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Username*</label>
									<input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Username">
									<?php if(isset($form_errors['username'])) { echo '<label class="error">'.$form_errors['username'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Password*</label>
									<input type="text" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password">
									<?php if(isset($form_errors['password'])) { echo '<label class="error">'.$form_errors['password'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Email*</label>
									<input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email">
									<?php if(isset($form_errors['email'])) { echo '<label class="error">'.$form_errors['email'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input type="text" name="phone" value="<?php echo set_value('phone'); ?>" class="form-control" placeholder="Contact no">
									<?php if(isset($form_errors['phone'])) { echo '<label class="error">'.$form_errors['phone'].'</label>'; }?>
								</div>
								
							</div>
						</div>
						<div class="col-lg-12">	
							<div class="col-lg-6">	
								<button type="submit" id="new_agency_user_button" class="btn btn-sm btn-outline btn-primary">Save</button>
								<a href="<?php echo base_url('manage-agency-users/'.$ag_id); ?>" class="btn btn-sm btn-outline btn-default">Cancel</a>
							</div>
						</div>
					</form>
				</div>
				<!-- /.row (nested) -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<script type="text/javascript">
	
	$(document).ready( function() {
		/* new order form validation */
		$('#new_agency_user_button').on('click', validateNewOrderForm); 
		$('#new_agency_user_form').on('submit', validateNewOrderForm); 
		
		function validateNewOrderForm() {
			
			/* form element validation rules */ 			
			$('#new_agency_user_form').validate({		
				rules: {
					firstname: { required : true },
					lastname: {	required : true	},
				    username: {	required : true	},
					password: {	required : true	},
					email: { 
						required : true,
						email : true,
						remote: {
							url: "<?php echo base_url('check-agencyUser-email') ?>",
							type: "get"
						}
					 },
					phone: { required : true, number :true, minlength: 10, maxlength: 11 },
				},
				messages: {  // validation messages
					firstname: { required : "Please enter first name" },
					lastname: { required : "Please enter last name" },
					username: { required : "Please enter username name" },
					password: { required : "Please enter password" },
					email: { 
						required : "Please enter email", 
						email : "Please enter valid email" ,
						remote : "The email has already been taken" 
					},
					phone: { required : "Please enter contact no" },
				
				}
			});
		}
			
	});
</script>
