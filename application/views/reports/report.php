<!-- /.row -->
<div class="row">
	<div class="col-lg-12 tM-20">	
		<div class="panel panel-default">
			<div class="panel-heading">
				Reports
			</div>
			<div class="panel-body">	
				<div class="col-lg-12">			
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
						<li class="active"><a href="#agenda-details" data-toggle="tab">Agenda Details</a>
						</li>
						<li><a href="#activity-log" data-toggle="tab">Activity Log</a>
						</li>
						<li><a href="#doi-sign-in" data-toggle="tab">DOI Sign In</a>
						</li>
						<li><a href="#principal-signature" data-toggle="tab">Principal Signature</a>
						</li>
						<li><a href="#session-invoice-coach" data-toggle="tab">Session Invoice (Coach)</a>
						</li>
						<li><a href="#session-invoice-scholastic" data-toggle="tab">Session invoice (Scholastic)</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane fade in active" id="agenda-details">
							<a href="<?php echo base_url('agenda-details'); ?>" title="" class="btn btn-primary btn-sm tM-10 pull-right" >Download Report</a>
							<?php echo $agenda_details; ?>
						</div>
						<div class="tab-pane fade" id="activity-log">
							<a href="<?php echo base_url('activity-log'); ?>" title="" class="btn btn-primary btn-sm tM-10 pull-right" >Download Report</a>
							<?php echo $activity_log; ?>
						</div>
						<div class="tab-pane fade" id="doi-sign-in">
							<a href="<?php echo base_url('doi-sign-in'); ?>" title="" class="btn btn-primary btn-sm tM-10 pull-right" >Download Report</a>
							<?php echo $doi_sign_in; ?>
						</div>
						<div class="tab-pane fade" id="principal-signature">
							<a href="<?php echo base_url('principal-signature'); ?>" title="" class="btn btn-primary btn-sm tM-10 pull-right" >Download Report</a>
							<?php echo $principal_signature; ?>
						</div>
						<div class="tab-pane fade" id="session-invoice-coach">
							<a href="<?php echo base_url('session-invoice-coach'); ?>" title="" class="btn btn-primary btn-sm tM-10 pull-right" >Download Report</a>
							<?php echo $session_invoice_coach; ?>
						</div>
						<div class="tab-pane fade" id="session-invoice-scholastic">
							<a href="<?php echo base_url('session-invoice-scholastic'); ?>" title="" class="btn btn-primary btn-sm tM-10 pull-right" >Download Report</a>
							<?php echo $session_invoice_scholastic; ?>
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
