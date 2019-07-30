<?php
  $filepath = realpath(__DIR__);
  include_once($filepath."/../classes/User.php");
  $us = new User();
 

  if (isset($_POST['delid'])) {
  	$delid = $_POST['delid'];
  	$value  = $us->deleteuser($delid);
  }
	
?>