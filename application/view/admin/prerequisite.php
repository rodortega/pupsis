<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Subjects</h5>
	</div>

	<table class="table datatable-basic">
		<thead>
			<tr>
				<th>Code</th>
				<th>Description</th>
				<th>Prereq Code</th>
				<th>Prereq Description</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($subjects as $subject) { ?>
			<tr>
				<td><?php echo $subject->code?></td>
				<td><?php echo $subject->name?></td>
				<td><?php echo $subject->pre_code?></td>
				<td><?php echo $subject->pre_name?></td>
				<td>
					<?php if ($subject->pre_id == NULL) { ?>
					<button class="btn btn-xs btn-info" id="<?php echo $subject->id?>" onclick="addPrereq(this.id)"><i class="icon-plus3 position-left"></i> ADD</button>
					<?php } else { ?>
					<button class="btn btn-xs btn-danger" id="<?php echo $subject->id?>" onclick="promptDelete(this.id)"><i class="icon-reset position-left"></i> RESET</button>
					<?php } ?>
				</td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript" src="<?php echo APPJS?>admin/prerequisite_add.js?v=<?php echo VERSION?>"></script>
<script type="text/javascript" src="<?php echo APPJS?>admin/prerequisite.js?v=<?php echo VERSION?>"></script>