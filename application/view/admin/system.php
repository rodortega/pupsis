<div class="col-lg-6 col-lg-offset-3">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Change System Settings</h5>
		</div>
		<div class="panel-body">
			<form action="<?php echo URL?>system/change/" method="POST" class="form-horizontal" id="system_form">

				<div class="form-group">
					<label class="control-label col-lg-4">Semester</label>
					<div class="col-lg-8">
						<select class="form-control" name="semester_id" required>
							<?php foreach ($semesters as $semester) { ?>
							<option value="<?php echo $semester->id?>" <?php echo (($systems->semester_id == $semester->id) ? 'selected="selected"' : '');?>><?php echo $semester->name;?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-12">
						<div class="checkbox">
							<label>
								<input type="checkbox" class="control-primary" name="is_reset">
								Set all students as enrollees
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-4">Encoding</label>
					<div class="col-lg-8">
						<select class="form-control" name="is_encoding" required>
							<option value="1" <?php echo (($systems->is_encoding == '1') ? 'selected="selected"' : '');?>>Active</option>
							<option value="0" <?php echo (($systems->is_encoding == '0') ? 'selected="selected"' : '');?>>Disabled</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-4">Registration</label>
					<div class="col-lg-8">
						<select class="form-control" name="is_registration" required>
							<option value="1" <?php echo (($systems->is_registration == '1') ? 'selected="selected"' : '');?>>Active</option>
							<option value="0" <?php echo (($systems->is_registration == '0') ? 'selected="selected"' : '');?>>Disabled</option>
						</select>
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

<script type="text/javascript" src="<?php echo APPJS?>admin/system.js?v=<?php echo VERSION?>"></script>