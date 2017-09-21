<div id="modal_curriculum_add" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Add Schedule</h5>
			</div>


			<form class="form-horizontal" method="POST" action="<?php echo URL?>class/add" id="curriculum_form">
				<div class="modal-body">

					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-4">Course</label>
							<div class="col-lg-8">
								<select class="form-control" name="curriculum_id" required>
									<option value="">Select Course ..</option>
									<?php
									foreach ($curriculums as $curriculum) { ?>
									<option value="<?php echo $curriculum->id?>"><?php echo $curriculum->code;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<div class="col-lg-8">
						<div class="form-group">
							<label class="control-label col-lg-2">Subject</label>
							<div class="col-lg-10">
								<select class="form-control" name="curriculum_id" required>
									<option value="">Select Course ..</option>
									<?php
									foreach ($curriculums as $curriculum) { ?>
									<option value="<?php echo $curriculum->id?>"><?php echo $curriculum->code;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-4">Year</label>
							<div class="col-lg-8">
								<input type="number" class="form-control" min="1" max="6" name="year" required>
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-4">Section</label>
							<div class="col-lg-8">
								<input type="number" class="form-control" min="1" max="6" name="section" required>
							</div>
						</div>
					</div>

					<div class="col-lg-8">
						<div class="form-group">
							<label class="control-label col-lg-2">Professor</label>
							<div class="col-lg-10">
								<select class="form-control" name="professor_id" required>
									<option value="">Select Professor ..</option>
									<?php foreach($professors as $professor) { ?>
									<option value="<?php echo $professor->id?>"><?php echo $professor->firstname .' '. $professor->lastname?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-4">Room</label>
							<div class="col-lg-8">
								<select class="form-control" id="room_id" name="room_id" required>
									<option value="">Select Room ..</option>
									<?php
									foreach ($rooms as $room) { ?>
									<option value="<?php echo $room->id?>"><?php echo $room->name;?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-4">Lecture</label>
							<div class="col-lg-8">
								<input type="number" class="form-control" min="1" max="6" name="lec_count" required>
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-4">Laboratory</label>
							<div class="col-lg-8">
								<input type="number" class="form-control" min="1" max="6" name="lab_count" required>
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-4">Units</label>
							<div class="col-lg-8">
								<input type="number" class="form-control" min="1" max="5" name="units" required>
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-4">Week</label>
							<div class="col-lg-8">
								<select name="week" class="form-control" required>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thursday">Thursday</option>
									<option value="Friday">Friday</option>
									<option value="Saturday">Saturday</option>
								</select>
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-4">Time Start</label>
							<div class="col-lg-8">
								<input type="time" class="form-control" name="time_start" required>
							</div>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="form-group">
							<label class="control-label col-lg-4">Time End</label>
							<div class="col-lg-8">
								<input type="time" class="form-control" name="time_end" required>
							</div>
						</div>
					</div>

					<div class="clearfix"></div>
				</div>

				<div class="modal-footer">
					<div class="col-lg-12">
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>