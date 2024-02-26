<?php
require_once('../database/Database.php');
require_once('../interface/iItem.php');
include_once('../data/user_session.php');//check if naay session otherwise e return sa login
require_once('Activity.php');
class Item extends Database implements iItem{
	
	public function __construct()
	{
		parent:: __construct();
	}

	
	public function insert_item($iN, $sN, $mN, $b, $e, $u, $a,$last)
	{
	
		$insertQuery = "INSERT INTO tbl_items(tagid, supplyname, room, brand, Expiry, Unit, quantity)
						VALUES (?, ?, ?, ?, ?, ?, ?);";
	
		$result = $this->insertRow($insertQuery, [$iN, $sN, $mN, $b, $e, $last.$u, $a]);
		
		date_default_timezone_set('Asia/Manila');
        $userName = $_SESSION['user'];
        $date = date("Y-m-d");
        $data = 'Added';

        $sqls = "INSERT INTO logs(name,item,quantity,activity) VALUES(?,?,?,?);";
         $this->insertRow($sqls,[$userName,$sN,$a,$data]);

		if ($result) {
			// Insertion successful	$act->addActivity();
			return true;
		} else {
			// Insertion failed
			return false;
		}
	}
	

	
	public function update_item($iN, $sN, $mN, $b, $a, $iID)
{
    // Retrieve the current quantity from tbl_items
    $currentQuantityQuery = "SELECT quantity FROM tbl_items WHERE id = ?";
    $currentQuantity = $this->getRow($currentQuantityQuery, [$iID]);

    if ($currentQuantity) {
        // Assume you have a method to get the logged-in user information
        $userSession = isset($_SESSION['user']) ? $_SESSION['user'] : 'DefaultUserSession';

        // Calculate the new quantity by adding the provided quantity
        $newQuantity = $currentQuantity['quantity'] + $a;

        // Update tbl_items with the new quantity
        $updateItemsSql = "UPDATE tbl_items
                           SET 
                           tagid = ?, 
                           supplyname = ?, 
                           room = ?, 
                           brand = ?, 
                           quantity = ?
                           WHERE id = ?;";

        $this->updateRow($updateItemsSql, [$iN, $sN, $mN, $b, $newQuantity, $iID]);

        // Update supp_borrowed with the sum of the inputted quantity and the current quantity
        $updateBorrowedSql = "UPDATE supp_borrowed
                              SET 
                              item = ?, 
                              room = ?, 
                              quantity = quantity + ?
                              WHERE tagid = ? AND status = 'Added';";

        $this->updateRow($updateBorrowedSql, [$sN, $mN, $a, $iN]);

        // Insert a new record into borrower_history with the logged-in user's name and a status of 'Delivered'
        $insertHistorySql = "INSERT INTO borrower_history (name, category, tagid, item, room, quantity, status)
                             VALUES (?, ?, ?, ?, ?, ?, 'Delivered');";

				date_default_timezone_set('Asia/Manila');
				$userName = $_SESSION['user'];
				$date = date("Y-m-d");
				$data = 'Delivered';

				$insertLogsSql = "INSERT INTO logs(name, item, quantity, activity) VALUES (?, ?, ?, ?);";
$this->insertRow($insertLogsSql, [$userName, $sN, $a, $data]);

        $this->insertRow($insertHistorySql, [$userSession, $sN, $mN, $sN, $mN, $a]);

        return true; // Successfully updated tbl_items, supp_borrowed, and added to borrower_history
    }

    return false; // Unable to retrieve current quantity
}




