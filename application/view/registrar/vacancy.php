<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Schedule</h5>
	</div>
	<div class="panel-body">
		<div class="form-group col-lg-4">
			<div class="input-group">
				<select class="form-control" id="room_id">
					<?php
					foreach ($rooms as $room) { ?>
					<option value="<?php echo $room->id?>"><?php echo $room->name;?></option>
					<?php }
					?>
				</select>
				<span class="input-group-btn">
					<button class="btn btn-primary" type="button" id="view_button">View</button>
				</span>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="schedule"></div>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>registrar/vacancy.js?v=<?php echo VERSION?>"></script>