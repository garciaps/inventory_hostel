<?php
require_once('../class/Item.php');
require_once('../class/Report.php');
session_start();
if (isset($_POST['data'])) {
	$data = json_decode($_POST['data'], true);

	$iN = $data[0]; //tagId
	$sN = $data[1]; //SupplyName
	$mN = $data[2]; //room
	$b = $data[3]; //expiry
	$e = $data[4]; //unit
	$u = $data[5]; //brand
	$a = $data[6]; //quan
	$unitValue = $data[7];


	$checkSupplies = $item->checkSupplies($sN, $b, $u, $unitValue . $e); //CHECK ALL THE DATA
	$checkSuppliesuna = $item->samelahat($sN, $b, $u, $unitValue . $e); //CHECK ALL THE DATA
	
	if ($checkSupplies) { //IBA :AHAT
		
		
		$results = $item->insert_item($iN, $sN, $mN, $u, $b, $e, $a, $unitValue);
		$borrowed = $reps->insert_borrower($sN, '', '', '', '', '', $a, 'Supplies', $iN, $mN, $b, $unitValue, $e);
		if ($results) {
			$result['msg'] = "Item Added Successfully!";
			$result['action'] = "Add Data";
			echo json_encode($result);
			$_SESSION['error'] = "Item Added Successfully!";
						$_SESSION['dataDisplayed'] = false;
		}
	
	} else if ($checkSuppliesuna) {
	

		$checkBoth = $item->checkBoth($sN, $b, $u, $unitValue . $e); //SAME NAME DIFFERENT ALL

		if ($checkBoth) {
			
			
			$results = $item->insert_item($iN, $sN, $mN, $u, $b, $e, $a, $unitValue);
			$borrowed = $reps->insert_borrower($sN, '', '', '', '', '', $a, 'Supplies', $iN, $mN, $b, $unitValue, $e);
			if ($results) {
				$result['msg'] = "Item Added Successfully!";
				$result['action'] = "Add Data";
				echo json_encode($result);
				$_SESSION['error'] = "Item Added Successfully!";
						$_SESSION['dataDisplayed'] = false;
			}
	
		} else {
			
			$checkThree = $item->checkBoth5($sN, $b, $u, $unitValue.$e); //Check if AlL Three are equal NOE PLEASE LOOK THE FUNCTION INSIDE
	
			if ($checkThree) {
				
				$checkBoth2 = $item->checkBoth2($sN, $b, $u, $unitValue . $e); //Different Unit
				$checkBoth3 = $item->checkBoth3($sN, $b, $u, $unitValue . $e); //Different Brand
				$checkBoth4 = $item->checkBoth4($sN, $b, $u, $unitValue . $e); //Different Expiry
	
				if ($checkBoth4) { //SAME ALL DIFFENENT EXPIRY
					$results = $item->insert_item($iN, $sN, $mN, $u, $b, $e, $a, $unitValue);
					$borrowed = $reps->insert_borrower($sN, '', '', '', '', '', $a, 'Supplies', $iN, $mN, $b, $unitValue, $e);
					if ($results) {
						$result['msg'] = "Item Added Successfully!";
						$result['action'] = "Add Data";
						echo json_encode($result);
						$_SESSION['error'] = "Item Added Successfully!";
						$_SESSION['dataDisplayed'] = false;
					}

				} else {
					if ($checkBoth2) { //SAME ALL DUFFERENT UNIT
						$results = $item->insert_item($iN, $sN, $mN, $u, $b, $e, $a, $unitValue);
						$borrowed = $reps->insert_borrower($sN, '', '', '', '', '', $a, 'Supplies', $iN, $mN, $b, $unitValue, $e);
						if ($results) {
							$result['msg'] = "Item Added Successfully!";
							$result['action'] = "Add Data";
							echo json_encode($result);
							$_SESSION['error'] = "Item Added Successfully!";
						$_SESSION['dataDisplayed'] = false;
						}

					} else { 
						if ($checkBoth3) { //SAME ALL DIFFRENT BRAND
						
							$results = $item->insert_item($iN, $sN, $mN, $u, $b, $e, $a, $unitValue);
							$borrowed = $reps->insert_borrower($sN, '', '', '', '', '', $a, 'Supplies', $iN, $mN, $b, $unitValue, $e);
							if ($results) {
								$result['msg'] = "Item Added Successfully!";
								$result['action'] = "Add Data";
								echo json_encode($result);
								$_SESSION['error'] = "Item Added Successfully!";
						$_SESSION['dataDisplayed'] = false;
							}

							
						}
					}
				}

			
			} else {
				$checkBoth1 = $item->checkBoth1($sN, $b, $u, $unitValue.$e);
				if ($checkBoth1) { //Same Name Same Brand
					$results = $item->insert_item($iN, $sN, $mN, $u, $b, $e, $a, $unitValue);
					$borrowed = $reps->insert_borrower($sN, '', '', '', '', '', $a, 'Supplies', $iN, $mN, $b, $unitValue, $e);
					if ($results) {
						$result['msg'] = "Item Added Successfully!";
						$result['action'] = "Add Data";
						echo json_encode($result);
						$_SESSION['error'] = "Item Added Successfully!";
						$_SESSION['dataDisplayed'] = false;
						
					}

				}
			}
		}
	} else {
		$result['msg'] = "the Supply is in The Database!";
		$_SESSION['error'] = "The Supply is Already in the Database!";
						$_SESSION['dataDisplayed'] = false;
		echo json_encode($result);
		echo $result;
	}



}

$item->Disconnect();
