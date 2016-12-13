<!-- /.row -->
<div class="row">
	<div class="col-lg-12 tM-20">	
		<div class="panel panel-default">
			<div class="panel-heading">
				Order Details : <?php if(isset($order->order_id)) { echo $order->order_id; } ?>
				<a href="#" class="btn btn-info btn-xs pull-right dM-10">Create Agenda Printouts</a>
				<a href="#" class="btn btn-info btn-xs pull-right dM-10 rM-10">Create Signature Sheets</a>
			</div>
			<div class="panel-body">				
				<div class="tM-10">	
					<div class="col-lg-6">	
						<p class="bg-custom">
							<strong>Service Order ID : </strong> <?php if(isset($order->order_id)) { echo $order->order_id; } ?></br>
							<strong>PO Number : </strong> <?php if(isset($order->po_number)) { echo $order->po_number; } ?></br>
							<strong>Funding Title : </strong> <?php if(isset($order->funding_titile)) { echo $order->funding_titile; } ?></br>
							<strong>Date : </strong> <?php if(isset($order->order_date)) { echo date('d/m/Y', strtotime($order->order_date)); } ?>
						</p>
					</div>
					<div class="col-lg-6">	
						<p class="bg-custom">							
							<strong>Service Type : </strong> <?php if(isset($order->service_type)) { echo $order->service_type; } ?></br>
							<strong>Coach : </strong> <?php if(isset($order->coach)) { echo $order->coach; } ?></br>
							<strong>School : </strong> <?php if(isset($order->school)) { echo $order->school; } ?></br>
							<strong>Grade : </strong> <?php if(isset($order->eligible_grades)) { echo $order->eligible_grades; } ?>
						</p>
					</div>
				</div>
				<div class="col-lg-12 tM-30">			
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
						<li class="active"><a href="#manage-agenda" data-toggle="tab">Manage Agenda</a>
						</li>
						<li><a href="#assign-date-time" data-toggle="tab">Assign Date and Time</a>
						</li>
						<li><a href="#create-activity-log" data-toggle="tab">Create Activity Logs</a>
						</li>
						<li><a href="#track-paperwork" data-toggle="tab">Track Paperwork submission</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane fade in active" id="manage-agenda">
							<h4>Manage Agenda</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div class="tab-pane fade" id="assign-date-time">
							<h4>Assign Date and Time</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div class="tab-pane fade" id="create-activity-log">
							<h4>Create Activity Logs</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<div class="tab-pane fade" id="track-paperwork">
							<h4>Track Paperwork submission</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
