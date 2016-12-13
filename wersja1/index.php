<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style> 
	#formularz{
	display: inline-block;
	position: absolute;
	left: 550px;
	top: 250px	
	}
	
	#nowe{
	display: inline-block;
	position: absolute;
	right: 10px;
	top: 10px	
	}

</style>
</head>
<BODY>
	<div id="glowny">
		<div id="formularz">
		Formularz logowania klienta<br><br>
			<form method="post" action="weryfikuj.php">
				Login:<input type="text" name="user" maxlength="20" size="20"><br>
				Haslo:<input type="password" name="pass" maxlength="20" size="20"><br><br>
				<input type="submit" value="OK"/>
		</div>
				
				<div id="Nowe"
				<a onclick="location.href='nowekonto.php';"><input type="button";" style="height:50px;"  value="Stwórz nowe konto">
				</div>
			</form>
	</div>
</BODY>
</HTML>