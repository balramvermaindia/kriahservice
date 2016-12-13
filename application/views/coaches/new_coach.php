<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Add New Coach</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">	
		<div class="panel panel-default">
			<div class="panel-heading">
				Fill Coach Details
			</div>
			<div class="panel-body">
				<div class="row">					
					<form role="form" action="" method="POST" name="new_coach_form" id="new_coach_form">	
						<div class="col-lg-12">
							<div class="col-lg-6">			
								<div class="form-group">
									<label>First Name*</label>
									<input type="text" name="firstname" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="First Name">
									<?php if(isset($form_errors['firstname'])) { echo '<label class="error">'.$form_errors['firstname'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Last Name*</label>
									<input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" class="form-control" placeholder="Last Name">
									<?php if(isset($form_errors['lastname'])) { echo '<label class="error">'.$form_errors['lastname'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>User Name*</label>
									<input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="User Name">
									<?php if(isset($form_errors['username'])) { echo '<label class="error">'.$form_errors['username'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Password*</label>
									<input type="text" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="password">
									<?php if(isset($form_errors['password'])) { echo '<label class="error">'.$form_errors['pasword'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Address</label>
									<input type="text" name="address" value="<?php echo set_value('address'); ?>" class="form-control" placeholder="Address">
									<?php if(isset($form_errors['address'])) { echo '<label class="error">'.$form_errors['address'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>City</label>
									<input type="text" name="city" value="<?php echo set_value('city'); ?>" class="form-control" placeholder="City">
									<?php if(isset($form_errors['city'])) { echo '<label class="error">'.$form_errors['city'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>State</label>
									<input type="text" name="state" value="<?php echo set_value('state'); ?>" class="form-control" placeholder="State">
									<?php if(isset($form_errors['state'])) { echo '<label class="error">'.$form_errors['state'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>ZIP</label>
									<input type="text" name="zip" value="<?php echo set_value('zip'); ?>" class="form-control" placeholder="ZIP Code">
									<?php if(isset($form_errors['zip'])) { echo '<label class="error">'.$form_errors['zip'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Home Phone</label>
									<input type="text" name="home_phone" value="<?php echo set_value('home_phone'); ?>" class="form-control" placeholder="1234 222 333">
									<?php if(isset($form_errors['home_phone'])) { echo '<label class="error">'.$form_errors['home_phone'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Cell Phone*</label>
									<input type="text" name="cell_phone" value="<?php echo set_value('cell_phone'); ?>" class="form-control" placeholder="1234 222 333">
									<?php if(isset($form_errors['cell_phone'])) { echo '<label class="error">'.$form_errors['cell_phone'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>E-mail*</label>
									<input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="E-mail">
									<?php if(isset($form_errors['email'])) { echo '<label class="error">'.$form_errors['email'].'</label>'; }?>
								</div>	
							</div>
							<div class="col-lg-6">						
								<div class="form-group">
									<label>Company Name</label>
									<input type="text" name="company_name" value="<?php echo set_value('company_name'); ?>" class="form-control" placeholder="Company Name">
									<?php if(isset($form_errors['company_name'])) { echo '<label class="error">'.$form_errors['company_name'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Company Address</label>
									<input type="text" name="company_address" value="<?php echo set_value('company_address'); ?>" class="form-control" placeholder="Company Address">
									<?php if(isset($form_errors['company_address'])) { echo '<label class="error">'.$form_errors['company_address'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Company City</label>
									<input type="text" name="company_city" value="<?php echo set_value('company_city'); ?>" class="form-control" placeholder="Company City">
									<?php if(isset($form_errors['company_city'])) { echo '<label class="error">'.$form_errors['company_city'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Company State</label>
									<input type="text" name="company_state" value="<?php echo set_value('company_state'); ?>" class="form-control" placeholder="Company State">
									<?php if(isset($form_errors['company_state'])) { echo '<label class="error">'.$form_errors['company_state'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Company ZIP</label>
									<input type="text" name="company_zip" value="<?php echo set_value('company_zip'); ?>" class="form-control" placeholder="Company ZIP">
									<?php if(isset($form_errors['company_zip'])) { echo '<label class="error">'.$form_errors['company_zip'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Company E-mail</label>
									<input type="text" name="company_email" value="<?php echo set_value('company_email'); ?>" class="form-control" placeholder="Company E-mail">
									<?php if(isset($form_errors['company_email'])) { echo '<label class="error">'.$form_errors['company_email'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Billing Plan Code*</label>
									<input type="text" name="billing_plan_code" value="<?php echo set_value('billing_plan_code'); ?>" class="form-control" placeholder="Billing Plan Code">
									<?php if(isset($form_errors['billing_plan_code'])) { echo '<label class="error">'.$form_errors['billing_plan_code'].'</label>'; }?>
								</div>	
							</div>	
						</div>	
						<div class="col-lg-12">
							<div class="col-lg-6">	
								<button type="submit" name="add_coach_button" id="add_coach_button" class="btn btn-sm btn-outline btn-primary">Save</button>
								<a href="<?php echo base_url('coaches'); ?>" class="btn btn-sm btn-outline btn-default">Cancel</a>
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
		
		$('#add_coach_button').on('click', validateNewCoachForm);			 
		$('#new_coach_form').on('submit', validateNewCoachForm); 
		
		function validateNewCoachForm() {
			
			/* form element validation rules */ 			
			$('#new_coach_form').validate({		
				rules: {
					firstname: {	required : true	},
					lastname: {	required : true	},
					username: {	required : true	},
					password: {	required : true	},
					address: {	required : true	},
					city: {	required : true	},
					state: {	required : true	},
					zip: { required : true },		
					home_phone: { required : true, number : true },		
					cell_phone: { required : true, number : true },		
					email: { 
						required : true ,
						email : true,
						remote: {
							url: "<?php echo base_url('check-email') ?>",
							type: "get"
						  }
					},		
					company_name: { required : true },		
					company_address: { required : true },		
					company_city: { required : true },		
					company_state: { required : true },		
					company_zip: { required : true },		
					company_email: { required : true, email : true },		
					billing_plan_code: { required : true }		
				},
				messages: {  // validation messages
					firstname: { required : "Please enter first name" },
					lastname: { required : "Please enter last name" },
					username: { required : "Please enter user name" },
					password: { required : "Please enter password" },
					address: { required : "Please enter your address" },
					city: { required : "Please enter you city" },
					state: { required : "Please enter your state" },
					zip: { required : "Please enter your zip code" },
					home_phone: { required : "Please enter your landlne number", number : "Only numbers allowed" },
					cell_phone: { required : "Please enter your cell phone number", number : "Only numbers allowed" },
					email: { 
						required : "Please enter your email", 
						email : "Please enten valid email",
						remote : "The email has already been taken" 
					},
					company_name: { required : "Please enter company name" },
					company_address: { required : "Please enter company address" },
					company_city: { required : "Please enter company city" },
					company_state: { required : "Please enter company state" },
					company_zip: { required : "Please enter company zip" },
					company_email: { required : "Please enter company email", email : "Please enten valid email" },
					billing_plan_code: { required : "Please enter billing plan code" }
				}
			});
		}
	});
</script>
