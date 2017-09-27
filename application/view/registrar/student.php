<div class="panel panel-flat table-responsive">
	<div class="panel-heading">
		<h5 class="panel-title">Students</h5>
	</div>

	<table class="table datatable-basic">
		<thead>
			<tr>
				<th>Name</th>
				<th>User Code</th>
				<th>Course</th>
				<th>Year Section</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($students as $student) { ?>
			<tr>
				<td><?php echo $student->firstname ." ". $student->middlename ." ". $student->lastname?></td>
				<td><?php echo $student->user_code?></td>
				<td><?php echo $student->course_code?></td>
				<td> <?php echo date("Y") - $student->join_year + 1?> - <?php echo $student->section?></td>
				<td>
					<?php
					if ($student->status == '1') { ?>
						<span class="label label-success">Active</span>
					<?php }
					else { ?>
						<span class="label label-danger">Disabled</span>
					<?php } ?>
				</td>
				<td><a href="<?php echo URL?>registrar/student_edit/<?php echo $student->id?>" class=" btn btn-xs btn-primary"><i class="icon-pencil position-left"></i> Edit</a></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript" src="<?php echo APPJS?>registrar/student.js?v=<?php echo VERSION?>"></script>