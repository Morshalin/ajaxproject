<?php
  $filepath = realpath(__DIR__);
  include_once($filepath."/../classes/User.php");
  $us = new User();
  if (isset($_GET['userid'])) {
  	$userid = $_GET['userid'];
  	$value  = $us->showuser($userid);
  }
	
?>
