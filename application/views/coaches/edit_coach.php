<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Edit Coach</h3>
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
					<form role="form" action="" method="POST" name="update_coach_form" id="update_coach_form">	
						<div class="col-lg-12">
							<div class="col-lg-6">			
								<div class="form-group">
									<label>First Name</label>
									<input type="text" name="firstname" class="form-control" value="<?php echo isset($coach->firstname) ? $coach->firstname : '' ?>" placeholder="First Name">
									<?php if(isset($form_errors['firstname'])) { echo '<label class="error">'.$form_errors['firstname'].'</label>'; }?>
									
								</div>
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" name="lastname" class="form-control" value="<?php echo isset($coach->lastname) ? $coach->lastname : '' ?>" placeholder="Last Name">
									<?php if(isset($form_errors['lastname'])) { echo '<label class="error">'.$form_errors['lastname'].'</label>'; }?>
									
								</div>
								<div class="form-group">
									<label>Address</label>
									<input type="text" name="address" class="form-control" value="<?php echo isset($coach->address) ? $coach->address : '' ?>" placeholder="Address">
									<?php if(isset($form_errors['address'])) { echo '<label class="error">'.$form_errors['address'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>City</label>
									<input type="text" name="city" class="form-control" value="<?php echo isset($coach->city) ? $coach->city : '' ?>" placeholder="City">
									<?php if(isset($form_errors['city'])) { echo '<label class="error">'.$form_errors['city'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>State</label>
									<input type="text" name="state" class="form-control" value="<?php echo isset($coach->state) ? $coach->state : '' ?>" placeholder="State">
									<?php if(isset($form_errors['state'])) { echo '<label class="error">'.$form_errors['state'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>ZIP</label>
									<input type="text" name="zip" class="form-control" value="<?php echo isset($coach->zip) ? $coach->zip : '' ?>" placeholder="ZIP Code">
									<?php if(isset($form_errors['zip'])) { echo '<label class="error">'.$form_errors['zip'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Home Phone</label>
									<input type="text" name="home_phone" class="form-control" value="<?php echo isset($coach->home_phone) ? $coach->home_phone : '' ?>" placeholder="1234 222 333">
									<?php if(isset($form_errors['home_phone'])) { echo '<label class="error">'.$form_errors['home_phone'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Cell Phone</label>
									<input type="text" name="cell_phone" class="form-control" value="<?php echo isset($coach->cell_phone) ? $coach->cell_phone : '' ?>" placeholder="1234 222 333">
									<?php if(isset($form_errors['cell_phone'])) { echo '<label class="error">'.$form_errors['cell_phone'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>E-mail</label>
									<input type="text" name="email" readonly class="form-control" value="<?php echo isset($coach->email) ? $coach->email : '' ?>" placeholder="E-mail">
								</div>	
							</div>
							<div class="col-lg-6">						
								<div class="form-group">
									<label>Company Name</label>
									<input type="text" name="company_name" class="form-control" value="<?php echo isset($coach->company_name) ? $coach->company_name : '' ?>" placeholder="Company Name">
									<?php if(isset($form_errors['company_name'])) { echo '<label class="error">'.$form_errors['company_name'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Company Address</label>
									<input type="text" name="company_address" class="form-control" value="<?php echo isset($coach->company_address) ? $coach->company_address : '' ?>" placeholder="Company Address">
									<?php if(isset($form_errors['company_address'])) { echo '<label class="error">'.$form_errors['company_address'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Company City</label>
									<input type="text" name="company_city" class="form-control" value="<?php echo isset($coach->company_city) ? $coach->company_city : '' ?>" placeholder="Company City">
									<?php if(isset($form_errors['company_city'])) { echo '<label class="error">'.$form_errors['company_city'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Company State</label>
									<input type="text" name="company_state" class="form-control" value="<?php echo isset($coach->company_state) ? $coach->company_state : '' ?>" placeholder="Company State">
									<?php if(isset($form_errors['company_state'])) { echo '<label class="error">'.$form_errors['company_state'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Company ZIP</label>
									<input type="text" name="company_zip" class="form-control" value="<?php echo isset($coach->company_zip) ? $coach->company_zip : '' ?>" placeholder="Company ZIP">
									<?php if(isset($form_errors['company_zip'])) { echo '<label class="error">'.$form_errors['company_zip'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Company E-mail</label>
									<input type="text" name="company_email" class="form-control" value="<?php echo isset($coach->company_email) ? $coach->company_email : '' ?>" placeholder="Company E-mail">
									<?php if(isset($form_errors['company_email'])) { echo '<label class="error">'.$form_errors['company_email'].'</label>'; }?>
								</div>							
								<div class="form-group">
									<label>Billing Plan Code</label>
									<input type="text" name="billing_plan_code" class="form-control" value="<?php echo isset($coach->billing_plan_code) ? $coach->billing_plan_code : '' ?>" placeholder="Billing Plan Code">
									<?php if(isset($form_errors['billing_plan_code'])) { echo '<label class="error">'.$form_errors['billing_plan_code'].'</label>'; }?>
								</div>	
							</div>	
						</div>	
						<div class="col-lg-12">
							<div class="col-lg-6">	
								<button type="submit" name="update_coach_button" id="update_coach_button" class="btn btn-sm btn-outline btn-primary">Update</button>
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
		
		$('#update_coach_button').on('click', validateEditCoachForm);			 
		$('#update_coach_form').on('submit', validateEditCoachForm); 
		
		function validateEditCoachForm() {
			
			/* form element validation rules */ 			
			$('#update_coach_form').validate({		
				rules: {
					firstname: {	required : true	},
					lastname: {	required : true	},
					address: {	required : true	},
					city: {	required : true	},
					state: {	required : true	},
					zip: { required : true },		
					home_phone: { required : true, number : true },		
					cell_phone: { required : true, number : true },
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
					address: { required : "Please enter your address" },
					city: { required : "Please enter you city" },
					state: { required : "Please enter your state" },
					zip: { required : "Please enter your zip code" },
					home_phone: { required : "Please enter your landlne number", number : "Only numbers allowed" },
					cell_phone: { required : "Please enter your cell phone number", number : "Only numbers allowed" },
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
