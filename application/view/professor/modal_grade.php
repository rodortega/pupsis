<div id="modal_grade" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Encode Grade</h5>
			</div>
			<form action="<?php echo URL?>schedule/update" method="POST" id="schedule_form">
				<div id="modal-body" class="col-lg-12 form-horizontal">

					<div id="modal_data"></div>
					<hr>
					<input type="hidden" name="schedule_id" id="schedule_id">
					<div class="form-group">
						<label class="control-label col-lg-4">Grade</label>
						<div class="col-lg-8">
							<select class="form-control" name="grade" id="select_grade" required>
								<option value="1.00">1.00</option>
								<option value="1.25">1.25</option>
								<option value="1.50">1.50</option>
								<option value="1.75">1.75</option>
								<option value="2.00">2.00</option>
								<option value="2.25">2.25</option>
								<option value="2.50">2.50</option>
								<option value="2.75">2.75</option>
								<option value="3.00">3.00</option>
								<option value="5.00">5.00</option>
								<option value="INC">INC</option>
								<option value="DROP">DROP</option>
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