<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Room Reservations</h5>
	</div>
	<div class="panel-body">
		<table class="table table-framed datatable-basic">
			<thead>
				<tr>
					<th>Room</th>
					<th>DateTIme Start</th>
					<th>DateTime End</th>
					<th>Professor</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($reservations as $reservation) { ?>
				<tr>
					<td><b><?php echo $reservation->name?></td>
					<td><?php echo date("D, M d Y h:i A", strtotime($reservation->datetime_start))?></td>
					<td><?php echo date("D, M d Y h:i A", strtotime($reservation->datetime_end))?></td>
					<td><?php echo $reservation->firstname.' '.$reservation->lastname?></td>
					<td><button class="btn btn-xs btn-info"><i class="icon-info22"></i> Details</button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>professor/reservation.js?v=<?php echo VERSION?>"></script>