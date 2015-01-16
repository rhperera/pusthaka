<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

	E-mail Address: <input type="text" name="email" size="20" /> <input type="submit" name="ForgotPasswordForm" value=" Process " />

</form>


<?php
	// Connect to MySQL
	$c = mysql_connect("localhost", "root", "");
	mysql_select_db("digital-library", $c);

	// Was the form submitted?
	if ($_POST["ForgotPasswordForm"])
	{
		// Harvest submitted e-mail address
		$email = mysql_real_escape_string($_POST["email"]);

		// Check to see if a user exists with this e-mail
		$userExists = mysql_fetch_assoc(mysql_query("SELECT `email` FROM `users` WHERE `email` = '$email'"));
		if ($userExists["email"])
		{
			// Create a unique salt. This will never leave PHP unencrypted. //**************************
			$salt = "PiuwrO1#O0rl@+luH1!froe*l?8oEb!iu)_1Xaspi*(sw(^&.laBr~u3i!c?es-l651";
			
			// Create the unique user password reset key
			$password = md5($salt . $userExists["email"]));

			// Create a url which we will direct them to reset their password //********************************************************
			$pwrurl = "www.digital_library.com/reset_password.php?q=" . $password;

			// Mail them their key
			$mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.yoursitehere.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";
			mail($userExists["email"], "www.digital_library.com - Password Reset", $mailbody);//******************************************************
			echo "Your password recovery key has been sent to your e-mail address.";
    }
	else
	{
		echo "No user with that e-mail address exists.";
	}
}
?>
