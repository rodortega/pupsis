<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Registrars</h5>
	</div>

	<table class="table datatable-basic">
		<thead>
			<tr>
				<th>Branch</th>
				<th>Name</th>
				<th>User Code</th>
				<th>Telephone</th>
				<th>Mobile</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($registrars as $registrar) { ?>
			<tr>
				<td><?php echo $registrar->school_name?></td>
				<td><?php echo $registrar->firstname ." ". $registrar->middlename ." ". $registrar->lastname?></td>
				<td><?php echo $registrar->user_code?></td>
				<td><?php echo $registrar->telephone?></td>
				<td><?php echo $registrar->mobile?></td>
				<td>
					<?php
					if ($registrar->status == '1') { ?>
						<span class="label label-success">Active</span>
					<?php }
					else { ?>
						<span class="label label-danger">Disabled</span>
					<?php } ?>
				</td>
				<td><a href="<?php echo URL?>admin/registrar_edit/<?php echo $registrar->id?>" class=" btn btn-xs btn-primary"><i class="icon-pencil position-left"></i> Edit</a></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript" src="<?php echo APPJS?>admin/registrar.js?v=<?php echo VERSION?>"></script>