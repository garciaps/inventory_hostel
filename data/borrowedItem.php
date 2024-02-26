<?php 
require_once('../class/Item.php');
if(isset($_POST['datas'])){
	$data = json_decode($_POST['datas'], true);

	$items = $data[0];
	$name = $data[1];
	$dateB = $data[2];
	$contact = $data[3];
	$whereit = $data[4];
	$returnD = $data[5];
	$quantity = $data[6];
	$category = $data[7];
	$tagid = $data[8];
	$room = $data[9];
	$updatedQuan = $data[10];
	$borrowedStatus = '';
	

		if($category=="Supplies"){
			$borrowedStatus = "Consumed";
			$res = $item->update_items($updatedQuan-$quantity,$tagid,$quantity); 
		}else if($category=="Tools"){
			$borrowedStatus = "Borrowed";
			$res = $item->update_tools($updatedQuan-$quantity,$tagid,$quantity); 
		}if($category=="Equipment"){
			$borrowedStatus = "Borrowed";
			$res = $item->update_equip($updatedQuan-$quantity,$tagid,$quantity); 
		}
		if($res){
			// $results = $item->insert_borrow($items,$name,$dateB,$contact,$whereit,$returnD,$quantity,$category,$tagid,$room);
			$results = $item->insert_borrowed($items,$name,$dateB,$contact,$whereit,$returnD,$quantity,$category,$tagid,$room,$borrowedStatus);
		
			if($results){

				$results['msg'] = "Item Borrowed Successfully!";
				$results['action'] = "Add Data";
				echo json_encode($results);
			}
		}
	
	
	// echo $result;
}else if(isset($_POST['deletes'])){

	$resultsa = $item->delete_report();
	if($resultsa){
		echo json_encode($resultsa);
	}	
	// echo $result;
}

$item->Disconnect();
 ?>

