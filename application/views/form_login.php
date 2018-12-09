<?php 

	echo form_open('Author/login');

 ?>

<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="formloginStyle.css">

	<style type="text/css">
		
		h1{
	font-family: century gothic;
	font-weight: lighter; ;
}
	</style>
</head>
<body >
	<div align="center">

		<h1 >Selamat datang di Sistem Operasi KOPMA</h1>

		<form id="input" >

 	<br><br><br><br><br><br>
 			<input type="text" name="username" placeholder="username"><br><br>
 			<input type="password" name="password" placeholder="password"><br><br>
 			<button type="submit" name="submit">Login</button>

 		</form>

	</div>
 
</body>
</html>
