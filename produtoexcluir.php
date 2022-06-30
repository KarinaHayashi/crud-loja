
<html>
<body>
<?php
include("./function.php");
validaSessao();
?>
<style>
		h1{
			 text-shadow: 2px 2px 4px #d95b7f;
			 border: 1px solid rgb(105, 108, 255);
             border-radius: 5px;
              background-color: rgb(226, 199, 219);
             color: rgb(105, 108, 255);
              text-align: center;
              padding: 5px;
			 }
		body {
			background-image: url('img.jpg');
			}
	</style>
<?php
$id =trim($_GET["id"]);
$bd=mysqli_connect("localhost","root","","projeto") or die ("erro!");

$excluiu=mysqli_query($bd,"delete from produtos where id = '$id'");

if ($excluiu == 1)
		echo "O registro foi excluído!";
	else
		echo "O registro NÃO foi excluído!";

?>
<br><a href="produtoconsulta.html">Voltar para nova consulta!</a><br>
<br><a href="produtoincluir.html">Voltar para nova inclusão!</a><br>
</body>
</html>