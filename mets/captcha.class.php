<?php
class Captcha{
	var $chars = 'ABCDEFGHKLMNPQRSTUVWYZ123456789'; // O  and 0 (Zero) are visually similar, that's why I am not using it
	var $RandomStr = '';


	function OutputCaptcha($width=100,$height=30,$length=6){
		
		for($i = 0; $i < $length; $i++){ // Generating the captcha string

		   $pos = mt_rand(0, strlen($this->chars)-1);

		   $this->RandomStr .= substr($this->chars, $pos, 1);

		}

		$ResultStr = $this->RandomStr;
		
		$NewImage =imagecreatefromjpeg("img.jpg");//image create by existing image and as back ground 
		
		$TextColor = imagecolorallocate($NewImage, 0, 0, 0);//text color-Black
		
		//$line_clr = imagecolorallocate($NewImage, 0, 255, 11);
		//Top left to Bottom Left	
		//imageline($NewImage, 0, $height-22, $width, $height-1, $line_clr);	
		// Bottom Left to Bottom Right	
		//imageline($NewImage, $width-1, 0, $width-100, $height, $line_clr);
		//imageline($NewImage, $height-1, 0, $width-100, $width, $line_clr);
		//imageline($NewImage, $width-1, 0, $height-1, $width, $line_clr);
		
			
		imagestring($NewImage,6, 20, 6, $ResultStr, $TextColor);// Draw a random string horizontally 
		
		
		$_SESSION['captcha_val'] = $ResultStr;// carry the data through session
		
		
		header("Content-type: image/jpeg");// out out the image 
		
		imagejpeg($NewImage);//Output image to browser 
		
		}

}

?>