<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Edit Admin User</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">	
		<div class="panel panel-default">
			<div class="panel-heading">
				Edit Admin Details
			</div>
			<div class="panel-body">
				<div class="row">									
					<form role="form" action="" method="POST" name="edit_user_form" id="edit_user_form">	
						<div class="col-lg-12">	
							<div class="col-lg-6">			
								<div class="form-group">
									<label>First Name*</label>
									<input type="text" name="firstname" value="<?php echo isset($user->firstname) ? $user->firstname : '' ?>" class="form-control" placeholder="First Name">
									<?php if(isset($form_errors['firstname'])) { echo '<label class="error">'.$form_errors['firstname'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Last Name*</label>
									<input type="text" name="lastname" value="<?php echo isset($user->lastname) ? $user->lastname : '' ?>" class="form-control" placeholder="Last Name">
									<?php if(isset($form_errors['lastname'])) { echo '<label class="error">'.$form_errors['lastname'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Email*</label>
									<input type="text" name="email" readonly value="<?php echo isset($user->email) ? $user->email : '' ?>" class="form-control" placeholder="Email">
									<?php if(isset($form_errors['email'])) { echo '<label class="error">'.$form_errors['email'].'</label>'; }?>
								</div>								
								<div class="form-group">
									<label>Phone</label>
									<input type="text" name="phone" value="<?php echo isset($user->phone) ? $user->phone : '' ?>" class="form-control" placeholder="Contact no">
									<?php if(isset($form_errors['phone'])) { echo '<label class="error">'.$form_errors['phone'].'</label>'; }?>
								</div>
									
							</div>
						</div>
						<div class="col-lg-12">	
							<div class="col-lg-6">	
								<button type="submit" name="edit_user_button" id="edit_user_button" class="btn btn-sm btn-outline btn-primary">Update</button>
								<a href="<?php echo base_url('users'); ?>" class="btn btn-sm btn-outline btn-default">Cancel</a>
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
		$('#edit_user_button').on('click', validateNewOrderForm); 
		$('#edit_user_form').on('submit', validateNewOrderForm); 
		
		function validateNewOrderForm() {
			
			/* form element validation rules */ 			
			$('#edit_user_form').validate({		
				rules: {
					firstname: { required : true },
					lastname: {	required : true	},
					phone: { required : true, number :true, minlength: 10, maxlength: 11 }
				},
				messages: {  // validation messages
					firstname: { required : "Please enter first name" },
					lastname: { required : "Please enter last name" },
					phone: { required : "Please enter contact no" }
				}
			});
		}
			
	});
</script>
