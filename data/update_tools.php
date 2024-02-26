<?php 
require_once('../class/Tools.php');
if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);

	
	$iN  = $data[0]; 		//tagid
	$sN  = $data[1];	//toolname
	$mN  = $data[2];	
	$b   = $data[3];  //quantity
	$id = $data[4];			
	$updated = $data[5];			

// return $iID;
$updateBorrowTool = $item->update_borrow_tools($iN,$sN,$mN,$b);
	
	if($updateBorrowTool){
		$resulta = $item->update_tool($iN,$id);
	if($resulta){
	$result = $item->update_tools($iN, $sN, $mN, $b,$id);
	if($result){
			$result['msg'] = 'Data Updated Successfully!';
		echo json_encode($result);
		
	}
	}
	}

}
$item->Disconnect();
