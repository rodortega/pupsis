<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Enrollment</h5>
	</div>
	<div class="panel-body">
		<form action="<?php echo URL?>schedule/add" method="POST" id="schedule_form">

			<div class="label label-flat border-success text-success-600">New Subjects</div><br><br>

			<!--Hidden Inputs-->
			<input type="hidden" name="year" value="<?php echo $stud_year?>">
			<input type="hidden" name="section" value="<?php echo $stud_section?>">
			<input type="hidden" name="curriculum_id" value="<?php echo $stud_curriculum_id?>">
			<input type="hidden" name="semester_id" value="<?php echo $semester_id?>">
			<!--/Hiddem Inputs-->

			<table class="table table-framed">
				<thead>
					<tr>
						<th>#</th>
						<th>Subject</th>
						<th>Description</th>
						<th>Professor</th>
						<th>Lec</th>
						<th>Lab</th>
						<th>Units</th>
						<th>Room</th>
						<th>Schedule</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($classes as $class) { ?>
					<tr>
						<td>
							<?php
							if ($stud_status == 2){}
							elseif (array_search($class->subject_id, $conflict) === false) { ?>
								<input type="checkbox" class="styled" name="class_id[]" value="<?php echo $class->id?>">
							<?php } else { ?>
								<i class="icon-x"></i>
							<?php } ?>
						</td>
						<td><?php echo $class->subject_code;?></td>
						<td><?php echo $class->subject_name;?></td>
						<td><?php echo $class->firstname.' '.$class->lastname;?></td>
						<td><?php echo $class->lec_count;?></td>
						<td><?php echo $class->lab_count;?></td>
						<td><?php echo $class->units;?></td>
						<td><?php echo $class->room_name;?></td>
						<td><?php echo strtoupper(substr($class->week,0,3)) .' ' .$class->time_start .' - '. $class->time_end?> </td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<br>
			<div class="label label-flat border-danger text-danger-600">Back Subjects</div><br><br>
			<table class="table table-framed">
				<thead>
					<tr>
						<th>#</th>
						<th>Subject</th>
						<th>Description</th>
						<th>Professor</th>
						<th>Lec</th>
						<th>Lab</th>
						<th>Units</th>
						<th>Room</th>
						<th>Schedule</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($fails as $class) { ?>
					<tr>
						<td><input type="checkbox" class="styled" name="failed_class_id[]" value="<?php echo $class->id?>"></td>
						<td><?php echo $class->subject_code;?></td>
						<td><?php echo $class->subject_name;?></td>
						<td><?php echo $class->firstname.' '.$class->lastname;?></td>
						<td><?php echo $class->lec_count;?></td>
						<td><?php echo $class->lab_count;?></td>
						<td><?php echo $class->units;?></td>
						<td><?php echo $class->room_name;?></td>
						<td><?php echo strtoupper(substr($class->week,0,3)) .' ' .$class->time_start .' - '. $class->time_end?> </td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<hr>
			<div class="text-right">
				<?php if ($stud_status == 1) { ?>
				<button type="submit" class="btn btn-primary" id="button_enroll"><i class="icon-enter position-left"></i> Enroll</button>
				<?php } ?>
				<?php if ($stud_status == 2) { ?>
				<a class="btn btn-primary" href="<?php echo URL?>student/schedule"><i class="icon-arrow-right8 position-left"></i> Go to Schedule</a>
				<?php } ?>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>student/enrollment.js?v=<?php echo VERSION?>"></script>