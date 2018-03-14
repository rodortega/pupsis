<div id="modal_reservation" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Create Reservation</h5>
			</div>
			<hr>
			<form action="<?php echo URL?>reservation/add" method="POST" id="reservation_form">
				<div id="modal-body" class="col-lg-12 form-horizontal">

					<div class="form-group">
						<label class="control-label col-lg-4">Room</label>
						<div class="col-lg-8">
							<select name="room_id" class="form-control" required>
								<?php
								foreach ($rooms as $room) { ?>
								<option value="<?php echo $room->id?>"><?php echo $room->name?></option>
								<?php
								} ?>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-4">DateTime Start</label>
						<div class="col-lg-8">
							<input type="datetime-local" name="datetime_start" class="form-control" required>
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-4">DateTime End</label>
						<div class="col-lg-8">
							<input type="datetime-local" name="datetime_end" class="form-control" required>
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-4">Description</label>
						<div class="col-lg-8">
							<textarea rows="3" class="form-control" name="description" required></textarea>
						</div>
						<div class="clearfix"></div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>