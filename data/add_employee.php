<?php 
require_once('../class/Employee.php');

if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);
	$fN = $data[0]; //ACOUNT NAME
	$mN = $data[1]; //USERNAME
	$lN = $data[2];//PASSWORD
	$pos = $data[3];//EMAIL
	$off = $data[4];//OFFICE
	$type = $data[5];//POSITION

	$result['valid'] = $employee->insert_employee($fN, $mN, $lN, $pos, $off, $type);
	if($result['valid']){
		$result['msg'] = 'New Employee Added Successfully!';
		echo json_encode($result);
	}//end
	// echo 'wtf';
}


$employee->Disconnect();
 ?>


