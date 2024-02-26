<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 

$room = $item->room();
?>
<div class="modal fade" id="modal-add-equipment">
	<div class="modal-dialog">
	<div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
			<div class="container-fluid" style="background: rgb(255, 239, 218);">
				<div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
					<h4 class="modal-title">Add Equipment</h4>
				</div>
				<div class="modal-body">
					<!-- main form -->
						<form class="form-horizontal" role="form" id="add-equipment-form">
						<div class="form-group">
							<label class="control-label col-sm-3" for="tagID-equipment">Tag ID:</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" value="<?php echo uniqid()?>" id="tagID-equipment" readonly/>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-3" for="itemname-equipment">Item Name:</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" id="itemname-equipment" autofocus>
							</div>
						</div>

						<div class="form-group">
					    <div class="col-sm-9">
					        <input type="hidden" name="room-equipment" id="room-equipment" value="Equipment Room">
					    </div>
					</div>

						<div class="form-group">
							<label class="control-label col-sm-3" for="brand-equipment">Brand:</label>
							<div class="col-sm-9"> 
							<input type="text" class="form-control" id="brand-equipment">
							</div>
						</div>
						
						<div class="form-group" >
							<label class="control-label col-sm-3" for="quantity-equipment" >Quantity:</label>
							
							<div class="col-sm-9"> 
								<center>
							<div class="input-group">
								  <input type="button" value="-" class="button-minus2" data-field="quantity" style="margin-right: 2px;">
								  <input style="width: 50px;"type="number" step="1" max="" value="1" name="quantity" class="quantity-field" id="quantity-equipment">
								  <input type="button" value="+" class="button-plus2" data-field="quantity"  style="margin-left: 2px;">
							
								</div>

							</div>
						</div>
					</center>

						

						<div class="form-group"> 
							<div class="col-sm-offset-3 col-sm-10" style="display:flex;gap:30px;">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>

							<button type="submit" id="btn-submit-equipment" value="add" class="btn btn-success">Save
							
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


<script>
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

$('.input-group').on('click', '.button-plus2', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus2', function(e) {
  decrementValue(e);
});

</script>