<div class="panel panel-flat">

	<div class="panel-heading">
		<h5 class="panel-title">Edit Registrar</h5>
	</div>

	<div class="panel-body">

	<?php foreach ($registrars as $registrar) { ?>

		<form class="form-horizontal" action="<?php echo URL?>registrar/edit" id="registrar_form">

			<input type="hidden" name="id" value="<?php echo $registrar->id?>">

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">First Name</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="firstname" required value="<?php echo $registrar->firstname?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Middle Name</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="middlename" required value="<?php echo $registrar->middlename?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Last Name</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="lastname" required value="<?php echo $registrar->lastname?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Gender</label>
					<div class="col-lg-8">
						<select name="gender" class="form-control" required>
							<option value="m" <?php if ($registrar->gender == "m") echo 'selected="selected"'; ?>>Male</option>
							<option value="f" <?php if ($registrar->gender == "f") echo 'selected="selected"'; ?>>Female</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Birthdate</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" name="birthdate" required value="<?php echo $registrar->birthdate?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Mobile</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="mobile" required value="<?php echo $registrar->mobile?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Telephone</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="telephone" required value="<?php echo $registrar->telephone?>">
					</div>
				</div>
			</div>

			<div class="col-lg-8">
				<div class="form-group">
					<label class="control-label col-lg-2">Address</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="address" required value="<?php echo $registrar->address?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">City</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="city" required value="<?php echo $registrar->city?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Province</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="province" required value="<?php echo $registrar->province?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">School Branch</label>
					<div class="col-lg-8">
						<select name="school_id" class="form-control">
							<?php
							foreach ($schools as $school) { ?>
							<option value="<?php echo $school->id?>" <?php if ($registrar->school_id == $school->id) echo 'selected="selected"'; ?>><?php echo $school->name;?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>

			<div class="clearfix"></div>
			<hr>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">User Code</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="user_code" required value="<?php echo $registrar->user_code?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Password</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="password" required value="<?php echo $registrar->password?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Status</label>
					<div class="col-lg-8">
						<select name="status" class="form-control" required>
							<option value="1" <?php if ($registrar->status == "1") echo 'selected="selected"'; ?>>Active</option>
							<option value="0" <?php if ($registrar->status == "0") echo 'selected="selected"'; ?>>Disabled</option>
						</select>
					</div>
				</div>
			</div>

			<div class="text-right col-lg-12">
				<button class="btn btn-primary btn-xs" type="submit"><i class="icon-floppy-disk position-left"></i> Save</button>
			</div>
		</form>
	<?php } ?>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>admin/registrar_edit.js?v=<?php echo VERSION?>"></script>