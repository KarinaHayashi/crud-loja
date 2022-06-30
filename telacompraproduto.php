<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "projeto";	
	$connect = mysqli_connect($servername, $username, $password, $dbname);
    
	$query ="SELECT nome_produto FROM produtos";
    $result = $connect->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>
<html>
	<head>
		<title>Área de Compras</title>
		<meta charset="utf-8">
	<body>
	<style>
		h1{
			 text-shadow: 2px 2px 4px #d95b7f;
			 }
		body {
			background-image: url('pessoas.jpg');
			}
	</style>
	<h1><p style="font-family:Lucida Console; color:white; font-size:40px; text-align:center">Selecione o produto que deseja adicionar ao carrinho: </h1><br>
					<?php
						$link = mysqli_connect("localhost", "root", "", "projeto");
						$sql = "SELECT * FROM produtos ORDER BY nome_produto";
						$result = mysqli_query($link, $sql);
						if ($result) {
						while ($row = mysqli_fetch_assoc($result)) {
						echo "<span style='text-shadow: 2px 2px 4px #d95b7f; font-family:Lucida Console; color: white; font-size: 23px;'> ", $row["nome_produto"], "  - R$ " ,$row["preco"],
						 " <a href=\"./carrinho.php?a=".$row["id"]."\">
						<span style='font-family:Lucida Console;color: white; font-size: 15 px;'> <br> ADICIONE
						</a><br>";
						}
						}
						?>
					<br><br><span style="font-family:Lucida Console;color: white; font-size: 15 px;"> <a href="./carrinho.php">Carrinho</a>
			</select>
	</body>
</html>