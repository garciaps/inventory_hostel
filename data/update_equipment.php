<?php 
require_once('../class/Equipment.php');
if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);

	
	$iN  = $data[0]; 	//TAG ID	
	$sN  = $data[1];	//NAME
	$mN  = $data[2];	//ROOM	
	$b   = $data[3]; 		//BRAND	
	$a   = $data[4]; //QUANTITY			
	$iID = $data[5];//ID
// return $iID;
	

//INSERT BORROWED ITEMS
	$isBorrowed = $item->check_borrowed();
	//foreach($isBorrowed as $items){
		//if($items['status']==NULL && $items['tagid']==$iN){
			$id = $item->gettingId($iN);
			$updateBorrowTool = $item->update_borrow_tools($iN,$sN,$mN,$a);
			if($updateBorrowTool){
				$resulta = $item->update_tool($a,$iN);
				if($resulta){
					$result = $item->update_equipment($iN, $sN, $mN, $b, $a,$iID);
						if($result){
								$result['msg'] = 'Data Updated Successfully!';
							echo json_encode($result);
							
						}
				}
			}
		
		//}
	//}
	}	

$item->Disconnect();
 ?>

					