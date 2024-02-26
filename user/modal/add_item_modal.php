<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 

$employees = $employee->get_employees();
$categories = $item->item_categories();
$conditions = $item->item_conditions();
$room = $item->room();
?>
<div class="modal fade" id="modal-add-item">
	<div class="modal-dialog">
		<div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
			<div class="container-fluid" style="background: rgb(255, 239, 218);">
				<div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
					<h4 class="modal-title">Add Item</h4>
				</div>
				<div class="modal-body">
					<!-- main form -->
						<form class="form-horizontal" role="form" id="add-item-form">
							<div class="form-group">
								<label class="control-label col-sm-3" for="tagID">Tag ID:</label>
								<div class="col-sm-9">
								<input type="text" class="form-control" value="<?php echo uniqid()?>" id="tagID" readonly/>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="supplyname">Supply Name:</label>
								<div class="col-sm-9">
								<input type="text" class="form-control" id="supplyname" autofocus>
								</div>
							</div>

							<div class="form-group">
					    <div class="col-sm-9">
					        <input type="hidden" name="room" id="room" value="Supplies Room">
					    </div>
					</div>

					<div class="form-group">
    <label class="control-label col-sm-3" for="Expiry">Expiration Date:</label>
    <div class="col-sm-9"> 
        <input type="date" class="form-control" id="Expiry" required>
    </div>
</div>

<script>
    // JavaScript code to add event listener for date input
    document.addEventListener('DOMContentLoaded', function () {
        var returnDateInput = document.getElementById('Expiry');

        returnDateInput.addEventListener('input', function () {
            var currentDate = new Date();
            var selectedDate = new Date(returnDateInput.value);

            if (selectedDate < currentDate) {
                alert('Please select a future date for the return.');
                returnDateInput.value = ''; // Clear the input value
            }
        });
    });
</script>

<div class="form-group">
    <label class="control-label col-sm-3" for="Unit">Unit of Measurement:</label>
    <div class="col-sm-9">
		<div class=" m-0 p-0 " style="display: flex; padding: 0; margin: 0; gap:10px;">
			<input type="text" id="unitValue" class="form-control">
			
			<select name="Unit" class="form-control" id="Unit" required>
            <option value="mL">Millilitres(mL)</option>
            <option value="L">Litres(L)</option>	
            <option value="g">Grams(g)</option>
            <option value="kg">Kilograms(kg)</option>
			<option value="pc">Piece(pc)</option>
        </select>
		</div>
       
    </div>
</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="brand">Brand:</label>
								<div class="col-sm-9"> 
								<input type="text" class="form-control" id="brand">
								</div>
							</div>
							
							<div class="form-group" >
								<label class="control-label col-sm-3" for="quantity">Quantity:</label>
								<div class="col-sm-9"> 
									<center>
								<div class="input-group">
								  <input type="button" value="-" class="button-minus1" data-field="quantity" style="margin-right: 2px;">
								  <input style="width: 50px;"type="number" step="1" max="" value="1" name="quantity" class="quantity-field" id="quantity">
								  <input type="button" value="+" class="button-plus1" data-field="quantity"  style="margin-left: 2px;">
								</div>
							
								</div>
							</div>
						</center>

					
							<div class="form-group"> 
								<div class="col-sm-offset-2 col-sm-10" style="display: flex; gap:30px;">
									<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
									<button type="submit" id="btn-submit" value="add" class="btn btn-success">Save
										
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

$('.input-group').on('click', '.button-plus1', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus1', function(e) {
  decrementValue(e);
});

</script>