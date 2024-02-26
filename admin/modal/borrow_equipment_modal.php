<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 
include_once('../data/user_session.php');//check if naay session otherwise e return sa login
include_once('../include/header.php'); 
include_once('../include/banner.php'); 

$employees = $employee->get_employees();
$categories = $item->item_categories();
$conditions = $item->item_conditions();

?>
<div class="modal fade" id="modal-borrow-equipment">
	<div class="modal-dialog">
	<div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
			<div class="container-fluid" style="background: rgb(255, 239, 218);">
				<div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
				<h4 class="modal-title">Borrowing Details</h4>
			</div>
			<div class="modal-body">
				<!-- main form -->
					<form class="form-horizontal" role="form" id="borrow-equipment-form">
					<input type="hidden" name="borrow-category" id="borrow-equipment-category" value="Equipment">
					<input type="hidden" id="borrow-tagid-equip">
					<input type="hidden" id="borrow-room-equip">
	
					<div class="form-group">
					<input type="hidden" id="quantity-equipments">
					    <label class="control-label col-sm-3" for="borrow-equipment-item" required>Item:</label>
					    <div class="col-sm-9">
						<input type="text" class="form-control" id="borrow-equipment-item" readonly>
						</div>
					  </div>

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
					    <label class="control-label col-sm-3" for="borrow-equipment-name">Select a Name:</label>
					    <div class="col-sm-9">
					        <input type="text" class="form-control" id="borrow-equipment-name" value="<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?>" readonly>
					    </div>
					</div>



					<div class="form-group">
    					<label class="control-label col-sm-3" for="borrow-equipment-contact" required>Contact Number:</label>
    					<div class="col-sm-9"> 
        					<input type="text" class="form-control" id="borrow-equipment-contact" pattern="[0-9]+"
            				oninput="numbersOnly(event)" minlength="11" maxlength="11" placeholder="09123456789" required>
   		 				</div>
					</div>

					<script>
					function numbersOnly(event) {
						event.target.value = event.target.value.replace(/\D/g, '');
					}

					</script>
					<div class="form-group">
					    <div class="col-sm-9">
					        <input type="hidden" name="room-equipment" id="room-equipment" value="Equipment Room">
					    </div>
					</div>

					
					  <div class="form-group" >
					    <label class="control-label col-sm-3" for="borrow-equipment-where" required>Purpose of Borrowing:</label>
					    <div class="col-sm-9"> 
					      <input type="text" class="form-control" id="borrow-equipment-where">
					    </div>
					  </div>
                      <div class="form-group" >
					    <label class="control-label col-sm-3" for="borrow-equipment-return" required>Anticipated Return Date:</label>
					    <div class="col-sm-9"> 
					      <input type="date" class="form-control" id="borrow-equipment-return">
					    </div>
					  </div>
					  <script>
// JavaScript code to add event listener for date input
document.addEventListener('DOMContentLoaded', function () {
    var returnDateInput = document.getElementById('borrow-equipment-return');

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
                      <div class="form-group" >
					    <label class="control-label col-sm-3" for="borrow-equipment-quantity">Quantity:</label>
						<CENTER>
					    <div class="input-group">
								  <input type="button" value="-" class="button-minus1" data-field="quantity" style="margin-right: 2px;">
								  <input style="width: 50px;"type="number" step="1" max="" value="1" name="quantity" class="quantity-field" id="borrow-equipment-quantity">
								  <input type="button" value="+" class="button-plus1" data-field="quantity"  style="margin-left: 2px;">
								</div>
							
								</div>
							</div>
						</center>

					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10" style="display:flex; gap:30px;">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>

					      <button type="submit" id="btn-submit" value="add" class="btn btn-success">Save
					          </button>
					    </div>
					  </div>
					</form>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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