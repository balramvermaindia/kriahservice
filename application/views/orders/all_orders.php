<div class="row">
	<div class="col-lg-12">		
		<h3 class="page-header">Manage Orders</h3>		 
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">	
		<div class="panel panel-default">
			<div class="panel-heading">
				All Orders 
				<a href="<?php echo base_url('new-order'); ?>" class="btn btn-xs btn-success pull-right dM-10"><i class="fa fa-plus"></i> Add New Order</a>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
			<?php /* show orders data from result */ 
				if(!empty($orders)) {  $inc = 1;
			?>
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-all-orders">
					<thead>
						<tr>
							<th>#</th>
							<th>Order ID</th>
							<th>PO Number</th>
							<th>Funding Title</th>
							<th>Service Type</th>
							<th>Date</th>
							<th>Grade</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
			<?php	foreach($orders as $order) { ?>
				
						<tr class="odd gradeX">
							<td><?php echo $inc; ?></td>
							<td><?php echo $order->order_id; ?></td>
							<td><?php echo $order->po_number; ?></td>
							<td><?php echo $order->funding_titile; ?></td>
							<td><?php echo $order->service_type; ?></td>
							<td><?php echo date('d/m/Y', strtotime($order->order_date)); ?></td>
							<td><?php echo $order->eligible_grades; ?></td>
							<td class="center">
								<a href="<?php echo base_url('order/'.$order->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>
								<a href="<?php echo base_url('edit-order/'.$order->id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                <button type="button" data-order_id="<?php echo $order->id; ?>" class="btn btn-danger btn-xs confirm-delete-order"><i class="fa fa-trash-o"></i> Delete</button>
							</td>							
						</tr>			
			<?php $inc++;	} ?>
					</tbody>
				</table>
				<!-- /.table-responsive -->	
			<?php } else { ?>
				<p>No Order found !!</p>
			<?php } ?>				
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- Delete Order Confirmation alert box start -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteOrderBox">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-left">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Confirm your Action</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this Order ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="deleteOrderButton" data-orderid="">Delete</button>
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>					
			</div>
		</div>
	</div>
</div>
<!-- /.Delete Order Confirmation alert box -->

<script type="text/javascript">
	$(document).ready( function() {
		// data tables jquery design
		$('#dataTables-all-orders').DataTable({
			responsive: true
		});
		// show delete order dailog box
		$('.confirm-delete-order').click(function(){
			$('#deleteOrderButton').attr('data-orderid', $(this).attr('data-order_id'));
			$('#deleteOrderBox').modal('show');			
		});
		
		// Delete an Order
		$(document).off('click','#deleteOrderButton').on('click','#deleteOrderButton',function(e){	
			$('#deleteOrderBox').modal('hide');			
			var order_id = $(this).attr('data-orderid');
						
			$.ajax({
				'type'    :'get',
				'data'    : { id : order_id },
				'dataType': 'json',
				'url'     : '<?php echo base_url('delete-order'); ?>',
				success   : function(response) {
					
					if(response.status == 'success'){						
						location.reload();
					} else {
						alert('Order not deleted, try again');	
					}
				}
			}); 
		});
		
	});
</script>
