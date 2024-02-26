<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 

$employees = $employee->get_employees();
$room = $item->room();
?>
<div class="modal fade" id="modal-update-item">
	<div class="modal-dialog">
	<div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
			<div class="container-fluid" style="background: rgb(255, 239, 218);">
				<div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
				<h4 class="modal-title">Add Quantity</h4>
			</div>
			<div class="modal-body">
				<!-- main form -->
				<form class="form-horizontal" role="form" id="update-item-formx">
					<input type="hidden" id="iIds1-update">
					<div class="form-group">
					    <label class="control-label col-sm-3" for="tagID-update">Tag ID:</label>
					    <div class="col-sm-9">
						<input type="text" class="form-control" id="tagID-update" value="0" readonly>
						</div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="supplyname-update">Supply Name:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="supplyname-update" readonly>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-9">
					        <input type="hidden" name="room" id="room-update" value="Supplies Room">
					    </div>
					</div>

					  

					 

					   <div class="form-group">
					    <label class="control-label col-sm-3" for="brand-update">Brand:</label>
					    <div class="col-sm-9"> 
					      <input type="text" class="form-control" id="brand-update" readonly>
					    </div>
					  </div>
					  <div class="form-group" >
								<label class="control-label col-sm-3" for="quantity-update">Quantity:</label>
								<div class="col-sm-9"> 
									<center>
								<div class="input-group">
								  <input type="button" value="-" class="button-minus1" data-field="quantity" style="margin-right: 2px;">
								  <input style="width: 50px;"type="number" step="1" max="" value="1" name="quantity" class="quantity-field" id="quantity-update">
								  <input type="button" value="+" class="button-plus1" data-field="quantity"  style="margin-left: 2px;">
								</div>
							
								</div>
							</div>
						</center>
		

					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10" style="display: flex; gap:30px;">
		<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>

					      <button type="submit" id="btn-submits" value="add" class="btn btn-success">Save
					      
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
	function updateRoomTools(){
    let room = $("#room-updates-tools").val()
    console.log(room) 
    $("#room-update").val(room)
}

function decrementQuantity() {
    var quantityField = document.getElementById('quantity-update');
    var currentQuantity = parseInt(quantityField.value, 10);

    if (currentQuantity > 1) {
      quantityField.value = currentQuantity - 1;
    }
  }

  function incrementQuantity() {
    var quantityField = document.getElementById('quantity-update');
    var currentQuantity = parseInt(quantityField.value, 10);

    quantityField.value = currentQuantity + 1;
  }

$('.input-group').on('click', '.button-plus1', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus1', function(e) {
  decrementValue(e);
});

</script>