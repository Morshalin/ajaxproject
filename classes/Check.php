<?php
$filepath = realpath(__DIR__);
include_once($filepath."/../lib/Database.php");
  class Check {
    public $db;
    public function __construct(){
      $this->db = new Database();
    }

    public function validemail($email){
      $query = "SELECT email from user where email='$email'";
      $result = $this->db->select($query);
      if(empty($result)){
        echo "<span style='color:red'>Invalid email address</span>";
        exit();
      }elseif($result){
        echo "<span style='color:green'>Valid Email address.</span>";
        exit();
      }
    }

}

?>
