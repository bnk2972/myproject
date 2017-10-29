<?php
define("HOST","127.0.0.1");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","phone");
class ConnectDatabase 
{   
    public $conn;
    public function __construct(){
        $this->conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE) or die("Connection Database Fail!!");
        mysqli_set_charset($this->conn,"utf8");
        date_default_timezone_set('Asia/Bangkok');
    }
    
    public function MySql($sql){
        $query = mysqli_query($this->conn,$sql) or die("คำสั่ง SQL : ".$sql." ไม่ถูกต้อง");
        $return = array();
        while($result = mysqli_fetch_array($query)){
            $return[] = $result;
        }
        return $return;
    }
    
    public function ExecuteSQL($sql,$output = false){
        $query = mysqli_query($this->conn,$sql) or die("คำสั่ง SQL : ".$sql." ไม่ถูกต้อง");
        if($query){
            if($output == true) return true;
            else return mysqli_insert_id($this->conn);
        }else{
            return false;
        }
    }
}
?>