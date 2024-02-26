<?php 
include_once('../data/user_session.php');//check if naay session otherwise e return sa login
include_once('../include/header.php'); 
include_once('../include/banner.php'); 


?>
<div class="modal fade" id="modal-borrow-tools">
	<div class="modal-dialog">
	<div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
			<div class="container-fluid" style="background: rgb(255, 239, 218);">
				<div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
				<h4 class="modal-title">Borrowing Details</h4>
			</div>
			<div class="modal-body">
				<!-- main form -->
					<form class="form-horizontal" role="form" id="borrow-tool-form">
					<input type="hidden" id="borrow-tool-category" value="Tools">
					<input type="hidden" id="borrow-tagid-tool">
					<input type="hidden" id="borrow-room-tool">
					<input type="hidden" id="toolquantity">
					<div class="form-group">
					    <label class="control-label col-sm-3" for="borrow-tool-item">Item:</label>
					    <div class="col-sm-9">
						<input type="text" class="form-control" id="borrow-tool-item" readonly>
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
					    <label class="control-label col-sm-3" for="borrow-tool-name">Select a Name:</label>
					    <div class="col-sm-9">
					        <input type="text" class="form-control" id="borrow-tool-name" value="<?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?>" readonly>
					    </div>
					</div>

					<div class="form-group">
    					<label class="control-label col-sm-3" for="borrow-tool-contact" required>Contact Number:</label>
    					<div class="col-sm-9"> 
        					<input type="text" class="form-control" id="borrow-tool-contact" pattern="[0-9]+"
							oninput="numbersOnly(event)" minlength="11" maxlength="11"  placeholder="e.g., 09123456789" required>
    					</div>
					</div>

<script>
function numbersOnly(event) {
    event.target.value = event.target.value.replace(/\D/g, '');
}

</script>

					
					  <div class="form-group" >
					    <label class="control-label col-sm-3" for="borrow-tool-where">Purpose of Borrowing:</label>
					    <div class="col-sm-9"> 
					      <input type="text" class="form-control" id="borrow-tool-where">
					    </div>
					  </div>
                      <div class="form-group" >
					    <label class="control-label col-sm-3" for="borrow-tool-return">Anticipated Return Date:</label>
					    <div class="col-sm-9"> 
					      <input type="date" class="form-control" id="borrow-tool-return">
					    </div>
					  </div>
					  <script>
								// JavaScript code to add event listener for date input
								document.addEventListener('DOMContentLoaded', function () {
									var returnDateInput = document.getElementById('borrow-tool-return');

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
					    <label class="control-label col-sm-3" for="borrow-tool-quantity">Quantity:</label>
						  <center>
								<div class="input-group">
								  <input type="button" value="-" class="button-minus1" data-field="quantity" style="margin-right: 2px;">
								  <input style="width: 50px;"type="number" step="1" max="" value="1" name="quantity" class="quantity-field" id="borrow-tool-quantity">
								  <input type="button" value="+" class="button-plus1" data-field="quantity"  style="margin-left: 2px;">
								</div>
							
								</div>
							</div>
						</center>

					  <div class="form-group">
					    <div class="col-sm-9">
					        <input type="hidden" name="borrow-room-tool" id="borrow-room-tool" value="Tools Room">
					    </div>
					</div>

					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10" style="display: flex; gap:30px;">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
					      
						<button type="submit" id="btn-submited" value="add" class="btn btn-success">Save
					     
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