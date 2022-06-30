
<html>
<body>
<?php
include("./function.php");
validaSessao();
?>
<style>
		h1	{   text-align: center;
			   border: 1px solid rgb(105, 108, 255);
               border-radius: 5px;
               color: rgb(105, 108, 255);
              padding: 5px;
			 }
		
		body {
			background-image: url('img.jpg');
			border: 1px solid rgb(105, 108, 255);
               border-radius: 5px;
               color: rgb(105, 108, 255);
              padding: 5px;
			  font-size: 40px;
			  text-shadow: 2px 2px 4px white;
			}
	</style>
<?php	

$procura = $_POST["procura"];
$bd=mysqli_connect("localhost","root","","projeto") or die ("erro!");

if (isset($_POST ["op"]) and isset($_POST ["procura"]))
{
	$op = $_POST ["op"];
	
	if ($op=="nome_produto")
		$consulta=mysqli_query($bd,"select * from produtos where nome_produto like '%$procura%'");
	
	if ($op=="preco")
		$consulta=mysqli_query($bd,"select * from produtos where preco like '%$procura%'");

	if ($op=="id")
		$consulta=mysqli_query($bd,"select * from produtos where id like '%$procura%'");
} else
{
	echo "volte a página e escolha o campo que fará a pesquisa.";
	exit;
}
$reg = mysqli_fetch_array($consulta);
if ($reg==0)
{
	echo "Não existem registros para a pesquisa!";
	exit;
	
}
while ($reg!=0)
{
$id = $reg["id"];
$nome_produto=$reg["nome_produto"];
$preco=$reg["preco"];

echo 
"
<br>
<p><h1><span style='font-family:time Console; font-size: 20px;'>ID do produto: $id <br></h1></p>
<p><h1><span style='font-family:time Console; font-size: 20px;'>Produto: $nome_produto <br></h1></p>			

<p><h1><span style='font-family:time Console; font-size: 20px;'>Preço:$preco <br></h1></p>
";
?>

<?php
	$reg = mysqli_fetch_array($consulta);		
} 
?>

<a href="produtoexcluir.php?id=<?php echo $id;?>" onclick = "return confirm ('Exclui o registro?')">Excluir</a>
 "<br><a href='produtoconsulta.html'>Voltar</a>";
</body>
</html>