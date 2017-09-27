<div class="col-lg-7">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"><?php echo $schools->name;?></h5>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th>Code</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($curriculums as $curriculum) { ?>
				<tr>
					<td><?php echo $curriculum->code;?></td>
					<td><?php echo $curriculum->name;?></td>
					<td><button class="btn btn-xs btn-danger" id="<?php echo $curriculum->id?>" onClick="promptDelete(this.id)"><i class="icon-trash position-left"></i> Delete</button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div class="col-lg-5">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Add Course</h5>
		</div>

		<div class="panel-body">
			<form action="<?php echo URL?>curriculum/add" id="add_curriculum_form">
				<div class="form-group">
					<select class="form-control" name="course_id" required>
						<?php
						$array = array();
						foreach ($curriculums as $curriculum) {
							$array[] = $curriculum->code;
						}
						foreach ($courses as $course) {
							if (!in_array($course->code, $array)) { ?>
								<option value="<?php echo $course->id?>"><?php echo '[ '.$course->code .' ] '. $course->name;?></option>
							<?php
							}
						} ?>
					</select>
				</div>

				<input type="hidden" name="school_id" value="<?php echo $schools->id?>">

				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>



<script type="text/javascript" src="<?php echo APPJS?>admin/school_course.js?v=<?php echo VERSION?>"></script>