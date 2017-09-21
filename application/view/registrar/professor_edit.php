<div class="panel panel-flat">

	<div class="panel-heading">
		<h5 class="panel-title">Edit Professor</h5>
	</div>

	<div class="panel-body">

	<?php foreach ($professors as $professor) { ?>

		<form class="form-horizontal" action="<?php echo URL?>professor/edit" id="professor_form">

			<input type="hidden" name="id" value="<?php echo $professor->id?>">

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">First Name</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="firstname" required value="<?php echo $professor->firstname?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Middle Name</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="middlename" required value="<?php echo $professor->middlename?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Last Name</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="lastname" required value="<?php echo $professor->lastname?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Gender</label>
					<div class="col-lg-8">
						<select name="gender" class="form-control" required>
							<option value="m" <?php if ($professor->gender == "m") echo 'selected="selected"'; ?>>Male</option>
							<option value="f" <?php if ($professor->gender == "f") echo 'selected="selected"'; ?>>Female</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Birthdate</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" name="birthdate" required value="<?php echo $professor->birthdate?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Mobile</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="mobile" required value="<?php echo $professor->mobile?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Telephone</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="telephone" required value="<?php echo $professor->telephone?>">
					</div>
				</div>
			</div>

			<div class="col-lg-8">
				<div class="form-group">
					<label class="control-label col-lg-2">Address</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="address" required value="<?php echo $professor->address?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">City</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="city" required value="<?php echo $professor->city?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Province</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="province" required value="<?php echo $professor->province?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">School Branch</label>
					<div class="col-lg-8">
						<select name="school_id" class="form-control" disabled>
							<?php
							foreach ($schools as $school) { ?>
							<option value="<?php echo $school->id?>" <?php if ($professor->school_id == $school->id) echo 'selected="selected"'; ?>><?php echo $school->name;?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>

			<input type="hidden" name="school_id" value="<?php echo $_SESSION['school_id']?>">

			<div class="clearfix"></div>
			<hr>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">User Code</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="user_code" required value="<?php echo $professor->user_code?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Password</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="password" required value="<?php echo $professor->password?>">
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Status</label>
					<div class="col-lg-8">
						<select name="status" class="form-control" required>
							<option value="1" <?php if ($professor->status == "1") echo 'selected="selected"'; ?>>Active</option>
							<option value="0" <?php if ($professor->status == "0") echo 'selected="selected"'; ?>>Disabled</option>
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

<script type="text/javascript" src="<?php echo APPJS?>registrar/professor_edit.js?v=<?php echo VERSION?>"></script>