<?php
	//session start 
	session_start();

	require "vendor/autoload.php";

	$fb = new Facebook\Facebook([
		'app_id'=>'491175144789752',
		'app_secret' => '483eeca2d7b69977e21f9ef652a07f95',
		'default_graph_version' => 'v2.7'
	]);

	$helper = $fb->getRedirectLoginHelper();
	$logiurl = $helper->getLoginUrl("http://localhost/user/");

	try {
		$accessToken = $helper->getAccessToken();
		if ($accessToken) {
			$_SESSION['login'] = true;
			$_SESSION['access_token'] = (string)$accessToken;
			header("Location:index.php");
		}
	} catch (Exception $e) {
		
	}

?>