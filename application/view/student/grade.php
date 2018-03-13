<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Grades</h5>
	</div>
	<div class="panel-body">
		<?php foreach ($years as $year) {
			if ($year == 1) {
				$year_title = "First Year";
			}
			elseif ($year == 2) {
				$year_title = "Second Year";
			}
			elseif ($year == 3) {
				$year_title = "Third Year";
			}
			elseif ($year == 4) {
				$year_title = "Fourth Year";
			}
			elseif ($year == 5) {
				$year_title = "Fifth Year";
			}

			foreach ($semesters as $semester) {
				if ($semester == 1) {
					$semester_title = "First Semester";
				}
				elseif ($semester == 2) {
					$semester_title = "Second Semester";
				}
				elseif ($semester == 3) {
					$semester_title = "Summer";
				}
			?>
		<div class="label label-success border-success"><?php echo $year_title?></div><br><br>
		<div class="text-right">
			<div class="label label-flat border-primary text-primary-600"><?php echo $semester_title?></div><br><br>
		</div>
		<table class="table table-framed">
			<thead>
				<tr>
					<th>Subject</th>
					<th>Description</th>
					<th>Professor</th>
					<th>Lec</th>
					<th>Lab</th>
					<th>Units</th>
					<th>Grade</th>
					<th>Mark</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($schedules as $schedule) {
					if ($schedule->year == $year && $schedule->semester_id == $semester) {
					?>
				<tr>
					<td><?php echo $schedule->subject_code;?></td>
					<td><?php echo $schedule->subject_name;?></td>
					<td><?php echo $schedule->firstname.' '.$schedule->lastname;?></td>
					<td><?php echo $schedule->lec_count;?></td>
					<td><?php echo $schedule->lab_count;?></td>
					<td><?php echo $schedule->units;?></td>
					<td><?php echo $schedule->grade?></td>
					<td><?php echo $schedule->mark?></td>
				</tr>
				<?php } }?>
			</tbody>
		</table><br><br>
		<?php } } ?>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>student/grade.js?v=<?php echo VERSION?>"></script>