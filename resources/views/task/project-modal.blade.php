<!-- Modal Header -->
<div class="modal-header">
	<h4 class="modal-title">Create New Project</h4>
	<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body container">
	<form class="row justify-content-center py-4">
		<div class="col-9">
			<input id="add-project-name" type="text" class="form-control control-sm" placeholder="Project Name">
		</div>
		<div class="col-3">
			<button id="add-project-btn" type="submit" class="btn btn-md btn-primary w-100">Create</button>
		</div>
	</form>

	<div class="table-responsive" style="max-height: 400px">
		<table class="table table-striped table-hover table-bordered">
			<tr>
				<th>Project Name</th>
			</tr>
			<?php foreach ($projects as $value) : ?>
				<tr>
					<td>
						<div class="container">
							<div class="row">
								<div class="col-6"><?= $value->name?></div>
								<div class="col-6">
									<divc class="float-end">
										<button project-id="<?= $value->id?>" class="update-project-btn btn btn-sm btn-info">Update</button>
										<button project-id="<?= $value->id?>" class="delete-project-btn btn btn-sm btn-danger">Delete</button>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>
<!-- Modal footer -->
<div class="modal-footer">
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
