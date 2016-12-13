<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Edit Order</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">	
		<div class="panel panel-default">
			<div class="panel-heading">
				Fill Order Details
			</div>
			<div class="panel-body">
				<div class="row">
					<form role="form" action="" method="POST" name="order_update_form" id="order_update_form">	
						<div class="col-lg-12">	
							<div class="col-lg-6">			
								<div class="form-group">
									<label>Service Order ID</label>									
									<input type="text" class="form-control" name="service_order_id" value="<?php echo isset($order->order_id) ? $order->order_id : '' ?>" placeholder="Enter Order ID">
									<?php if(isset($form_errors['service_order_id'])) { echo '<label class="error">'.$form_errors['service_order_id'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>PO Number</label>
									<input type="text" class="form-control" name="po_number" value="<?php echo isset($order->po_number) ? $order->po_number : '' ?>" placeholder="Enter PO Number">
									<?php if(isset($form_errors['po_number'])) { echo '<label class="error">'.$form_errors['po_number'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Funding Title</label>
									<input type="text" class="form-control" name="funding_title" value="<?php echo isset($order->funding_titile) ? $order->funding_titile : '' ?>" placeholder="Enter Funding Title">
									<?php if(isset($form_errors['funding_title'])) { echo '<label class="error">'.$form_errors['funding_title'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Date</label>
									<input type="text" class="form-control" name="order_date" value="<?php echo isset($order->order_date) ? date('d/m/Y', strtotime($order->order_date)) : '' ?>" id="order_date">
									<?php if(isset($form_errors['order_date'])) { echo '<label class="error">'.$form_errors['order_date'].'</label>'; }?>	
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Service Type</label>
									<select class="form-control" name="service_type">
										<option value="">Select Type</option>
										<option value="1">TYPE 1</option>
										<option value="2">TYPE 2</option>
										<option value="3">TYPE 3</option>
									</select>
									<?php if(isset($form_errors['service_type'])) { echo '<label class="error">'.$form_errors['service_type'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Coach</label>
									<select class="form-control" name="coach_id">
										<option value="">Select Coach</option>
										<option value="1">Coach 1</option>
										<option value="2">Coach 2</option>
										<option value="3">Coach 3</option>
									</select>
									<?php if(isset($form_errors['coach_id'])) { echo '<label class="error">'.$form_errors['coach_id'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>School</label>
									<select class="form-control" name="school_id">
										<option value="">Select School</option>
										<option value="1">School 1</option>
										<option value="2">School 2</option>
										<option value="3">School 3</option>
									</select>
									<?php if(isset($form_errors['school_id'])) { echo '<label class="error">'.$form_errors['school_id'].'</label>'; }?>
								</div>
								<div class="form-group">
									<label>Eligible Grades</label>
									<select class="form-control" name="eligble_grades">
										<option value="">Select Grade</option>
										<option value="1">Grade A</option>
										<option value="2">Grade B</option>
										<option value="3">Grade C</option>
									</select>
									<?php if(isset($form_errors['eligble_grades'])) { echo '<label class="error">'.$form_errors['eligble_grades'].'</label>'; }?>
								</div>
							</div>
						</div>
						<div class="col-lg-12">	
							<div class="col-lg-6">	
								<button type="submit" name="order_update_button" id="order_update_button" class="btn btn-sm btn-outline btn-primary">Update</button>
								<a href="<?php echo base_url('orders'); ?>" class="btn btn-sm btn-outline btn-default">Cancel</a>
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
	$(function () {
		$('#order_date').datepicker();
		$("#order_date").datepicker( "option", "dateFormat", 'dd-mm-yy');
		$( "#order_date" ).datepicker({  maxDate: new Date() });
		$( "#order_date" ).datepicker( "setDate", "<?php if(isset($order->order_date)) { echo date('d-m-Y', strtotime($order->order_date)); } ?>" );
	});
	
	$(document).ready( function() {
		/* new order form validation */
		$('#order_update_button').on('click', validateUpdateOrderForm); 
		$('#order_update_form').on('submit', validateUpdateOrderForm); 
		
		function validateUpdateOrderForm() {
			
			/* form element validation rules */ 			
			$('#order_update_form').validate({		
				rules: {
					service_order_id: {	required : true	},
					po_number: {	required : true	},
					funding_title: {	required : true	},
					order_date: {	required : true	},
					service_type: { required : true },		
					coach_id: { required : true },		
					school_id: { required : true },		
					eligble_grades: { required : true }		
				},
				messages: {  // validation messages
					service_order_id: { required : "Please enter service order ID" },
					po_number: { required : "Please enter po number" },
					funding_title: { required : "Please enter funding title" },
					order_date: { required : "Please select date and time" },
					service_type: { required : "Please select a service" },
					coach_id: { required : "Please select a coach" },
					school_id: { required : "Please select a school" },
					eligble_grades: { required : "Please select grades" }
				}
			});
		}
			
	});
</script>
