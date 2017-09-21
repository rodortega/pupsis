<div class="panel panel-flat">

	<div class="panel-heading">
		<h5 class="panel-title">Add Student</h5>
	</div>

	<div class="panel-body">

		<form class="form-horizontal" action="<?php echo URL?>student/add" id="student_form">

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">First Name</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="firstname" required>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Middle Name</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="middlename" required>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Last Name</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="lastname" required>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Gender</label>
					<div class="col-lg-8">
						<select name="gender" class="form-control" required>
							<option value="m">Male</option>
							<option value="f">Female</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Birthdate</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" name="birthdate" required>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Mobile</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="mobile" required>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Telephone</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="telephone" required>
					</div>
				</div>
			</div>

			<div class="col-lg-8">
				<div class="form-group">
					<label class="control-label col-lg-2">Address</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="address" required>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">City</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="city" required>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Province</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="province" required>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">School Branch</label>
					<div class="col-lg-8">
						<select class="form-control" disabled>
							<?php
							foreach ($schools as $school) { ?>
							<option value="<?php echo $school->id?>" <?php if ($school->id == $_SESSION["school_id"]) echo 'selected="selected"'; ?>><?php echo $school->name;?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>

			<input type="hidden" name="school_id" value="<?php echo $_SESSION['school_id']?>" required>

			<div class="clearfix"></div>
			<hr>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">User Code</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="user_code" required>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Password</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="password" required>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Status</label>
					<div class="col-lg-8">
						<select name="status" class="form-control" required>
							<option value="1">Active</option>
							<option value="0">Disabled</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-lg-8">
				<div class="form-group">
					<label class="control-label col-lg-2">Course</label>
					<div class="col-lg-10">
						<select class="form-control" name="curriculum_id" required>
							<?php
							foreach ($curriculums as $curriculum) { ?>
							<option value="<?php echo $curriculum->id?>"><?php echo $curriculum->code .' - '. $curriculum->name;?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="form-group">
					<label class="control-label col-lg-4">Join Year</label>
					<div class="col-lg-8">
						<input type="number" min="2000" max="2099" value="<?php echo date("Y")?>" name="join_year" class="form-control" required>
					</div>
				</div>
			</div>

			<div class="text-right col-lg-12">
				<button class="btn btn-primary btn-xs" type="submit"><i class="icon-floppy-disk position-left"></i> Save</button>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>registrar/student_add.js?v=<?php echo VERSION?>"></script>