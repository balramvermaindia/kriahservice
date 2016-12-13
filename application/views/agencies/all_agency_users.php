<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Manage Agency Users</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">	
		<div class="panel panel-default">
			<div class="panel-heading">
				All Agency Users 
				<?php if(!empty($agency_id)) {  ?>
				<a href="<?php echo base_url('new-agency-user/'.$agency_id); ?>" class="btn btn-xs btn-success pull-right dM-10"><i class="fa fa-plus"></i> Add Agency User</a>
				<?php  }?>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-all-agency-users">
					<thead>
						<tr>
							<th>#</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>

						<?php $count = 1;?>
						<?php if(!empty($agency_users)) { foreach($agency_users as $value) {?>
						<tr class="odd gradeX">
							<td><?php echo $count++; ?></td>
							<td><?php echo $value['firstname']; ?></td>
							<td><?php echo $value['lastname']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td><?php echo $value['phone']; ?></td>
						
						
						<?php 
									if($value['status'] == '0'){
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
								<a class="btn btn-info btn-xs change-status"  href="<?php echo base_url('kriah/change_agency_user_status/'.$value['user_id'].'/'.$value['status'].'/'.$value['agency_id']); ?>" style="background-color:<?php echo $style;?>" class='change-status'><i class="fa <?php echo $iclass; ?> fa-fw"></i> <?php echo $active; ?></a>
								<a href="<?php echo base_url('edit-agency-user/'.$value['user_id'].'/'.$value['agency_id']); ?>" type="button" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                <button type="button" data-agencyuser_id="<?php echo $value['user_id']; ?>" class="btn btn-danger btn-xs confirm-delete-agency-user"><i class="fa fa-trash-o"></i> Delete</button>
                       
                         	</td>		
								
						<?php } } ?>
                       </tr>	
					</tbody>
				</table>
				<!-- /.table-responsive -->				
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- Delete Agency Confirmation alert box start -->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteAgencyBox">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-left">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Confirm your Action</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this Agency ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="deleteAgencyUserButton" data-url="">Delete</button>
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>					
			</div>
		</div>
	</div>
</div>
<!-- /.Delete Order Confirmation alert box -->

<script typ="text/javascript">
	/* custom jquery */
	$(document).ready(function() {
		$('#dataTables-all-agency-users').DataTable({
			responsive: true
		});	
		// show delete agency dailog box
		$('.confirm-delete-agency-user').click(function(){
			$('#deleteAgencyUserButton').attr('data-agencyid', $(this).attr('data-agencyuser_id'));
			$('#deleteAgencyBox').modal('show');
		});
		
		$(document).off('click','#deleteAgencyUserButton').on('click','#deleteAgencyUserButton',function(e){	
			$('#deleteAgencyBox').modal('hide');			
			var agency_id = $(this).attr('data-agencyid');
						
			$.ajax({
				'type'    :'get',
				'data'    : { id : agency_id },
				'dataType': 'json',
				'url'     : '<?php echo base_url('delete-agency-user'); ?>',
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

