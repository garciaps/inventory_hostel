<?php 
require_once('../class/Employee.php');

if(isset($_POST['eid'])){
	
	$eid = $_POST['eid'];

	// $result = $employee->employee_remove_undo($emp_at_deped, $eid);
	
	$result['valid'] = $employee->employee_remove_undo( $eid);
	if($result['valid']){
		$result['msg'] = 'success';
		echo json_encode($result);
	}


	// $result['msg'] = 'success';
	// echo json_encode($result);
	// echo $result;
}

$employee->Disconnect();



