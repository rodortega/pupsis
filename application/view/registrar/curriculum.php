<div class="col-lg-3">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Curriculum</h5>
		</div>
		<div class="panel-body">

			<form action="<?php echo URL?>class/search" method="POST" id="class_form">
				<div class="form-group col-lg-12">
					<div class="form-horizontal row">
						<label class="control-label col-lg-4">Course</label>
						<div class="col-lg-8">
							<select class="form-control" name="curriculum_id">
								<?php
								foreach ($curriculums as $curriculum) { ?>
								<option value="<?php echo $curriculum->id?>"><?php echo $curriculum->code;?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>

				<br>

				<div class="form-group col-lg-12">
					<div class="form-horizontal row">
						<label class="control-label col-lg-4">Year</label>
						<div class="col-lg-8">
							<input type="number" class="form-control" min="1" max="6" name="year" required>
						</div>
					</div>
				</div>

				<br>

				<div class="form-group col-lg-12">
					<div class="form-horizontal row">
						<label class="control-label col-lg-4">Section</label>
						<div class="col-lg-8">
							<input type="number" class="form-control" min="1" max="6" name="section" required>
						</div>
					</div>
				</div>

				<div class="form-group col-lg-12">
					<div class="form-horizontal row">
						<label class="control-label col-lg-4">Semester</label>
						<div class="col-lg-8">
							<select name="semester_id" class="form-control" required>
								<?php foreach ($semesters as $semester) { ?>
								<option value="<?php echo $semester->id?>"><?php echo $semester->name;?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group col-lg-12">
					<button class="btn btn-primary btn-block"><i class="icon-eye position-left"></i> VIEW</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="col-lg-9">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Schedule</h5>
			<p>You can manage the room vacancy and schedule by clicking <a href="<?php echo URL?>registrar/vacancy">here.</a></p>
			<div class="text-right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#modal_curriculum_add"><i class="icon-add position-left"></i> ADD SCHEDULE</button>
			</div>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Subject</th>
							<th>Professor</th>
							<th>Lec</th>
							<th>Lab</th>
							<th>Units</th>
							<th>Schedule</th>
							<th>Room</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="data_schedule">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>registrar/curriculum.js?v=<?php echo VERSION?>"></script>
<script type="text/javascript" src="<?php echo APPJS?>registrar/curriculum_add.js?v=<?php echo VERSION?>"></script>