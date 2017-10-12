<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Enrollment</h5>
	</div>
	<div class="panel-body">

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
				foreach ($schedules as $schedule) { ?>
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
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>student/grade.js?v=<?php echo VERSION?>"></script>