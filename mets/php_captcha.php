<?php
	session_start();
	include("captcha.class.php");

	$capthaOBJ = new Captcha();
	$capthaOBJ->OutputCaptcha($width=100,$height=30,$length=6) // can be call also $capthaOBJ->OutputCaptcha(100,30,6) // param width, height, length respectively
?>