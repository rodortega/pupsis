<div class="col-lg-6">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Change Password</h5>
		</div>
		<div class="panel-body">
			<form action="<?php echo URL?>password/change/student" method="POST" class="form-horizontal" id="password_form">

				<div class="form-group">
					<label class="control-label col-lg-4">Old Password</label>
					<div class="col-lg-8">
						<input type="password" class="form-control" name="old_password" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-4">New Password</label>
					<div class="col-lg-8">
						<input type="password" class="form-control" name="new_password1" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-4">Retype New Password</label>
					<div class="col-lg-8">
						<input type="password" class="form-control" name="new_password2" required>
					</div>
				</div>

				<div class="clearfix"></div>

				<div class="text-right">
					<button type="submit" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Confirm</button>
				</div>

			</form>
		</div>
	</div>
</div>

<div class="col-lg-6">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Update Email</h5>
		</div>
		<div class="panel-body">
			<form action="<?php echo URL?>email/change/students" method="POST" class="form-horizontal" id="email_form">
				<label class="control-label">Current Email: <b id="current_email" class="position-right"><?php foreach ($students as $student) {echo (($student->email != NULL) ? $student->email : 'None');} ?></b></label>
				<div class="form-group">
					<label class="control-label col-lg-4">New Email</label>
					<div class="col-lg-8">
						<input type="email" class="form-control" name="email" required>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="text-right">
					<button type="submit" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>student/account.js?v=<?php echo VERSION?>"></script>
<script type="text/javascript" src="<?php echo APPJS?>email.js?v=<?php echo VERSION?>"></script>