	public function update_borrow_tools($tag, $name, $room,$quantity)
	{	
		$sql="UPDATE supp_borrowed
		 	  SET 
	 		  item = ?, 
			  room = ?, 
			  quantity = ?
			  WHERE tagid = ? AND status IS NULL;
		";
		$result = $this->updateRow($sql, [ $name, $room,$quantity,$tag]);
		return $result;
	}
	public function update_tool($iN,$id)
	{	
		$sql="UPDATE equipment
		 	  SET  
			  quantity = ?
			  WHERE id = ?;
		";
		$result = $this->updateRow($sql, [$iN,$id]);


		return $result;
	}
	public function update_items($iN, $iID,$a)
{	
		
	$show = "SELECT * FROM tbl_items WHERE tagid = ? ;";
	$datas = $this->getRow($show,[$iID]);
	
	date_default_timezone_set('Asia/Manila');
        $userName = $_SESSION['user'];
        $date = date("Y-m-d");
        $data = 'Consumed';

        $sqls = "INSERT INTO logs(name,date,item,quantity,activity) VALUES(?,?,?,?,?);";
         $this->insertRow($sqls,[$userName,$date,$datas['supplyname'],$a,$data]);


    // Update supp_borrowed with status 'Added'
    $updateBorrowedSql = "UPDATE supp_borrowed
                          SET
                          quantity = ?
                          WHERE tagid = ? AND status = 'Added';";

    $resultBorrowed = $this->updateRow($updateBorrowedSql, [$iN, $iID]);

    // Update tbl_items
    $updateItemsSql = "UPDATE tbl_items
                       SET
                       quantity = ?
                       WHERE tagid = ?;";

    $resultItems = $this->updateRow($updateItemsSql, [$iN, $iID]);



    // Return true if both updates are successful, otherwise return false
    return ($resultBorrowed && $resultItems);
}



	public function update_tools($iN,$iID,$a)
	{	
		$show = "SELECT * FROM tbl_tools WHERE tagid = ? ;";
		$datas = $this->getRow($show,[$iID]);
		
		date_default_timezone_set('Asia/Manila');
			$userName = $_SESSION['user'];
			$date = date("Y-m-d");
			$data = 'Borrowed';
	
			$sqls = "INSERT INTO logs(name,item,quantity,activity) VALUES(?,?,?,?);";
			 $this->insertRow($sqls,[$userName,$datas['toolname'],$a,$data]);

			 
		$sql="UPDATE tbl_tools
		 	  SET  
			  quantity = ?
			  WHERE tagid = ?;
		";
		$result = $this->updateRow($sql, [$iN,$iID]);
		return $result;
	}
	public function update_equip($iN,$iID,$a)
	{	

		$show = "SELECT * FROM equipment WHERE tagid = ? ;";
		$datas = $this->getRow($show,[$iID]);
		
		date_default_timezone_set('Asia/Manila');
			$userName = $_SESSION['user'];
			$date = date("Y-m-d");
			$data = 'Borrowed';
	
			$sqls = "INSERT INTO logs(name,item,quantity,activity) VALUES(?,?,?,?);";
			 $this->insertRow($sqls,[$userName,$datas['itemname'],$a,$data]);

			 
		$sql="UPDATE equipment
		 	  SET  
			  quantity = ?
			  WHERE tagid = ?;
		";
		$result = $this->updateRow($sql, [$iN,$iID]);
		return $result;
	}
	public function get_quantity($id)
	{
		$sql="SELECT quantity
			  FROM tbl_items
			  WHERE tagid = $id
		";
		$result = $this->getRow($sql);
		return $result;
	}

	public function get_item($id)
	{
		$sql="SELECT *
			  FROM tbl_items
			  WHERE id = ?
		";
		$result = $this->getRow($sql, [$id]);
		return $result;
	}

	public function get_all_items()
	{
		/*get all items with the office nga naa sa emp*/
		$sql = "SELECT *
				FROM tbl_items
		";
		$result = $this->getRows($sql);
		return $result;
	}

	public function item_categories()
	{
		$sql = "SELECT * FROM tbl_cat";
		return $this->getRows($sql);
	}

