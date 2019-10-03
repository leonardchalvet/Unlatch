<?php

	$name    = isset($_POST['name'])    ?  $_POST['name']    : null ;
	$company = isset($_POST['company']) ?  $_POST['company'] : null ;
	$work    = isset($_POST['work'])    ?  $_POST['work']    : null ;
	$email   = isset($_POST['email'])   ?  $_POST['email']   : null ;
	$phone   = isset($_POST['phone'])   ?  $_POST['phone']   : null ;
	$sell    = isset($_POST['sell'])    ?  $_POST['sell']    : null ;
	$country = isset($_POST['country']) ?  $_POST['country'] : null ;

	$page    = isset($_POST['page'])    ? $_POST['page'] : null;
	$allMail = isset($_POST['allmail']) ? $_POST['allmail'] : null;
	
	//echo $name . ':' . $company . ':' . $work . ':' . $email . ':' . $phone . ':' . $sell . ':' . $country . ':' . $page . ':' . $allMail;

	if($name != null && $company != null && $work != null && $email != null && $phone != null && $sell != null && $country != null && $page != null && $allMail != null) {

		$header = "From: ".$email." \n";

		$content =  "Name : "     . "\n" . $name     . "\n" . "\n".
					"Company : "  . "\n" . $company  . "\n" . "\n".
					"Work : "     . "\n" . $work     . "\n" . "\n".
			   		"Email : "    . "\n" . $email    . "\n" . "\n".
			   		"Phone : "    . "\n" . $phone    . "\n" . "\n".
			   		"Sell : "     . "\n" . $sell     . "\n" . "\n".
			   		"Country : "  . "\n" . $country  . "\n" . "\n";

		mail($allMail, 'CONTACT', $content, $header);

	}

	header('Location: '.$page);

?>