<?php

	$email   = isset($_POST['email'])   ?  $_POST['email']   : null ;

	$page    = isset($_POST['page'])    ? $_POST['page'] : null;
	$allMail = isset($_POST['allmail']) ? $_POST['allmail'] : null;

	if($email != null && $page != null && $allMail != null) {

		$header = "From: ".$email." \n";

		$content =  "Email : "    . "\n" . $email    . "\n" . "\n";

		mail($allMail, 'CONTACT', $content, $header);

	}

	header('Location: '.$page.'?valid');

?>