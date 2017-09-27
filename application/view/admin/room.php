<div class="col-lg-6">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Rooms</h5>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<div class="input-group">
					<select class="form-control" id="school_id_search">
						<?php
						foreach ($schools as $school) { ?>
						<option value="<?php echo $school->id?>"><?php echo $school->name;?></option>
						<?php }
						?>
					</select>
					<span class="input-group-btn">
						<button class="btn btn-primary" type="button" id="view_button">View</button>
					</span>
				</div>
			</div>
			<br>
			<table class="table table-hover table-bordered table-xxs">
				<thead>
					<tr>
						<th>ID</th>
						<th>Room</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody id="table_data">
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="col-lg-6">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Add Room</h5>
		</div>
		<div class="panel-body">
			<form action="<?php echo URL?>room/add" method="POST" id="room_form">
				<div class="row form-group form-horizontal">
					<label class="control-label col-lg-4">Branch</label>
					<div class="col-lg-8">
						<select name="school_id" class="form-control" id="school_id">
							<?php
							foreach ($schools as $school) { ?>
							<option value="<?php echo $school->id?>"><?php echo $school->name;?></option>
							<?php }
							?>
						</select>
					</div>
				</div>

				<div class="row form-group form-horizontal">
					<label class="control-label col-lg-4">Room Name</label>
					<div class="col-lg-8">
						<input type="text" name="name" class="form-control" required>
					</div>
				</div>

				<div class="text-right">
					<button class="btn btn-primary" type="submit"><i class="icon-floppy-disk position-left"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>admin/room.js?v=<?php echo VERSION?>"></script>