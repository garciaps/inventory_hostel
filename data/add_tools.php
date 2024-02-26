<?php 
require_once('../class/Tools.php');
session_start();
if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);

	$iN = $data[0];//TAGID
	$sN = $data[1];//TOOLNAME
	$mN = $data[2];//ROOM
	$b = $data[3];//QUANTITY
	

	
	
	$checkTools = $item->checkTools($sN);
	// return $checkTools;
	$result ='';
	if($checkTools){
	
		$results = $item->insert_tools($iN, $sN, $mN, $b);
		$borrowed =$item->insert_borrow($sN,'','','','','',$b,'Tools',$iN,$mN,'');
		if($results){
			$_SESSION['error'] = "Tools Added Successfully!";	
			$_SESSION['toolDisplayed'] = false;
		
			$result['msg'] = "Tool Added Successfully!";
			$result['action'] = "Add Data";
			echo json_encode($result);
		}
	}else{
		$_SESSION['error'] = "The Tools is Already in the Database!";
		$_SESSION['toolDisplayed'] = false;
			$result['msg'] = "The Data is in The Database!";
			$result['action'] = "Add Data";
		
			return "The Data is in The Database!";
	}
	
	
}

$item->Disconnect();
 ?>

