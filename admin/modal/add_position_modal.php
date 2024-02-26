<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 

$room = $item->room();
?>

<div class="modal fade" id="modal-add-tools">
	<div class="modal-dialog">
	<div class="modal-content"  style="background-color: rgb(145, 191, 123); padding:10px;">
			<div class="container-fluid" style="background: rgb(255, 239, 218);">
				<div class="modal-header" style="border-bottom: 4px solid rgb(235, 205, 167);">
					<h4 class="modal-title">Add Tools</h4>
				</div>
				<div class="modal-body">
					<!-- main form -->
						<form class="form-horizontal" role="form" id="add-tools-form">
					
							<div class="form-group">
								<label class="control-label col-sm-3" for="tagID-tools">Tag ID:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="<?php echo uniqid()?>" id="tagID-tools" readonly/>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="toolname">Tool Name:</label>
									<div class="col-sm-9">
									<input type="text" class="form-control" id="toolname"  autofocus>
									</div>
							</div>

							<div class="form-group">
					    <div class="col-sm-9">
					        <input type="hidden" name="room-tools" id="room-tools" value="Tools Room">
					    </div>
					</div>

							<div class="form-group" >
								<label class="control-label col-sm-3" for="quantity-tools">Quantity:</label>
								<div class="col-sm-9"> 
									<center>
							<div class="input-group">
								  <input type="button" value="-" class="button-minus" data-field="quantity" style="margin-right: 2px;">
								  <input style="width: 50px;"type="number" step="1" max="" value="1" name="quantity" class="quantity-field" id="quantity-tools">
								  <input type="button" value="+" class="button-plus" data-field="quantity"  style="margin-left: 2px;">
								</div>
								</div>
							</div>
						</center>
							
							<div class="conatiner" style="margin-left: 100px; width: 50%; padding-bottom: 20px;">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancel</button>
								<button type="submit" class="btn btn-success">Save</button>
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

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});

</script>