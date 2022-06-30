<?php
	if (isset($_GET["a"])) {
		if ($_COOKIE["favoritos"]) {
			if (strpos($_COOKIE["favoritos"], "'".$_GET["a"]."'") === false) {
			setcookie("favoritos", $_COOKIE["favoritos"].",'".$_GET["a"]."'");
		}
	}
		else {
		setcookie("favoritos", "'".$_GET["a"]."'");
	}
	header("Location: ./carrinho.php");
	exit;
	} elseif (isset($_GET["r"])) {
	if ($_COOKIE["favoritos"]) {
	if (strpos($_COOKIE["favoritos"], "'".$_GET["r"]."'") !== false) {
	$favoritos = $_COOKIE["favoritos"];
	$favoritos = str_replace(",'".$_GET["r"]."'," , ",", $favoritos);
	$favoritos = str_replace("'".$_GET["r"]."'," , "", $favoritos);
	$favoritos = str_replace(",'".$_GET["r"]."'" , "", $favoritos);
	$favoritos = str_replace("'".$_GET["r"]."'" , "", $favoritos);
	setcookie("favoritos", $favoritos);
		}
	}
	header("Location: ./carrinho.php");
	exit;
	}
	?>
	<html>
	<head>
	<title>Favoritos</title>
	</head>
	<body>
	<style>
		h1{
			 text-shadow: 2px 2px 4px #d95b7f;
			 }
		body {
			background-image: url('pessoa.jpg');
			}
	</style>
	<h1><h1><p style="font-family:Arial; color:white; font-size:40px; text-align:center">Carrinho de Compras</h1>
		<?php
			if (isset($_COOKIE["favoritos"])) {
				$link = mysqli_connect("localhost", "root", "", "projeto");
				$sql = "SELECT * FROM produtos WHERE id IN (".$_COOKIE["favoritos"].") ORDER BY nome_produto";
				$result = mysqli_query($link, $sql);
				if ($result) {
				while ($row = mysqli_fetch_assoc($result)) {
				echo "<span style='text-shadow: 2px 2px 4px #d95b7f; font-family:Arial; color: white; font-size: 23px;'> ",$row["nome_produto"], " - R$", $row["preco"]." <a href=\"./carrinho.php?r=".$row["id"]."\">Finalizar compra</a><br>";
						}
					}
				} else {
				echo "<span style='text-shadow: 2px 2px 4px #d95b7f; font-family:Arial; color: white; font-size: 20px'> Sem produtos no carrinho. <br>";
			}
		?>
	<br><br><br><br><a href="./telacompraproduto.php">Compre mais produtos!</a>
	</body>
</html>