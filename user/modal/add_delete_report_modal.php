

<div class="modal fade" id="modal-deletes-report">
	<div class="modal-dialog">
		<div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
					<div class="container-fluid" style="background: rgb(255, 239, 218);">
						<div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
							<h4 class="modal-title">ARE YOU SURE TO DELETE ALL THE REPORTS?</h4>
						</div>
						<div class="modal-body">
							<p>Type <strong>CONFIRM</strong> to Delete all the Reports</p>
							<form action="" id="form-delete-report">
								<input type="text" class="form-control" id="confirm-delete" placeholder="Confirm">
								<div style="width: 100%; display:flex; gap:15px; padding-top:10px;">
									<button class="btn btn-success form-control" id="cancel-delete" onclick="canceldeleteAllReport()">Cancel</button>
									<button class="btn btn-danger form-control" type="submit" onclick="confdelete()">Delete</button>
								</div>
							</form>
						</div>
					</div>
		</div>
	</div>
</div>
