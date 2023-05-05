<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Password Reset</title>
</head>
<body>
	<p>Dear user,</p>
	<p>Please click on the following link to reset your password.</p>
	<p>-------------------------------------------------------------</p>
	<p><a href="localhost/resetpassword?key=<?php echo $key ?>&email=<?php echo $email ?>&action=reset" target="_blank">
	localhost/resetpassword?key=<?php echo $key ?>&email=<?php echo $email ?>&action=reset</a></p>
	<p>-------------------------------------------------------------</p>
	<p>Please be sure to copy the entire link into your browser. The link will expire after 1 day for security reason.</p>
	<p>If you did not request this forgotten password email, no action is needed, your password will not be reset. However, you may want to log into your account and change your security password as someone may have guessed it.</p>
	<p>Thanks,</p>
	<p>The festival Team</p>
</body>
</html>
