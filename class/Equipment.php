<?php
require_once('../database/Database.php');
require_once('../interface/iEquipment.php');
include_once('../data/user_session.php');
class Equipment extends Database implements iEquipment{
	public function __construct()
	{
		parent:: __construct();
	}

	
	public function insert_equipment($iN, $sN, $mN, $b, $bb)
	{
	 
	
		// If itemname and brand don't exist, proceed with the insertion
		$insertQuery = "INSERT INTO equipment(tagid, itemname, room, brand, quantity)
						VALUES (?, ?, ?, ?, ?);";
	
		$result = $this->insertRow($insertQuery, [$iN, $sN, $mN, $b, $bb]);
	
		date_default_timezone_set('Asia/Manila');
        $userName = $_SESSION['user'];
        $date = date("Y-m-d");
        $data = 'Added';

        $sqls = "INSERT INTO logs(name,item,quantity,activity) VALUES(?,?,?,?);";
         $this->insertRow($sqls,[$userName,$sN,$bb,$data]);






		if ($result) {
			// Insertion successful
			echo "Equipment successfully inserted!";
			return true;
		} else {
			// Insertion failed
			echo "Failed to insert equipment!";
			return false;
		}
	}

	public function get_all_equipment()
	{
		/*get all items with the office nga naa sa emp*/
		$sql = "SELECT *
				FROM equipment
		";
		$result = $this->getRows($sql);
		return $result;
	}

	public function delete_equipment($eid)
{
    // Fetch item details before deleting
    $sqlSelect = "SELECT id, tagid, itemname, brand, quantity FROM equipment WHERE id = ?;";
    $itemDetails = $this->getRow($sqlSelect, [$eid]);

    // Check if the item exists
    if (!$itemDetails) {
        return false; // Item not found
    }

    // Delete the item
    $sqlDelete = "DELETE FROM equipment WHERE id = ?;";
    $this->updateRow($sqlDelete, [$eid]);

    // Assume you have a method to get the logged-in user information
    $userSession = isset($_SESSION['user']) ? $_SESSION['user'] : 'DefaultUserSession';

    // Insert a record into borrower_history with status 'Deleted'
    $sqlInsert = "INSERT INTO borrower_history (tagid, item, conditions, quantity, status, category, name)
                  VALUES ( ?, ?, ?, ?, ?, ?, ?);";

    $values = [
      
        $itemDetails['tagid'], // Corrected column name
        $itemDetails['itemname'],
        '-',
        $itemDetails['quantity'],
        'Deleted',
        'Supplies',
        $userSession, // Include the logged-in user as the name
    ];

    $result = $this->insertRow($sqlInsert, $values);
	
	date_default_timezone_set('Asia/Manila');
        $userName = $_SESSION['user'];
        $date = date("Y-m-d");
        $data = 'Deleted';

        $sqls = "INSERT INTO logs(name,date,item,quantity,activity) VALUES(?,?,?,?,?);";
         $this->insertRow($sqls,[$userName,$date,$itemDetails['itemname'],'NULL',$data]);






    if (!$result) {
        // Log or print the error message
        echo "Error inserting into borrower_history: " . $this->getLastError();
        return false;
    }

    return true;
}
	public function get_equipment($id)
	{
		$sql="SELECT *
			  FROM equipment
			  WHERE id = ?
		";
		$result = $this->getRow($sql, [$id]);
		return $result;
	}

	public function update_equipment($iN, $sN, $mN, $b,$id,$a)
	{	
		$sql="UPDATE equipment
		 	  SET 
		 	  tagid = ?, 
	 		  itemname = ?, 
			  room = ?, 
			  brand = ?,
			  quantity = ?
			  WHERE id = ?;
		";
		$result = $this->updateRow($sql, [$iN, $sN, $mN, $b,$id,$a]);

		date_default_timezone_set('Asia/Manila');
        $userName = $_SESSION['user'];
        $date = date("Y-m-d");
        $data = 'Updated';

        $sqls = "INSERT INTO logs(name,date,item,quantity,activity) VALUES(?,?,?,?,?);";
         $this->insertRow($sqls,[$userName,$date,$sN,$id,$data]);




		
		return $result;
	}
	public function gettingId($tag)
	{
		$sql="SELECT id FROM supp_borrowed
	   WHERE tagid = ? LIMIT 1;
 		";
 		$result = $this->getRow($sql, [$tag]);
 return $result;
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
	public function check_borrowed(){
		$sql = "SELECT *
				FROM supp_borrowed
		";
		$result = $this->getRows($sql);
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
	public function insert_borrow($one, $two, $three, $four, $five, $six, $seven, $eight, $nine, $ten)
{
    // Assume you have a method to get the logged-in user information
    $userSession = isset($_SESSION['user']) ? $_SESSION['user'] : 'DefaultUserSession';

    $sql = "INSERT INTO supp_borrowed(item, name, date_borrowed, contactno, whereplace, returndate, quantity, category, tagid, room, status, item_created)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Added', ?);";

    $results = $this->insertRow($sql, [$one, $userSession, $three, $four, $five, $six, $seven, $eight, $nine, $ten, date('Y-m-d')]);
    return $results;
}
	public function checkEquipmet($name,$brand){
		$sql = "SELECT * FROM equipment WHERE itemname = ? AND brand = ?";
		$result = $this->getRow($sql,[$name,$brand]);
		
		if($result){
			return false;
		}else{
			return true;
		}
		return true;
	}
}
$item = new Equipment();