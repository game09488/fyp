<?php
		header("Content-Type: image/png"); 
		require "vendor/autoload.php";
		use Endroid\QrCode\QrCode;
		
		function generateRandomString($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
		$string = generateRandomString($length = 10);
		
		//$ip = $_SERVER['REMOTE_ADDR'];
		$ip = '192.168.0.110';
		$localhost = 'http://'.$ip.':80/fyp/lecturer/m_student/'.$string.'';	
		$qrCode = new QrCode($localhost);
		echo $qrCode->writeString();
		die();
?>