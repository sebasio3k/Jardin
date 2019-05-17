<?php

	$captcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LfjAaQUAAAAAKaH7S3ZJcry1zWPIxXK8DhjAOwv&response='.$_POST['response'].'&remoteip='.$_SERVER['REMOTE_ADDR']));
	if ($captcha->success == false) {
		print_r(json_encode(array('status' => 'error', 'message' => 'No valid Captcha')));
	}
	 else {
		// Everything went ok...
	}
?>