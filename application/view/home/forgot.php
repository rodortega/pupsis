<form action="<?php echo URL?>forgot/send/<?php echo $type?>">
	<div class="panel panel-body login-form">
		<div class="text-center">
			<div class="login-logo"><img src="<?php echo THEME?>images/PUPLogo.png"></div>
			<h5 class="content-group">Forgot Passowrd</h5>
		</div>

		<div class="form-group has-feedback has-feedback-left">
			<input type="text" class="form-control" placeholder="Email Address" name="email" required>
			<div class="form-control-feedback">
				<i class="icon-envelop3 text-muted"></i>
			</div>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">Reset Password<i class="icon-envelop3 position-right"></i></button>
		</div>
	</div>
</form>

<script type="text/javascript" src="<?php echo APPJS?>home/login_admin.js?v=<?php echo VERSION?>"></script>