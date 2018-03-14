<div class="col-lg-8">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Rooms</h5>
		</div>
		<div class="panel-body">
			<table class="table table-hover table-bordered table-xxs table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Room</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($rooms as $room) { ?>
						<tr id="room_<?php echo $room->id?>">
							<td><?php echo $room->id?></td>
							<td><?php echo $room->name?></td>
							<td><button class="btn btn-xs btn-danger" onclick="promptDelete(this.id)" id="<?php echo $room->id?>">Delete</button></td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="col-lg-4">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title"> Add Room</h5>
		</div>
		<div class="panel-body">
			<form action="<?php echo URL?>room/add" method="POST" id="room_form">
				<input type="hidden" name="school_id" value="<?php echo $_SESSION['school_id']?>">
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

<script type="text/javascript" src="<?php echo APPJS?>registrar/room.js?v=<?php echo VERSION?>"></script>