	public function item_conditions()
	{
		$sql = "SELECT * FROM tbl_con";
		return $this->getRows($sql);
	}

// ... (Your existing code)

public function delete_item($eid)
{
    // Fetch item details before deleting
    $sqlSelect = "SELECT id, tagid, supplyname, Unit, Expiry, brand, quantity FROM tbl_items WHERE id = ?;";
    $itemDetails = $this->getRow($sqlSelect, [$eid]);

    // Check if the item exists
    if (!$itemDetails) {
        // return false; // Item not found
    }

    // Delete the item
    $sqlDelete = "DELETE FROM tbl_items WHERE id = ?;";
    $this->updateRow($sqlDelete, [$eid]);

    // // Assume you have a method to get the logged-in user information
    $userSession = isset($_SESSION['user']) ? $_SESSION['user'] : 'DefaultUserSession';

    // Insert a record into borrower_history with status 'Deleted'
    $sqlInsert = "INSERT INTO borrower_history ( tagid, item, unit, expiry, conditions, quantity, status, category, name)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $values = [
        $itemDetails['tagid'], // Corrected column name
        $itemDetails['supplyname'],
        $itemDetails['Unit'],
        $itemDetails['Expiry'], // Corrected column name
        '-',
        $itemDetails['quantity'],
        'Deleted',
        'Supplies',
        $userSession, // Include the logged-in user as the name
    ];

    $this->insertRow($sqlInsert, $values);

	date_default_timezone_set('Asia/Manila');
	$userName = $_SESSION['user'];
	$date = date("Y-m-d");
	$data = 'Deleted';

	$sqls = "INSERT INTO logs(name,item,quantity,activity) VALUES(?,?,?,?);";
	 $this->insertRow($sqls,[$userName, $itemDetails['supplyname'],'NULL',$data]);

    // if (!$result) {
    //     // Log or print the error message
    //     echo "Error inserting into borrower_history: " . $this->getLastError();
    //     return false;
    // }

    return true;
}

// ... (The rest of your code)





	public function item_report($choice)
	{
		$sql = "";
		if($choice=="all"){
			$sql = "SELECT *
			FROM supp_borrowed";
			
		return $this->getRows($sql);
		}else if($choice == 'Tools'){
			$sql = "SELECT *
					FROM supp_borrowed
					WHERE category = ?";
			return $this->getRows($sql,['tools']);
		}else if($choice == 'Supplies'){
			$sql = "SELECT *
					FROM supp_borrowed
					WHERE category = ?";
			return $this->getRows($sql, ['Supplies']);
		}else if($choice == 'Equipment'){
			//condemed
			$sql = "SELECT *
					FROM supp_borrowed
					WHERE category = ?";
      			return $this->getRows($sql, ["Equipment"]);
		}else if($choice == 'Borrowed'){
			//condemed
			$sql = "SELECT *
					FROM supp_borrowed
					WHERE status = ?";
      			return $this->getRows($sql, ["Borrowed"]);
		}else if($choice == 'Expired'){
			date_default_timezone_set('Asia/Manila');
					$date = date("Y-m-d");
			$sql = "SELECT *
					FROM supp_borrowed
					WHERE expiry < ?";
      			return $this->getRows($sql, [$date]);
		}
	}//end item_report

	public function sorted_with_time_choices($choice,$from,$to){
		$sql="";
		if($choice==="all"){
			$sql="SELECT *
        FROM supp_borrowed
        WHERE ((date_borrowed>=? AND date_borrowed<=?) OR
        (item_created>=? AND item_created<=?))
        ";
		}else if($choice==="Borrowed"){
			$sql="SELECT *
			FROM supp_borrowed
			WHERE ((date_borrowed>=? AND date_borrowed<=?) OR
			(item_created>=? AND item_created<=?)) AND status = '$choice'
			";
			 return $this->getRows($sql,[$from,$to,$from,$to]);
		}else if($choice==="Supplies"){
			$sql="SELECT *
			FROM supp_borrowed
			WHERE ((date_borrowed>=? AND date_borrowed<=?) OR
			(item_created>=? AND item_created<=?)) AND category = '$choice'
			";
		}else if($choice==="Tools"){
			$sql="SELECT *
			FROM supp_borrowed
			WHERE ((date_borrowed>=? AND date_borrowed<=?) OR
			(item_created>=? AND item_created<=?)) AND category = '$choice'
			";
		}else if($choice==="Equipment"){
			$sql="SELECT *
			FROM supp_borrowed
			WHERE ((date_borrowed>=? AND date_borrowed<=?) OR
			(item_created>=? AND item_created<=?)) AND category = '$choice'
			";
		}else if($choice == 'Expired'){
			date_default_timezone_set('Asia/Manila');
					$date = date("Y-m-d");
			$sql = "SELECT *
					FROM supp_borrowed
					WHERE expiry < ? AND ((date_borrowed>=? AND date_borrowed<=?) OR
			(item_created>=? AND item_created<=?))";
      			return $this->getRows($sql, [$date,$from,$to,$from,$to]);
		}
       
        $result = $this->getRows($sql,[$from,$to,$from,$to]);
        return $result;
	}



	public function insert_borrower($one, $userSession, $three, $four, $five, $six, $seven, $eight, $nine, $ten,$eleven,$twelve,$l)
{
    $userSession = isset($_SESSION['user']) ? $_SESSION['user'] : 'DefaultUserSession';
    $status = 'Added';  // Set the status to 'delivered'

    $sql = "INSERT INTO supp_borrowed(item, name, date_borrowed, contactno, whereplace, returndate, quantity, category, tagid, room, status, item_created,expiry,unit)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $results = $this->insertRow($sql, [$one, $userSession, $three, $four, $five, $six, $seven, $eight, $nine, $ten, $status, date('Y-m-d'),$eleven,$twelve.$l]);
    return $results;
}


	public function insert_borrows($one, $two, $three, $four, $five,$six,$seven,$eight,$nine,$ten,$stats,$con)
	{
		$sql = "INSERT INTO supp_borrowed(item, name,date_borrowed,contactno,whereplace,returndate,quantity,category,tagid,room,status,item_created,conditions,expiry,unit)
				VALUES(?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,NULL,NULL);
				
		";
		$results = $this->insertRow($sql, [$one, $_SESSION['user'], $three, $four, $five,$six,$seven,$eight,$nine,$ten,$stats,date('Y-m-d'),$con]);
		return $results;
	}
	// ...

