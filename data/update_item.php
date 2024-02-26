<?php 
require_once('../class/Item.php');
if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);

	
	$iN  = $data[0];//TAGID
	$sN  = $data[1];//NAME
	$mN  = $data[2];//ROOM
	$b   = $data[3];//BRAND	
	$a   = $data[4];//QUANTITY
	$iID = $data[5];//ID
// return $iID;

	$updateBorrowTool = $item->update_borrow_tools($iN,$sN,$mN,$a);
	
	if($updateBorrowTool){
		$resulta = $item->update_tool($a,$iN);
		if($resulta){
			$result = $item->update_item($iN, $sN, $mN, $b, $a,$iID);
				if($result){
						$result['msg'] = 'Data Updated Successfully!';
					echo json_encode($result);
					
				}
		}
	}

}
$item->Disconnect();
 ?>

					