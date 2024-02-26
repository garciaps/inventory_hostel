<?php 
require_once('../class/Equipment.php');
session_start();
if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);

	$iN = $data[0]; //TAGID
	$sN = $data[1];//ITEM NAME
	$mN = $data[2];//ROOM
	$b = $data[3];//BRAND
	$bb = $data[4];//QUANTITY

	

	$checkEquip  = $item->checkEquipmet($sN,$b);
	
	$result ='';
	if($checkEquip){
		
	$results = $item->insert_equipment($iN, $sN, $mN, $b,$bb);
	$borrowed =$item->insert_borrow($sN,'','','','','',$bb,'Equipment',$iN,$mN,'');

	if($results){
		$_SESSION['error'] = "Equipment Added Successfully!";
		$_SESSION['equipmentDisplayed'] = false;

		$result['msg'] = "Equipment Added Successfully!";
		$result['action'] = "Add Data";
		
		echo json_encode($result);
		
		
	}
	}else{
			// $result['msg'] = "The Data is in The Database!";
			$_SESSION['error'] = "The Equipment is Already in the Database!";
			$_SESSION['equipmentDisplayed'] = false;
			// $result['action'] = "Add Data";
			echo json_decode( "The Data is in The Database!");
	}
	// echo $result;
}

$item->Disconnect();
 ?>

