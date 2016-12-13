<?php if($this->session->flashdata('success')) { ?>
	<div class="alert alert-success alert-dismissable msg-box error_msg">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php } ?>
<?php if($this->session->flashdata('error')) { ?>
	<div class="alert alert-danger alert-dismissable msg-box error_msg">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo $this->session->flashdata('error'); ?>
	</div>
<?php } ?>
