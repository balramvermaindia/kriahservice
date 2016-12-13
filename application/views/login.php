<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Please Sign In</h3>
			</div>
			<div class="panel-body">
				<?php if(isset($form_errors['login_error'])) { echo '<label class="error">'.$form_errors['login_error'].'</label>'; }?>
				<form role="form" action="" method="POST">
					<fieldset>
						<div class="form-group">
							<input class="form-control" placeholder="E-mail" name="email" value="<?php echo set_value('email'); ?>" type="text" autofocus>
							<?php if(isset($form_errors['email'])) { echo '<label class="error">'.$form_errors['email'].'</label>'; }?>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" value="">
							<?php if(isset($form_errors['password'])) { echo '<label class="error">'.$form_errors['password'].'</label>'; }?>
						</div>
						<div class="checkbox">
							<label>
								<input name="remember" type="checkbox" value="Remember Me">Remember Me
							</label>
						</div>
						<!-- Change this to a button or input when using this as a form -->
						<button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
<!--
						<a href="<?php echo base_url('/');  ?>" class="btn btn-lg btn-success btn-block">Login</a>
-->
					</fieldset>
					<a href="<?php echo base_url('forget-password'); ?>" class="tM-10 pull-left">Forgot Password ?</a>
				</form>
			</div>
		</div>
	</div>
</div>
	

