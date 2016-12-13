 <script type="text/javascript">
			
			$(function() {
				
				/* inialize bar chart */
				 Morris.Bar({
					element: 'morris-bar-chart',
					data: [{
						y: '2006',
						a: 100,
						b: 90
					}, {
						y: '2007',
						a: 75,
						b: 65
					}, {
						y: '2008',
						a: 50,
						b: 40
					}, {
						y: '2009',
						a: 75,
						b: 65
					}, {
						y: '2010',
						a: 50,
						b: 40
					}, {
						y: '2011',
						a: 75,
						b: 65
					}, {
						y: '2012',
						a: 100,
						b: 90
					}],
					xkey: 'y',
					ykeys: ['a', 'b'],
					labels: ['Series A', 'Series B'],
					hideHover: 'auto',
					resize: true
				});
				
			});
		</script>
 <div class="row">
	<div class="col-lg-12">
		<h3 class="page-header">Dashboard</h3>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-comments fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">26</div>
						<div>New Comments!</div>
					</div>
				</div>
			</div>
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tasks fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">12</div>
						<div>New Tasks!</div>
					</div>
				</div>
			</div>
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">124</div>
						<div>New Orders!</div>
					</div>
				</div>
			</div>
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-support fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">13</div>
						<div>Support Tickets!</div>
					</div>
				</div>
			</div>
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-8">		
		<div class="panel panel-default fix-height-500">
			<div class="panel-heading">
				<i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
				<div class="pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
							Actions
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li><a href="#">Action</a>
							</li>
							<li><a href="#">Another action</a>
							</li>
							<li><a href="#">Something else here</a>
							</li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="row">
					<div id="morris-bar-chart"></div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->			
	</div>
	<!-- /.col-lg-8 -->
	<div class="col-lg-4">
		<div class="panel panel-default fix-height-500">
			<div class="panel-heading">
				<i class="fa fa-bell fa-fw"></i> Notifications Panel
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<i class="fa fa-comment fa-fw"></i> New Comment
						<span class="pull-right text-muted small"><em><?php //echo time_elapsed_string(date('d-m-Y h:i:s', strtotime('now'))); ?>4 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-twitter fa-fw"></i> 3 New Followers
						<span class="pull-right text-muted small"><em>12 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-envelope fa-fw"></i> Message Sent
						<span class="pull-right text-muted small"><em>27 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-tasks fa-fw"></i> New Task
						<span class="pull-right text-muted small"><em>43 minutes ago</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-upload fa-fw"></i> Server Rebooted
						<span class="pull-right text-muted small"><em>11:32 AM</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-bolt fa-fw"></i> Server Crashed!
						<span class="pull-right text-muted small"><em>11:13 AM</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-warning fa-fw"></i> Server Not Responding
						<span class="pull-right text-muted small"><em>10:57 AM</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
						<span class="pull-right text-muted small"><em>9:49 AM</em>
						</span>
					</a>
					<a href="#" class="list-group-item">
						<i class="fa fa-money fa-fw"></i> Payment Received
						<span class="pull-right text-muted small"><em>Yesterday</em>
						</span>
					</a>
				</div>
				<!-- /.list-group -->
				<a href="#" class="btn btn-default btn-block">View All Alerts</a>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->		
	</div>
	<!-- /.col-lg-4 -->
</div>
<!-- /.row -->
