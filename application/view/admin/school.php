<div class="col-lg-7">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">School Branches</h5>
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($schools as $school) { ?>
				<tr>
					<td><a href="#" class="editable_school" id="name" data-type="text" data-pk="<?php echo $school->id;?>" data-inputclass="form-control" data-placeholder="Edit School Name" data-title="Edit School Branch"><?php echo $school->name;?></a></td>
					<td><a href="#" class="editable_school" id="description" data-type="textarea" data-pk="<?php echo $school->id;?>" data-inputclass="form-control" data-placeholder="Edit Description" data-title="Edit Description"><?php echo $school->description;?></a></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<div class="col-lg-5">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Add School</h5>
		</div>

		<div class="panel-body">
			<form action="<?php echo URL?>school/add" id="add_school_form">
				<div class="form-group has-feedback-left">
					<input type="text" class="form-control" placeholder="School Branch" name="name" required>
					<div class="form-control-feedback">
						<i class="icon-office text-muted"></i>
					</div>
				</div>
				<div class="form-group has-feedback-left">
					<input type="text" class="form-control" placeholder="School Name" name="description" required>
					<div class="form-control-feedback">
						<i class="icon-office text-muted"></i>
					</div>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary btn-xs"><i class="icon-floppy-disk position-left"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>admin/school_add.js?v=<?php echo VERSION?>"></script>

<script type="text/javascript" src="<?php echo APPJS?>admin/school.js?v=<?php echo VERSION?>"></script>