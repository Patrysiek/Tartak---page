<?php
session_start();
  if(isset($_POST['g-recaptcha-response'])){
	  $CAPTCHA_val = 0;
    $captcha=$_POST['g-recaptcha-response'];
    $secret = "6Let5EEUAAAAAIAobzSTYeRlP1ZRIenHQoUnN79H";
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
	$g_response = json_decode($response);
	
	if($g_response->success==true) { 
		if(isset($_POST["submit"]) ) {
			$recipient="ufekufek3@gmail.com";
			$subject="Zapytanie o palety";
			$sender = test_input($_POST["imie"]);
			$telefon = test_input($_POST["telefon"]);
			$senderEmail = test_input($_POST["email"]);
			$message = test_input($_POST["tresc"]);

			$CAPTCHA_val = 1;
			$mailBody="Imie: $sender\nEmail: $senderEmail\n Numer Telefonu: $telefon\n\n $message";
			mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");
			}  
			$_SESSION['good'] = '<span style="color:green"></br>Twoja wiadomosc zostala wysłana !</span>';
		header('Location: index.php#contact');
		
	
	}
	else{
		$_SESSION['blad'] = '<span style="color:red">Uzupełnij CAPTCHA !<br/></span>';
		header('Location: index.php#contact');
		
	}

  }
  	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>