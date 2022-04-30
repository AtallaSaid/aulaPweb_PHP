<html>
	<body>
	<h1>Dashboard</h1>
	<a href="logoff.php">Sair</a><br/>
	
	<?php   
		verificar();
	?>
	</body>
</html>
<?php
function verificar(){
	session_start();
	if(isset($_SESSION["codigo"])==false){
		header("location: login.php");
	} else {
		echo "ola ". $_SESSION["nome"] . " seu codigo é ". $_SESSION["codigo"];
	}
}
?>

	
	
	