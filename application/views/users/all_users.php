<div class="row">
	<div class="col-lg-12">		
		<h3 class="page-header">Manage Admin Users</h3>				 
	</div>	
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">	
		<div class="panel panel-default">
			<div class="panel-heading">
				All Admin Users 
				<a href="<?php echo base_url('new-user'); ?>" class="btn btn-xs btn-success pull-right dM-10"><i class="fa fa-plus"></i> Add Admin User</a>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
			<?php /* show users data from result */ 
				if(!empty($users)) {  $inc = 1;
			?>
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-all-users">
					<thead>
						<tr>
							<th>#</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Contact no</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
			<?php	foreach($users as $user) { ?>
				
						<tr class="odd gradeX">
							<td><?php echo $inc; ?></td>
							<td><?php echo $user->firstname; ?></td>
							<td><?php echo $user->lastname; ?></td>
							<td><?php echo $user->email; ?></td>
							<td><?php echo $user->phone; ?></td>
							
							<?php 
									if($user->status=='0'){
										$active="Activate";
										$iclass="fa-unlock";
										$style="green";
									}else{
										$active="Inactivate";
										$iclass="fa-lock";
										$style="red";
									}
							 ?>
							
							<td class="center">
								<a class="btn btn-info btn-xs change-status"  href="<?php echo base_url('user/change_status/'.$user->id.'/'.$user->status); ?>" style="background-color:<?php echo $style;?>" class='change-status'><i class="fa <?php echo $iclass; ?> fa-fw"></i> <?php echo $active; ?></a>
								<a href="<?php echo base_url('edit-user/'.$user->id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                <button type="button" data-user_id="<?php echo $user->id; ?>" class="btn btn-danger btn-xs confirm-delete-user"><i class="fa fa-trash-o"></i> Delete</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="deleteUserBox">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-left">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Confirm your Action</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this User ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="deleteUserButton" data-userid="">Delete</button>
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>					
			</div>
		</div>
	</div>
</div>
<!-- /.Delete Order Confirmation alert box -->

<script type="text/javascript">
	$(document).ready( function() {
		// data tables jquery design
		$('#dataTables-all-users').DataTable({
			responsive: true
		});
		// show delete order dailog box
		$('.confirm-delete-user').click(function(){
			$('#deleteUserButton').attr('data-userid', $(this).attr('data-user_id'));
			$('#deleteUserBox').modal('show');			
		});
		
		// Delete an Order
		$(document).off('click','#deleteUserButton').on('click','#deleteUserButton',function(e){	
			$('#deleteUserBox').modal('hide');			
			var user_id = $(this).attr('data-userid');
						
			$.ajax({
				'type'    :'get',
				'data'    : { id : user_id },
				'dataType': 'json',
				'url'     : '<?php echo base_url('delete-user'); ?>',
				success   : function(response) {
					
					if(response.status == 'success'){						
						location.reload();
					} else {
						alert('User not deleted, try again');	
					}
				}
			}); 
		});
	});
</script>
