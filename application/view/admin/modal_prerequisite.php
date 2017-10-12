<div id="modal_prerequisite" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Add Prequisite</h5>
			</div>
			<form action="<?php echo URL?>prerequisite/add" method="POST" id="prerequisite_form">
				<div id="modal-body" class="col-lg-12 form-horizontal">

					<div id="modal_data"></div>
					<hr>
					<input type="hidden" name="subject_id" id="input_subject_id">
					<div class="form-group">
						<label class="control-label col-lg-4">Prequisite Subject</label>
						<div class="col-lg-8">
							<select class="form-control" name="pre_subject_id" required>
								<?php foreach ($subjects as $subject) { ?>
								<option value="<?php echo $subject->id?>"><?php echo $subject->code .' '. $subject->name?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="clearfix"></div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>