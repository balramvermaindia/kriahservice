<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Edit Agency</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">	
		<div class="panel panel-default">
			<div class="panel-heading">
				Fill agency Details
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<form role="form" name="edit_agency_form" id="edit_agency_form" action="" method="post">				
							<div class="form-group">
								<label>Agency Name</label>
								<input type="text" name="agency" id="agency" value="<?php echo isset($agencyData->name) ? $agencyData->name : '' ?>" class="form-control" placeholder="Agency">
									<?php if(isset($form_errors['agency'])) { echo '<label class="error">'.$form_errors['agency'].'</label>'; }?>
							</div>
							<div class="form-group">
								<label>Service Type</label>
								<select name="service" id="service" class="form-control">
									<option value="<?php echo isset($agencyData->service_type) ? $agencyData->service_type : '' ?>"><?php echo isset($agencyData->service_type) ? $agencyData->service_type : '' ?></option>
									<option value="">Select Service</option>
									<option value="Education">Education</option>
									<option value="Information">Information</option>
									<option value="Unconditional">Unconditional</option>
								</select>
							</div>
							<div class="form-group">
								<label>Department</label>
								<select name="department" id="department" class="form-control">
									<option value="<?php echo isset($agencyData->department) ? $agencyData->department : '' ?>"><?php echo isset($agencyData->department) ? $agencyData->department : '' ?></option>
									<option value="">Select Department</option>
									<option value="Department 1">Department 1</option>
									<option value="Department 2">Department 2</option>
									<option value="Department 3">Department 3</option>
								</select>
							</div>
							<div class="form-group">
								<label>Assign User</label>
								<select name="assign_User" id="assign_User" class="form-control">
                                       <option value="">Select User</option>
									<?php foreach($userData as $row) { ?>
										<option value="<?php echo $row['username']; ?>" <?php if($row['username'] == $agencyData->assigned_user){ echo "selected";}?>>
										<?php echo $row['username']; ?></option>
									<?php }?>	
								</select>
							</div>
							<div class="form-group">
								<label>Contact Number</label>
								<input type="text" name="phone" id="phone" value="<?php echo isset($agencyData->phone) ? $agencyData->phone : '' ?>" class="form-control" placeholder="phone">
									<?php if(isset($form_errors['phone'])) { echo '<label class="error">'.$form_errors['phone'].'</label>'; }?>
							</div>	
							<div class="form-group">
								<label>Email ID</label>
								<input type="text" name="email" id="email" readonly value="<?php echo isset($agencyData->email) ? $agencyData->email : '' ?>" class="form-control" placeholder="email">
							</div>			
							
							<button type="submit" id="edit_agency_button" class="btn btn-sm btn-outline btn-primary">Update</button>
							<a href="<?php echo base_url('agencies'); ?>" class="btn btn-sm btn-outline btn-default">Cancel</a>
						</form>
					</div>
					<!-- /.col-lg-6 (nested) -->
					<div class="col-lg-6">
					</div>
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
		$('#edit_agency_button').on('click', validateNewOrderForm); 
		$('#edit_agency_form').on('submit', validateNewOrderForm); 
		
		function validateNewOrderForm() {
			//alert('hiiii');
			/* form element validation rules */ 			
			$('#edit_agency_form').validate({		
				rules: {
					agency: { required : true },
					service: {	required : true	},
				    department: {	required : true	},
					assign_User: {	required : true	},
					phone: { required : true, number :true, minlength: 10, maxlength: 11 },
					email: { 
						required : true,
						email : true,
					 },
				},
				messages: {  // validation messages
					agency: { required : "Please enter Agency name" },
					service: { required : "Please select service" },
					department: { required : "Please select department" },
					assign_User: { required : "Please select User" },
					phone: { required : "Please enter contact no" },
					email: { 
						required : "Please enter email", 
						email : "Please enter valid email" 
					}
				}
			});
		}
			
	});
</script>
