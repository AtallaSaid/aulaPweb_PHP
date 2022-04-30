<!doctype html>
<html>
	<body>
	<h1>Crud Cliente</h1>
	<a href="listaCliente.php">voltar para a lista</a><br/>
	<form method="post" action="cliente.php">
	codigo:<input type="number" id="codigo" 
	name="codigo"/><br/>
	nome:<input type="text" id="nome" 
	name="nome"/><br/>
	email:<input type="email" id="email" 
	name="email"/><br/>
	senha:<input type="password" id="senha" 
	name="senha"/><br/>
	<button name="bt1">Inserir</button>
	<button name="bt2">pesquisar</button>
	<button name="bt3">alterar</button>
	<button name="bt4">remover</button>
	</form>
	<?php
if(isset($_POST["bt1"])) inserir();
if(isset($_POST["bt2"])) pesquisar($_POST["codigo"]);	
if(isset($_POST["bt3"])) alterar();
if(isset($_POST["bt4"])) remover();
if(isset($_GET["codigo"])) pesquisar($_GET["codigo"]);
	?>
</body>
</html>	
<?php
function inserir(){
	$nome 	=	$_POST["nome"];
	$email 	=	$_POST["email"];
	$senha	=	$_POST["senha"];
	
	$conexao = new mysqli("localhost", "root", "", "pwt");
	$sql = "insert into cliente(nome,email,senha) values('$nome','$email',md5('$senha'))";
	mysqli_query($conexao, $sql);
	mysqli_close($conexao);
	echo "<h4>Registro inserido com sucesso!!</h4>";
}

function pesquisar($codigo){
	$conexao = new mysqli("localhost", "root", "", "pwt");
	$sql = "select * from cliente where codigo=$codigo";
	$resultado = mysqli_query($conexao, $sql);
	if($reg = mysqli_fetch_array($resultado)){
		$nome  = $reg["nome"];
		$email = $reg["email"];
		echo "<script lang='javascript'>";
		echo "nome.value='$nome';";
		echo "email.value='$email';";
		echo "codigo.value='$codigo';";
		echo "</script>";
	} else {
		echo "<h4>Registro não existe!!</h4>";
	}
	mysqli_close($conexao);
}

function alterar(){
	$codigo =	$_POST["codigo"];
	$nome 	=	$_POST["nome"];
	$email 	=	$_POST["email"];
	$senha	=	$_POST["senha"];
	
	$conexao = new mysqli("localhost", "root", "", "pwt");
	$sql = "update cliente set nome='$nome', email='$email', senha=md5('$senha') where codigo=$codigo";
	mysqli_query($conexao, $sql);
	mysqli_close($conexao);
	echo "<h4>Registro alterado com sucesso!!</h4>";
}


function remover(){
	$codigo =	$_POST["codigo"];
	
	$conexao = new mysqli("localhost", "root", "", "pwt");
	$sql = "delete from cliente where codigo=$codigo";
	mysqli_query($conexao, $sql);
	mysqli_close($conexao);
	echo "<h4>Registro removido com sucesso!!</h4>";
}


?>

