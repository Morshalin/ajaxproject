<?php
  $filepath = realpath(__DIR__);
  include_once($filepath."/../classes/User.php");
  $us = new User();
 

  if ($_SERVER['REQUEST_METHOD']=='POST') {
  	$value  = $us->updateuser($_POST);
  }
	
?>