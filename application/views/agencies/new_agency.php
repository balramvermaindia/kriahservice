<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Add New Agency</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">	
		<div class="panel panel-default">
			<div class="panel-heading">
				Fill Agency Details
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<form name="new_Agency_Form" id="new_Agency_Form" role="form" action="" method="post">				
							<div class="form-group">
								<label>Agency Name*</label>
								<input class="form-control" name="agency" id="agency" placeholder="Agency Name">
							</div>
							<div class="form-group">
								<label>Service Type*</label>
								<select name="service" id="service" class="form-control">
									<option value="">Select Service Type</option>
									<option value="Education">Education</option>
									<option value="Information">Information</option>
									<option value="Unconditional">Unconditional</option>
								</select>
							</div>
							<div class="form-group">
								<label>Department*</label>
								<select name="department" id= "department" class="form-control">
									<option value="">Select Department</option>
									<option value="Department 1">Department 1</option>
									<option value="Department 2">Department 2</option>
									<option value="Department 3">Department 3</option>
								</select>
							</div>
							<div class="form-group">
								<label>Assigned User*</label>
								<select name="assign_User" id="assign_User" class="form-control">
									<option value="">Select User</option>
									<?php if(!empty($userData)) { foreach($userData as $value) { ?>
									<option value="<?php echo $value['username']; ?>"><?php echo $value['username']; ?></option>
									<?php } }?>
								</select>
							</div>
							<div class="form-group">
								<label>Contact Number*</label>
								<input type="text" class="form-control" name="phone" id="phone" placeholder="1234 333 4544">
							</div>	
							<div class="form-group">
								<label>Email ID*</label>
								<input type="text" class="form-control" name="email" id="email" placeholder="abc@mail.com">
							</div>
							<button type="submit"   id="new_agency_button" class="btn btn-sm btn-outline btn-primary">Save</button>
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
		$('#new_agency_button').on('click', validateNewOrderForm); 
		$('#new_Agency_Form').on('submit', validateNewOrderForm); 
		
		function validateNewOrderForm() {
			//alert('hiiii');
			/* form element validation rules */ 			
			$('#new_Agency_Form').validate({		
				rules: {
					agency: { required : true },
					service: {	required : true	},
				    department: {	required : true	},
					assign_User: {	required : true	},
					phone: { required : true, number :true, minlength: 10, maxlength: 11 },
					email: { 
						required : true,
						email : true,
						remote: {
							url: "<?php echo base_url('check-agencyUser-email') ?>",
							type: "get"
						}
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
						email : "Please enter valid email" ,
						remote : "The email has already been taken" 
					}
				}
			});
		}
			
	});
</script>
