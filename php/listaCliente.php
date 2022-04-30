<!doctype html>
<html>
<body>
<h1>lista de clientes</h1>
<a href="cliente.php">Cadastrar um novo</a>
<br/>
<table border="1">
<tr><td>codigo</td><td>nome</td><td>email</td><td></td></tr>
<?php listar(); ?>
</table>
</body>
</html>
<?php
function listar(){
	$conexao = new mysqli("localhost", "root", "", "pwt");
	$sql = "select * from cliente order by codigo";
	$resultado = mysqli_query($conexao, $sql);
	while($reg = mysqli_fetch_array($resultado)){
		$nome  = $reg["nome"];
		$email = $reg["email"];
		$codigo = $reg["codigo"];
		echo "<tr><td>$codigo</td><td>$nome</td><td>$email</td><td><a href='cliente.php?codigo=$codigo'>Editar</a></td></tr>";
	}
	mysqli_close($conexao);
}
?>


