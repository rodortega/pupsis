<!-- Simple login form -->
<form action="<?php echo URL?>login/type/admin">
	<div class="panel panel-body login-form">
		<div class="text-center">
			<div class="login-logo"><img src="<?php echo THEME?>images/PUPLogo.png"></div>
			<h5 class="content-group">ADMIN</h5>
		</div>

		<div class="form-group has-feedback has-feedback-left">
			<input type="text" class="form-control" placeholder="Username" name="username" required>
			<div class="form-control-feedback">
				<i class="icon-user text-muted"></i>
			</div>
		</div>

		<div class="form-group has-feedback has-feedback-left">
			<input type="password" class="form-control" placeholder="Password" name="password" required>
			<div class="form-control-feedback">
				<i class="icon-lock2 text-muted"></i>
			</div>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
		</div>
	</div>
</form>