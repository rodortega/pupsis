<!-- Simple login form -->
<form action="<?php echo URL?>login/type/professor" id="login_form">
	<div class="panel panel-body login-form">
		<div class="text-center">
			<div class="login-logo"><img src="<?php echo THEME?>images/PUPLogo.png"></div>
			<h5 class="content-group">Professor's Login Page</h5>
		</div>

		<div class="form-group has-feedback has-feedback-left">
			<input type="text" class="form-control" placeholder="Faculty Number (2017-01234-SR-0)" name="user_code" required>
			<div class="form-control-feedback">
				<i class="icon-user text-muted"></i>
			</div>
		</div>

		<div class="form-group has-feedback has-feedback-left">
			<input type="text" class="form-control" placeholder="Birthdate (MM/DD/YYYY)" name="birthdate" required>
			<div class="form-control-feedback">
				<i class="icon-gift text-muted"></i>
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
		<!--
		<div class="text-center">
			<a href="<?php echo URL?>forgot/index/registrar">Forgot password?</a>
		</div>
		-->
	</div>
</form>

<script type="text/javascript" src="<?php echo APPJS?>home/login_professor.js?v=<?php echo VERSION?>"></script>