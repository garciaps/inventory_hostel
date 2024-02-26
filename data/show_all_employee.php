<?php 
require_once('../class/Employee.php'); 
$employees = $employee->get_employees();
// echo '<pre>';
// 	print_r($employees);
// echo '</pre>';
?>

<br />
<table id="myTable-employee" class="table table-bordered" cellspacing="0" width="100%" style="text-align: center;">
	<thead>
	    <tr>
	        <th style="text-align: center;">Account Name</th>
	        <th style="text-align: center;">Position</th>
	        <th style="text-align: center;">Office</th>
	        <th style="text-align: center;"><center>Action</center></th>
	    </tr>
	</thead>
    <tbody>
		<?php 
			foreach ($employees as $emp) {
				$mN = $emp['accountname'];
				$pos = $emp['position'];
				$off = $emp['office'];
			
				$id = $emp['emp_id'];
		?>
			<tr>
				<td><?php echo $mN ?></td>
				<td><?php echo $pos ?></td>
				<td><?php echo $off ?></td>
				<td align="center" width="180px">
						<button type="button" onclick="edit_employee_fill('<?php echo $id; ?>');" class="btn btn-warning btn-sm" title = "Edit" >
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
			
							<button type="button" class="btn btn-danger btn-sm" title="Delete" onclick="confirmDelete('<?php echo $id; ?>')">
    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</button>

<script>
function confirmDelete(employeeId) {
    // Use the confirm function to show a pop-up dialog
    var confirmation = confirm("Are you sure you want to delete this employee?");

    // If the user clicks OK, proceed with the deletion
    if (confirmation) {
        // Call your delete_employee function or perform the deletion logic here
        employee_remove_undo(employeeId);
    } else {
        // If the user clicks Cancel, do nothing or provide feedback
        console.log("Deletion canceled");
    }
}
</script>

				
					
				</td>
			</tr>
		<?php
			}//end foreach employees
		 ?>
    </tbody>
</table>


<?php 
// $db->Disconnect();
 ?>

<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-employee').DataTable();
	});
</script>

<style>
        #myTable-employee {
            font-size: 16px; /* Set your desired font size here */
        }

        #myTable-employee th,
        #myTable-employee td {
            padding: 10px; /* Adjust padding as needed */
       }
    </style>