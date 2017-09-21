<div class="col-lg-7">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Subjects</h5>
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
				foreach ($subjects as $subject) { ?>
				<tr>
					<td><a href="#" class="editable_subject" id="code" data-type="text" data-pk="<?php echo $subject->id;?>" data-inputclass="form-control" data-placeholder="Edit Subject Code" data-title="Edit Subject"><?php echo $subject->code;?></a></td>
					<td><a href="#" class="editable_subject" id="name" data-type="textarea" data-pk="<?php echo $subject->id;?>" data-inputclass="form-control" data-placeholder="Edit Description" data-title="Edit Description"><?php echo $subject->name;?></a></td>
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
			<h5 class="panel-title">Add Subject</h5>
		</div>

		<div class="panel-body">
			<form action="<?php echo URL?>subject/add" id="add_subject_form">
				<div class="form-group has-feedback-left">
					<input type="text" class="form-control" placeholder="Subject Code" name="code" required>
					<div class="form-control-feedback">
						<i class="icon-book text-muted"></i>
					</div>
				</div>
				<div class="form-group has-feedback-left">
					<input type="text" class="form-control" placeholder="Subject Name" name="name" required>
					<div class="form-control-feedback">
						<i class="icon-book text-muted"></i>
					</div>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary btn-xs"><i class="icon-floppy-disk position-left"></i> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo APPJS?>admin/subject_add.js?v=<?php echo VERSION?>"></script>

<script type="text/javascript" src="<?php echo APPJS?>admin/subject.js?v=<?php echo VERSION?>"></script>