public function insert_borrowed($one, $two, $three, $four, $five, $six, $seven, $eight, $nine, $ten, $eleven)
{
    // Check if the item isd a Tool, Supplies, or Equipment

			$quantityQuery = "";
    if ($eight == "Tools") {
        $quantityQuery = "SELECT quantity FROM tbl_tools WHERE tagid = ?";
    } else if ($eight == "Supplies") {
        $quantityQuery = "SELECT quantity FROM tbl_items WHERE tagid = ?";
    } else if ($eight == "Equipment") {
        $quantityQuery = "SELECT quantity FROM equipment WHERE tagid = ?";
    }

    $quantityResult = $this->getRow($quantityQuery, [$nine]);

    if ($quantityResult) {
        // Proceed with the insertion without checking the quantity
        $sql = "INSERT INTO supp_borrowed(item, name, date_borrowed, contactno, whereplace, returndate, quantity, category, tagid, room, status)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $results = $this->insertRow($sql, [$one, $two, $three, $four, $five, $six, $seven, $eight, $nine, $ten, $eleven]);

        if($results){
	
		//UPDATE THE MAIN ITEM IN TTHE SPP BORROWED
		
		$updateBorrowedSql = "UPDATE supp_borrowed SET quantity = ? WHERE tagid = ? AND status IS NULL";
		$checks = $this->updateRow($updateBorrowedSql,[$quantityResult['quantity'],$nine]);
		return $checks;
		}
    }
		
	// }
	

    return false; // Quantity check failed, return false or handle as needed
}

	public function delete_report()
	{
		$sql = "DELETE FROM supp_borrowed";
		
		$results = $this->deleteRow($sql);
		return $results;
	}

	public function sortingsDate($fromDate, $toDate){
        $sql="SELECT *
        FROM supp_borrowed
        WHERE (date_borrowed>=? AND date_borrowed<=?) OR
        (item_created>=? AND item_created<=?) 
        ";
       
        $result = $this->getRows($sql,[$fromDate,$toDate,$fromDate,$toDate]);
        return $result;
    }

	public function room(){
		$sql="SELECT * FROM room";
       
        $result = $this->getRows($sql);
        return $result;
	}

	public function checkSupplies($name,$date,$brand,$unit){
		$sql = "SELECT * FROM tbl_items WHERE 
		supplyname =?   ORDER BY id DESC LIMIT 1";
		$result = $this->getRow($sql,[$name]);
		if($result['supplyname']!==$name && $result['Expiry']!==$date && $result['brand']!==$brand && $result['Unit']!==$unit){
			return true;
		}else{
			return false;
		}	
			
	}
	public function checkBoth($name,$date,$brand,$unit){
		$sql = "SELECT * FROM tbl_items WHERE 
		supplyname = ? AND NOT brand = '$brand' AND NOT Expiry = '$date' AND NOT Unit = '$unit'   ORDER BY id DESC LIMIT 1";
		$result = $this->getRow($sql,[$name]);
		if($result){
			return true;
		}else{
			return false;
		}	
			
	}

	public function checkBoth1($name,$date,$brand,$unit){
		$sql = "SELECT * FROM tbl_items WHERE 
		supplyname =? AND brand = '$brand' AND NOT Expiry = '$date' AND NOT Unit = '$unit' ORDER BY id DESC LIMIT 1";
		$result = $this->getRow($sql,[$name]);
		if($result){
			return true;
		}else{
			return false;
		}	
			
	}
	public function checkBoth2($name,$date,$brand,$unit){
		$sql = "SELECT * FROM tbl_items WHERE 
		supplyname = ? AND brand = '$brand' AND NOT Unit = '$unit' AND Expiry = '$date'   ORDER BY id DESC LIMIT 1";
		$result = $this->getRow($sql,[$name]);
		
		if($result){
			return true;
		}else{
			return false;
		}	
			
	}
	public function checkBoth3($name,$date,$brand,$unit){
		$sql = "SELECT * FROM tbl_items WHERE 
		supplyname = ? AND NOT brand = '$brand' AND Unit = '$unit' AND Expiry = '$date'   ORDER BY id DESC LIMIT 1";
		$result = $this->getRow($sql,[$name]);
		
		if($result){
			return true;
		}else{
			return false;
		}	
			
	}
	public function checkBoth4($name,$date,$brand,$unit){
		$sql = "SELECT * FROM tbl_items WHERE 
		supplyname = ? AND brand = '$brand' AND Unit = '$unit' AND NOT Expiry = '$date'   ORDER BY id DESC LIMIT 1";
		$result = $this->getRow($sql,[$name]);
		
		if($result){
			return true;
		}else{
			return false;
		}	
			
	}

	public function checkBoth5($name,$date,$brand,$unit){
		$sql = "SELECT * FROM tbl_items WHERE 
		(supplyname =? AND Expiry = '$date' AND brand = '$brand' AND NOT Unit = '$unit') OR
		(supplyname ='$name' AND Expiry = '$date' AND NOT brand = '$brand' AND Unit = '$unit') OR
		(supplyname ='$name' AND NOT Expiry = '$date' AND  brand = '$brand' AND Unit = '$unit')
		 ORDER BY id DESC LIMIT 1";
		$result = $this->getRow($sql,[$name]);
		if($result){
			return true;
		}else{
			return false;
		}	
			
	}

	public function samelahat($name,$date,$brand,$unit){
		$sql = "SELECT * FROM tbl_items WHERE 
		supplyname = ? AND brand =? and Expiry = ? AND Unit = ? ORDER BY id DESC LIMIT 1";
		$result = $this->getRow($sql,[$name,$brand,$date,$unit]);
		if($result){
			return false;
		}else{
			return true;
		}	
			
	}
	

}

$item = new Item();
$balik = new Item();

/* End of file Item.php */
/* Location: .//D/xampp/htdocs/deped/class/Item.php */
