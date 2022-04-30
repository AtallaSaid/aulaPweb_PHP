<!doctype html>
<html>
	<body>
	<h1>Login</h1>
	<?php fazerLogin(); ?>
	<form method="post" action="login.php">
		email:<input type="email" id="email" 
		name="email" required /><br/>
		senha:<input type="password" id="senha"
		name="senha" required /><br/>
		<button name="bt1">Entrar</button>
	</form>
	</body>
</html>
<?php
function fazerLogin(){
	if(isset($_POST["bt1"])){
		$email = $_POST["email"];	
		$senha = $_POST["senha"];
		$conexao = new mysqli("localhost", "root", "", "pwt");
		$sql = "select * from cliente where email='$email' and senha=md5('$senha')";
		$resultado = mysqli_query($conexao, $sql); 
		if($reg = mysqli_fetch_array($resultado)){
			session_start();
			$_SESSION["codigo"] = $reg["codigo"];
			$_SESSION["nome"]	= $reg["nome"];
			header("location: dashboard.php");
		} else {
			echo "<h4>Email ou senha invalidos !!!</h4>";
		}
		mysqli_close($conexao);
	}
}
?>