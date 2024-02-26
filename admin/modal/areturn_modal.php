<div class="modal fade" id="modal-returns">
	<div class="modal-dialog">
		<div class="modal-content" style="background-color: rgb(145, 191, 123); padding:10px;">
			<div class="container-fluid" style="background: rgb(255, 239, 218);">
			<div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Return an Item</h4>
			</div>
			<div class="modal-body">
				<!-- form -->
				<form class="form-horizontal" role="form" id="form-returningItem">
				
				
				  <div class="form-group">
					<input type="hidden"  id="uniqueId">
				    <label class="control-label col-sm-2" for="view-item">Item:</label>
				    <div class="col-md-10">
				      <spaninp id="view-items" ></spaninp> <span id="view-quans" class="text-danger"></span>
					  <input type="hidden" id="view-item">
					  <input type="hidden" id="view-quan">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="view-quan">Quantity:</label>
				    <div class="col-sm-10">
				      <input type="number" class="form-control" id="set-quan" >
				    </div>
					
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="view-quan">Condition:</label>
				    <div class="col-sm-10">
				      <select type="text" placeholder="Condition" class="form-control" id="condition" >
						<option> Good </option>
						<option> Defective </option>
						<option> Damaged </option>
</select>
				    </div>
					
				  </div>
				  <input type="hidden" id="date_borrowed">
				  <input type="hidden" id="tag_id">
				  <input type="hidden" id="category">
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Submit</button>
					</div>
				  </div>
				 

				</form>
				<!--end  form -->
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
</div>
 
<style> 

</style>