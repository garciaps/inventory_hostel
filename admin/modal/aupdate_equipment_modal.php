<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 

$employees = $employee->get_employees();
$categories = $item->item_categories();
$conditions = $item->item_conditions();

$room = $item->room();

?>
<div class="modal fade" id="modal-update-equipment">
	<div class="modal-dialog">
		<div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
			<div class="container-fluid" style="background: rgb(255, 239, 218);">
				<div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
					<h4 class="modal-title">Update Equipment</h4>
				</div>
				<div class="modal-body">
					<!-- main form -->
					<form class="form-horizontal" role="form" id="update-equipment-formx">
						<input type="hidden" id="iIds1-equipment-update">
							<div class="form-group">
								<label class="control-label col-sm-3" for="tagID-equipment-update">Tag Identification:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="tagID-equipment-update" value="0" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="itemsname-equipment-update">Supply Name:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="itemsname-equipment-update"  autofocus>
									</div>
							</div>

							<div class="form-group" >
									<label class="control-label col-sm-3" for="room-equipment-update">Room/Area:</label>
									<div class="col-sm-9"> 
									<input type="text" class="form-control" id="room-equipment-update" readonly>
									</div>
							</div>

							<div class="form-group">
									<label class="control-label col-sm-3" for="brand-equipment-update">Brand:</label>
									<div class="col-sm-9"> 
									<input type="text" class="form-control" id="brand-equipment-update" >
									</div>
							</div>
						
							<div class="form-group" >
									<label class="control-label col-sm-3" for="quantity-equipment-update">Quantity:</label>
									
									<center>
								<div class="input-group">
								  <input type="button" value="-" class="button-minus1" data-field="quantity" style="margin-right: 2px;">
								  <input style="width: 50px;"type="number" step="1" max="" value="1" name="quantity" class="quantity-field" id="quantity-equipment-update">
								  <input type="button" value="+" class="button-plus1" data-field="quantity"  style="margin-left: 2px;">
								</div>
							
								</div>
						
						</center>
									
							
					
							<div class="form-group"> 
								<div class="col-sm-offset-2 col-sm-10" style="display: flex; gap:30px;">
									<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
									<button type="submit" id="btn-submits-equipment" value="add" class="btn btn-success">Save</button>
								</div>
							</div>
					</form>
					<!-- /main form -->
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function updateEquipt(){
    let room = $("#room-update-equiptment").val()
    console.log(room) 
    $("#room-equipment-update").val(room)
}

function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal)) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal > 0) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

$('.input-group').on('click', '.button-plus1', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus1', function(e) {
  decrementValue(e);
});

</script>