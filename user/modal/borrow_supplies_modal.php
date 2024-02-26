<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 

$employees = $employee->get_employees();
$categories = $item->item_categories();
$conditions = $item->item_conditions();

?>
<div class="modal fade" id="modal-borrow-item">
	<div class="modal-dialog">
	<div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
			<div class="container-fluid" style="background: rgb(255, 239, 218);">
				<div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
				<h4 class="modal-title">Consuming Details</h4>
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
						<input type="text" class="form-control" id="borrow-item" readonly>
						</div>
					  </div>
	<input type="hidden" id="hidden-quantity">

					<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "hostel";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);

					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					$sql = "SELECT `emp_id`, `accountname`, `office` FROM `tbl_employee` WHERE 1";
					$result = $conn->query($sql);


					// Close the connection
					$conn->close();
					?>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="borrow-name">In-charge:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="borrow-name" value="<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?>" readonly>
					    </div>
					  </div>
					
					  <div class="form-group" >
					    <label class="control-label col-sm-3" for="borrow-where">Purpose of Consuming:</label>
					    <div class="col-sm-9"> 
					      <input type="text" class="form-control" id="borrow-where">
					    </div>
					  </div>
                      <div class="form-group" >
					    <label class="control-label col-sm-3" for="borrow-quantity">Quantity:</label>
						<center>
								<div class="input-group">
								  <input type="button" value="-" class="button-minus1" data-field="quantity" style="margin-right: 2px;">
								  <input style="width: 50px;"type="number" step="1" max="" value="1" name="quantity" class="quantity-field" id="borrow-quantity">
								  <input type="button" value="+" class="button-plus1" data-field="quantity"  style="margin-left: 2px;">
								</div>
							
								</div>
							</div>
						</center>
					 
					  <div class="col-sm-9">
					        <input type="hidden" name="room" id="room" value="Supplies Room">
					    </div>
				
					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10" style="display:flex; gap:30px">
			<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
					      
						<button type="submit" id="btn-submit" value="add" class="btn btn-success">Save
					      <span  aria-hidden="true"></span>
					      </button>
					    </div>
					  </div>
					  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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