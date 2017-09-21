<div class="panel panel-flat table-responsive">
	<div class="panel-heading">
		<h5 class="panel-title">Professors</h5>
	</div>

	<table class="table datatable-basic">
		<thead>
			<tr>
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
			foreach ($professors as $professor) { ?>
			<tr>
				<td><?php echo $professor->firstname ." ". $professor->middlename ." ". $professor->lastname?></td>
				<td><?php echo $professor->user_code?></td>
				<td><?php echo $professor->telephone?></td>
				<td><?php echo $professor->mobile?></td>
				<td>
					<?php
					if ($professor->status == '1') { ?>
						<span class="label label-success">Active</span>
					<?php }
					else { ?>
						<span class="label label-danger">Disabled</span>
					<?php } ?>
				</td>
				<td><a href="<?php echo URL?>registrar/professor_edit/<?php echo $professor->id?>" class=" btn btn-xs btn-primary"><i class="icon-pencil position-left"></i> Edit</a></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript" src="<?php echo APPJS?>registrar/professor.js?v=<?php echo VERSION?>"></script>