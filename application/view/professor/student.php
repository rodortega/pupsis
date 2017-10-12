<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Students</h5>
	</div>
	<div class="panel-body">
		<div class="form-group col-lg-4">
			<div class="input-group">
				<select class="form-control" id="class_id">
					<?php
					foreach ($subjects as $subject) { ?>
					<option value="<?php echo $subject->id?>"><?php echo $subject->name;?></option>
					<?php }
					?>
				</select>
				<span class="input-group-btn">
					<button class="btn btn-primary" type="button" id="view_button">View</button>
				</span>
			</div>
		</div>
		<div class="clearfix"></div>
		<table class="table table-framed">
			<thead>
				<tr>
					<th>Student ID</th>
					<th>Name</th>
					<th>Grade</th>
					<th>Mark</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="data_student"></tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>professor/student.js?v=<?php echo VERSION?>"></script>