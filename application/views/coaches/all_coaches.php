<div class="row">
	<div class="col-lg-12">		
		<h3 class="page-header">Manage Coaches</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">	
		<div class="panel panel-default">
			<div class="panel-heading">
				All Coaches 
				<a href="<?php echo base_url('new-coach'); ?>" class="btn btn-xs btn-success pull-right dM-10"><i class="fa fa-plus"></i> Add New Coach</a>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
			<?php /* show users data from result */ 
				if(!empty($coaches)) {  $inc = 1;
			?>	
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-all-coaches">
					<thead>
						<tr>
							<th>First Name</th>				
							<th>Last Name</th>			
							<th>E-mail</th>							
							<th>Address</th>
							<th>Company Name</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>	
			<?php	foreach($coaches as $coach) { ?>							
						<tr class="odd gradeX">
							<td><?php echo $coach->firstname; ?></td>
							<td><?php echo $coach->lastname; ?></td>							
							<td><?php echo $coach->email; ?></td>
							<td class="center"><?php echo $coach->address; ?></td>
							<td><?php echo $coach->company_name; ?></td>
							
							<?php 
									if($coach->status=='0'){
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
								<a class="btn btn-info btn-xs change-status"  href="<?php echo base_url('coach/change_status/'.$coach->user_id.'/'.$coach->status); ?>" style="background-color:<?php echo $style;?>" class='change-status'><i class="fa <?php echo $iclass; ?> fa-fw"></i> <?php echo $active; ?></a>
								<a href="<?php echo base_url('edit-coach/'.$coach->id); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                <button type="button" data-coach_id="<?php echo $coach->id; ?>" class="btn btn-danger btn-xs confirm-delete-user"><i class="fa fa-trash-o"></i> Delete</button>
							</td>							
						</tr>	
			<?php 	} ?>						
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
<div class="modal fade" tabindex="-1" role="dialog" id="deleteCoachBox">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-left">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Confirm your Action</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this Coach ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="deleteCoachButton" data-coachid="">Delete</button>
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>					
			</div>
		</div>
	</div>
</div>
<!-- /.Delete Order Confirmation alert box -->
<script typ="text/javascript">
	/* custom jquery */
	$(document).ready(function() {
		$('#dataTables-all-coaches').DataTable({
			responsive: true
		});
		// show delete user dailog box
		$('.confirm-delete-user').click(function(){
			$('#deleteCoachButton').attr('data-coachid', $(this).attr('data-coach_id'));
			$('#deleteCoachBox').modal('show');
		});
		// Delete an User
		$(document).off('click','#deleteCoachButton').on('click','#deleteCoachButton',function(e){					
			var coach_id = $(this).attr('data-coachid');
						
			$.ajax({
				'type'    :'get',
				'data'    : { id : coach_id },
				'dataType': 'json',
				'url'     : '<?php echo base_url('delete-coach'); ?>',
				success   : function(response) {
					
					if(response.status == 'success'){
						$('#deleteCoachBox').modal('hide');	// close the alert box
						$('.modal-backdrop').remove();	
						$('body').removeClass('modal-open');							
						location.reload();   // reload page
					} else {
						alert('Coach not deleted, try again');	
					}
				}
			}); 
		});
	});
</script>
