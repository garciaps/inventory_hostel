<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 

$employees = $employee->get_employees();
$categories = $item->item_categories();
$conditions = $item->item_conditions();

?>
<div class="modal fade" id="modal-return-item">
	<div class="modal-dialog">
	<div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
			<div class="container-fluid" style="background: rgb(255, 239, 218);">
				<div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
				<h4 class="modal-title">Borrowing Details</h4>
			</div>
			<div class="modal-body">
				<!-- main form -->
					<form class="form-horizontal" role="form" id="borrow-item-form">
					<input type="hidden" name="borrow-category" id="borrow-category" value="Supplies">
					<input type="hidden" id="borrow-tagid-item">
					<input type="hidden" id="borrow-room-item">
					<div class="form-group">
					    <label class="control-label col-sm-3" for="borrow-item">Item:</label>
					    <div class="col-sm-9">
						<input type="text" class="form-control" id="borrow-item">
						</div>
					  </div>
	<input type="hidden" id="hidden-quantity">
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="borrow-name">Name:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="borrow-name" autofocus>
					    </div>
					  </div>

					  <div class="form-group" >
					    <label class="control-label col-sm-3" for="borrow-date">Date Borrowed:</label>
					    <div class="col-sm-9"> 
					      <input type="date" class="form-control" id="borrow-date">
					    </div>
					  </div>

					   <div class="form-group">
					    <label class="control-label col-sm-3" for="borrow-contact">Contact Number:</label>
					    <div class="col-sm-9"> 
					      <input type="number" class="form-control" id="borrow-contact">
					    </div>
					  </div>
					
					  <div class="form-group" >
					    <label class="control-label col-sm-3" for="borrow-where">Where will be used:</label>
					    <div class="col-sm-9"> 
					      <input type="text" class="form-control" id="borrow-where">
					    </div>
					  </div>
                      <div class="form-group" >
					    <label class="control-label col-sm-3" for="borrow-return">Return date:</label>
					    <div class="col-sm-9"> 
					      <input type="date" class="form-control" id="borrow-return">
					    </div>
					  </div>
                      <div class="form-group" >
					    <label class="control-label col-sm-3" for="borrow-quantity">Quantity:</label>
					    <div class="col-sm-9"> 
					      <input type="number" class="form-control" id="borrow-quantity">
					    </div>
					  </div>
					 

					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10" style="display:flex; gap:30px">
			<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
					      
						<button type="submit" id="btn-submit" value="add" class="btn btn-primary">Save
					      <span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
					      </button>
					    </div>
					  </div>
					</form>
				<!-- /main form -->
			</div>
			</div>
		</div>
	</div>
</div>
