<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title><?php if($title) { echo $title.' | '.PROJECT_NAME; } else { echo PROJECT_NAME; } ?></title>

		<!-- Bootstrap Core CSS -->
		<link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- MetisMenu CSS -->
		<link href="<?php echo base_url(); ?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
		<!-- DataTables CSS -->
		<link href="<?php echo base_url(); ?>assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
		<!-- DataTables Responsive CSS -->
		<link href="<?php echo base_url(); ?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">
		 <!-- Morris Charts CSS -->
		<link href="<?php echo base_url(); ?>assets/vendor/morrisjs/morris.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- jQuery -->
		<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>		
        <script src="<?php echo base_url(); ?>assets/js/jquery.noty.packaged.min.js"></script>
        
	</head>	
	<body>
		<?php // show pages without header and lesf-sidebar section  
			if(in_array($this->uri->segment(1), ['login', 'forget-password', 'reset-password', 'change-password'])) { 
		?>
			<div class="container">
				<?php echo $body;  ?>
			</div>
		<?php } else {	?>
			<div id="wrapper">
				<!-- Navigation -->
				<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div id="header">
						<?php echo $header; ?>
					</div>
					<!-- /.navbar-top-links -->
					<div id="sidebar">
						<?php echo $left_sidebar; ?>
					</div>
				</nav>
				<div id="page-wrapper">
					<div class="col-lg-12">
						<?php $this->load->view('sections/notifications'); ?>	
					</div>				
					<?php echo $body; ?>
				</div>
				<!-- /#page-wrapper -->
			</div>
		<?php } ?>
		
		<!-- /#wrapper -->
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Metis Menu Plugin JavaScript -->
		<script src="<?php echo base_url(); ?>assets/vendor/metisMenu/metisMenu.min.js"></script>		
		<!-- DataTables JavaScript -->
		<script src="<?php echo base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
		<!-- Morris Charts JavaScript -->
		<script src="<?php echo base_url(); ?>assets/vendor/raphael/raphael.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/vendor/morrisjs/morris.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--
		<script src="<?php echo base_url(); ?>assets/data/morris-data.js"></script>
-->		
		<!-- Custom Theme JavaScript -->

		<script src="<?php echo base_url(); ?>assets/js/sb-admin-2.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/validate.js"></script>
		
		
		<script>
			$(document).ready(function() {
				setTimeout(function(){
					$('.msg-box').slideUp('slow');
				}, 3000);	
			});
		</script>
		
	</body>
</html>
