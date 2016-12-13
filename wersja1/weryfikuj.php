<?php
// Start the session
session_start();

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
	$login=$_POST['user']; 
	$pass=$_POST['pass']; 
	$_SESSION["$login"];
	$servername="localhost";
	$username="krisg_lukasz";
	$password="123654";
	$dbname="krisg_lukasz2";
	$conn = new mysqli($servername, $username, $password, $dbname); 
	$sql = "SELECT status FROM logi WHERE user='$login' ORDER BY id DESC LIMIT 1"; 
	$res = $conn->query($sql);
	$row = $res->fetch_assoc();
	if($row['status']=="zablokowane"){
		mysqli_close($conn); 
		echo "Podane konto jest zablokowane. Prosze skontakotwac sie z administratorem."; 
	}
	else {
		$link = mysqli_connect(localhost, krisg_lukasz,123654, krisg_lukasz2); 
		if(!$link) {
			echo"B³¹d: ". mysqli_connect_errno()." ".mysqli_connect_error(); 
		}
		mysqli_query($link, "SET NAMES 'utf8'"); 
		$result = mysqli_query($link, "SELECT * FROM users WHERE user='$login' "); 
		$rekord = mysqli_fetch_array($result); 
		if(!$rekord){
			mysqli_close($link); 
			echo "Nie ma u¿ytkownika o takim loginie."; 
		}
		else{
			if($rekord['pass']==$pass){
				$_SESSION["$login"]="0";
				$servername="localhost";
				$username="krisg_lukasz";
				$password="123654";
				$dbname="krisg_lukasz2";
				$data = date("Y-m-d H:i:s");
				$conn = new mysqli($servername, $username, $password, $dbname);
				$sql = "INSERT INTO logi (user, data, proba) 
				VALUES ('$login', '$data', 'pomyslnie');";
				$result = $conn->query($sql);
				$conn->close();
			}
			else {
				echo "Zle haslo !!";
				$_SESSION["$login"]++;
				$servername="localhost";
				$username="krisg_lukasz";
				$password="123654";
				$dbname="krisg_lukasz2";
				$data = date("Y-m-d H:i:s");
				$conn = new mysqli($servername, $username, $password, $dbname);
				$sql = "INSERT INTO logi (user, data, proba) 
				VALUES ('$login', '$data', 'blad');";
				$result = $conn->query($sql);
				$conn->close();
					if($_SESSION["$login"]=="3"){
						$servername="localhost";
						$username="krisg_lukasz";
						$password="123654";
						$dbname="krisg_lukasz2";
						$data = date("Y-m-d H:i:s");
						$conn = new mysqli($servername, $username, $password, $dbname);
						$sql = "INSERT INTO logi (user, data, proba, status) 
						VALUES ('$login', '$data', 'blad', 'zablokowane');";
						$result = $conn->query($sql);
						$conn->close();
					}
					
			}
		}
	}
	echo $_SESSION["$login"];
?>
</BODY>
</HTML>
