<?php
session_start();
session_destroy();
?> 
<!doctype html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
	
		

	
	<title>LOGIN :: MEZE RECURSOS HUMANOS  ::</title>

	<!-- CSS -->
	
	<link rel="stylesheet" href="rh/css/reset.css">
	
	<link rel="stylesheet" href="rh/css/styles.css">
	<link rel="stylesheet" href="rh/css/media-queries2.css">
	<link rel="stylesheet" href="rh/css/font-awesome.css">
	
	<link rel="shortcut icon" href="favicon.ico" />
   <script language="Javascript">

function cursor()
{
	
	document.getElementById("usuario").focus();
	
}
</script>


<!-- media queries css -->

	
</head>

	<!-- Main HTML -->
	
<body onload="cursor()">
	
	<div id="login">
	<br><br>
		<div class="log">

		<img class="img2" src="rh/css/logo_eb.png">
		</div>
		
		<div class="log">
		<form action="validar.php" method="post">
	<div class="input-icon left">

		<label for="name">Usuario</label><br>
		
		<input type="name" name="usuario" id="usuario" maxlength="20" required=""><br>
		
		<label for="username">Password</label><br>
		
		
		
		<input type="password" name="password" id="password" maxlength="20" required=""><br>
		<input type="submit" value="Login">
		</form>
		</div>
		
		</div>
	
	</div>


	
</body>

</html>
	
	
	
	
	
		
	
