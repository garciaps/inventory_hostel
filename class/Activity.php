<?php 
require_once('../database/Database.php');


class Activity extends Database  {

    public function addActivity($data){
        $userName = $_SESSION['user'];
        date_default_timezone_set('Asia/Manila');
        $time = date("H:i:s");
        $date = date("Y-m-d");
        $desciption = $data;

        $sql = "INSERT INTO activity (user,time,date,decription) VALUES (?,?,?,?)";
        $result = $this->insertRow($sql, [$userName, $time, $date,$desciption]);
        return $result;
    }

    public function showLogs(){
        $sql = "SELECT * FROM activity WHERE description LIKE '%Login Session%' ORDER BY id DESC";
        $result = $this->getRows($sql);
        return $result;
    }

    public function showreport($name,$date){
        $sql = "SELECT * FROM borrower_history WHERE name = ? AND item_created = ?";
        $result = $this->getRows($sql,[$name,$date]);
        return $result;
    }

    public function getLogout($name){
        $date = date("Y-m-d");
        $sql = "SELECT * FROM activity WHERE name = ? AND date = '$date' AND description = '$name Logout Session'";
        $result = $this->getRows($sql ,[$name]);
        return $result;
    }

    public function sorted($from, $to){
        $sql = "SELECT * FROM activity WHERE date>='$from' AND date<='$to' AND description LIKE '%Login Session%'";
        $result = $this->getRows($sql);
        return $result;
    }
}

$act = new Activity();