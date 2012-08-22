<?php
error_reporting(0);
session_start();

    if(!isset($_SESSION['captcha_keystring']) || $_SESSION['captcha_keystring'] !== $_POST['captcha']){
        echo "error";
        exit;
    } else {
	//declare our assets 
	$name = stripcslashes($_POST['name']);
	$emailAddr = stripcslashes($_POST['email']);
	$comment = stripcslashes($_POST['message']);
	$subject = stripcslashes($_POST['subject']);
        $page = stripcslashes($_POST['page']);
        $headers = "From: \"$name\" <$emailAddr>\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
	$contactMessage =  
"Имя отправителя: $name <$emailAddr>
        
$comment

Письмо отправлено со страницы: $page
IP отправителя: $_SERVER[REMOTE_ADDR]";
		
		//send the email

		mail('intinity@yandex.ru', $subject, $contactMessage, $headers);
		echo('success'); //return success callback
	}
?>