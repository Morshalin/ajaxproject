<?php
  $filepath = realpath(__DIR__);
  include_once($filepath."/../classes/Check.php");

  $ch = new Check();
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    $email = $_POST['email'];
    $emailvalid = $ch->validemail($email);
  }
 ?>
