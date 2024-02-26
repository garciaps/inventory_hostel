<?php
require_once('../database/Database.php');
require_once('../interface/iPosition.php');
class Report extends Database {
    public function get_items(){
        $sql = "SELECT DISTINCT item FROM supp_borrowed;";
        return $this->getRows($sql);
    }
    public function get_all_tools($choice){
        if($choice=="all"){
            $sql = "SELECT * FROM supp_borrowed;";
        }else{
            $sql = "SELECT * FROM supp_borrowed WHERE item LIKE '%$choice%'";
        }
        return $this->getRows($sql);
    }
    public function get_tools($id)
	{
		$sql="SELECT *
			  FROM supp_borrowed
			  WHERE id = $id
		";
		$result = $this->getRow($sql);
		return $result;
	}
    public function view_return($tagid,$id){
        $sql="SELECT *
        FROM supp_borrowed
        WHERE tagid = ? AND id = ? AND status = 'Borrowed'
        ";
        $result = $this->getRow($sql,[$tagid,$id]);
        return $result;
    } 
    public function return_return($tagid,$item,$dateborrowed,$quan,$setQuan,$category,$myId){
        
        date_default_timezone_set('Asia/Manila');
        $userName = $_SESSION['user'];
        $date = date("Y-m-d");
        $data = 'Returned';

        $sqls = "INSERT INTO logs(name,item,quantity,activity) VALUES(?,?,?,?);";
         $this->insertRow($sqls,[$userName,$item,$setQuan,$data]);

        if($category=="Tools"){
            $sql="SELECT quantity
            FROM tbl_tools
            WHERE tagid = ?
            ";
        }else if($category=="Supplies"){
            $sql="SELECT quantity
            FROM tbl_items
            WHERE tagid = ?
            ";
        }else if($category=="Equipment"){
            $sql="SELECT quantity
            FROM equipment
            WHERE tagid = ?
            ";
        }
        
        $result = $this->getRow($sql,[$tagid]);
        $quant =  $result['quantity'];
        $update = "";
        if($result){
            if($category=="Tools"){
                $update="UPDATE tbl_tools
                SET 
               quantity = ?
               WHERE tagid = ?;
                ";
            }else if($category=="Supplies"){
                $update="UPDATE tbl_items
                SET 
               quantity = ?
               WHERE tagid = ?;
                ";
            }else if($category=="Equipment"){
                $update="UPDATE equipment
                SET 
               quantity = ?
               WHERE tagid = ?;
                ";
            }
        }
       
        $updated = $this->updateRow($update, [$quant+$setQuan,$tagid]);
     
        if($updated){ 
  
        
            $borrowedQuan = $quant;
    
           
                $updateBorrowed="UPDATE supp_borrowed
                SET 
                quantity = ?
                WHERE tagid = ? AND status IS NULL;
                    ";

               $upd =     $this->updateRow($updateBorrowed, [$borrowedQuan+$setQuan,$tagid]);
          
               if($upd){
                        $quanborroweds="SELECT quantity FROM supp_borrowed
                        WHERE tagid = ? AND id = ?  AND date_borrowed = '$dateborrowed';
                    ";
                        $resu = $this->getRow($quanborroweds,[$tagid,$myId]);
                    $borrowedQuans =  $resu['quantity'];
                        if($borrowedQuans){
                            $updateBorrowed="UPDATE supp_borrowed
                            SET 
                            quantity = ?
                            WHERE tagid = ? AND id = ?  AND date_borrowed = '$dateborrowed';
                                ";

                            $upds =     $this->updateRow($updateBorrowed, [$borrowedQuans-$setQuan,$tagid,$myId]);
                            
                            if($upds){
                            $quanborrows="SELECT quantity FROM supp_borrowed
                            WHERE tagid = ? AND id = ?  AND status = 'Borrowed';
                        ";
                            $resul = $this->getRow($quanborrows,[$tagid,$myId]);
                            $borrowedQuans1 =  $resul['quantity'];



                            if($borrowedQuans1<=0){

                                    $sql = "DELETE FROM supp_borrowed WHERE tagid = ? AND id = ?  AND date_borrowed = '$dateborrowed';";
                                    // return "deleted";
                                    $del =  $this->updateRow($sql, [$tagid,$myId]);
                                    return $del;
                            }
                           }
                        }
                        
                        
                        
                 
                    
                 
                }
                        
            

        }
        return "Success";
    }

    // public function returnInfo(){
    //     $sql="INSERT
    //     INTO borrower_history
    //     (item, name,date_borrowed,contactno,whereplace,returndate,quantity,category,tagid,room,status, item_created)
	// 			VALUES(?,?,?,?,?);
	// 	";
	// 	$result = $this->insertRow($sql, [$iN, $sN, $mN, $b, $a]);
	// 	return $result;
    // }

    public function sortingsDate($fromDate, $toDate){
        $sql="SELECT *
        FROM supp_borrowed
        WHERE (date_borrowed>=? AND date_borrowed<=?) OR
        (item_created>=? AND item_created<=?) 
        ";
       
        $result = $this->getRows($sql,[$fromDate,$toDate,$fromDate,$toDate]);
        return $result;
    }
    
	public function insert_borrower($one, $userSession, $three, $four, $five, $six, $seven, $eight, $nine, $ten,$eleven,$twelve,$l)
    {
        $userSession = isset($_SESSION['user']) ? $_SESSION['user'] : 'DefaultUserSession';
        $status = 'Added';  // Set the status to 'delivered'
    
        $sql = "INSERT INTO supp_borrowed(item, name, date_borrowed, contactno, whereplace, returndate, quantity, category, tagid, room, status, item_created,expiry,unit)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    
        $results = $this->insertRow($sql, [$one, $userSession, $three, $four, $five, $six, $seven, $eight, $nine, $ten, $status, date('Y-m-d'),$eleven,$twelve.$l]);
        return $results;
    }

}
$reps = new Report();

