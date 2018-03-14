<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Room Reservations</h5>
	</div>
	<div class="panel-body">
		<button class="btn btn-md btn-primary" data-target="#modal_reservation" data-toggle="modal"><i class="icon-add"></i> Create Reservation</button>
		<table class="table table-framed datatable-basic">
			<thead>
				<tr>
					<th>Room</th>
					<th>DateTIme Start</th>
					<th>DateTime End</th>
					<th>Professor</th>
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
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>professor/reservation.js?v=<?php echo VERSION?>"></script>