<?php
	require_once('recaptchalib.php');
	$privatekey = "6LcGZ8USAAAAAMNJd7nRF1TzNQ7NPNiywvU_NcKA";
	$resp = recaptcha_check_answer ($privatekey,
		$_SERVER["REMOTE_ADDR"],
		$_POST["recaptcha_challenge_field"],
		$_POST["recaptcha_response_field"]);

	if(!$resp->is_valid){
		die("The reCAPTCHA wasn't entered correctly. Go back and try it again."."(reCAPTCHA said: ".$resp->error.")");
	}else{
		$username="a8613955_login";
		$password="oops";
		$database="a8613955_login";
		$host="mysql2.000webhost.com";

		$type = $_POST[type];

		switch ($type){
			case "createpage":

				$title = $_POST["title"];
				$description = $_POST["description"];
				$content = $_POST["content"];
				$author = $_POST["author"];

				mysql_connect('mysql2.000webhost.com', 'a8613955_login', 'oops');
				mysql_select_db("a8613955_login");

				mysql_query("INSERT INTO content (title, description, content, author, login, login_error)VALUES('$title','$description','$content','$author','0','<p>Please login to veiw this content!</p>')")or die("<p>There was an error while prossesing the page.</p><p>Please try again.<p/>");

				echo ('<p>Page Added!</p><p>You can close this window now.<p/>');

			break;
			case "contact":

				$to = "olls@ovi.com";
				$sub = "Mail from ScoutingResourses.net76.net";
				$email = $POST[email];
				$subject = $_POST[subject];
				$from = $_POST[from];
				$msg = "Subject: ".$subject.", <br />From: ".$from.", <br />Message: ".$_POST[msg];
				$header = "From: ".$email;
				$mail = mail($to, $sub, $msg, $header);

				if($mail){
					echo ('<p>Message sent, you can now <a href="anypage.php?linkto=home">back to the site.</a></p>');
				}else{
					echo ('<p>There was an error while prossesing the message.</p><p>Please try again.<p/>');
				}

			break;
			default:
				header ("Location: anypage.php?linkto=home");
			break;
		}//end switch
	}
?>
