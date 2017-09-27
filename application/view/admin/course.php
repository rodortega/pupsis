<div class="col-lg-7">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Courses</h5>
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>Code</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($courses as $course) { ?>
				<tr id="course_<?php echo $course->id?>">
					<td><a href="#" class="editable_course" id="code" data-type="text" data-pk="<?php echo $course->id;?>" data-inputclass="form-control" data-placeholder="Edit Course Code" data-title="EditCourse Code"><?php echo $course->code;?></a></td>
					<td><a href="#" class="editable_course" id="name" data-type="textarea" data-pk="<?php echo $course->id;?>" data-inputclass="form-control" data-placeholder="Edit Name" data-title="Edit Name"><?php echo $course->name;?></a></td>
					<td><button id="<?php echo $course->id?>" onClick="promptDelete(this.id)" class="btn btn-xs btn-danger"><i class="icon-trash position-left"></i> Delete</button></td>
				</tr>
				<?php
				}
				?>
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
			<form action="<?php echo URL?>course/add" id="add_course_form">
				<div class="form-group has-feedback-left">
					<input type="text" class="form-control" placeholder="Course Code" name="code" required>
					<div class="form-control-feedback">
						<i class="icon-road text-muted"></i>
					</div>
				</div>
				<div class="form-group has-feedback-left">
					<input type="text" class="form-control" placeholder="Course Name" name="name" required>
					<div class="form-control-feedback">
						<i class="icon-road text-muted"></i>
					</div>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary"><i class="icon-floppy-disk position-left"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>admin/course_add.js?v=<?php echo VERSION?>"></script>

<script type="text/javascript" src="<?php echo APPJS?>admin/course.js?v=<?php echo VERSION?>"></script>