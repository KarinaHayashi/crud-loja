
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <TITLE>Incluir</TITLE>
</head>
<body>
<?php
include("./function.php");
validaSessao();
?>
<style> a	{
		    text-shadow: 2px 2px 4px white;
			 border: 1px solid rgb(105, 108, 255);
             border-radius: 5px;
             background-color: rgb(226, 199, 219);
             color: rgb(105, 108, 255);
             text-align: center;
             padding: 5px;
			}
		h1{
			 text-shadow: 2px 2px 4px white;
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

if( isset($_POST['nome_produto']) && isset($_POST['preco']))  { 
     $nome_produto = $_POST['nome_produto'];
     $preco = $_POST['preco'];
   
}
$con=mysqli_connect("localhost","root","","projeto") or die ("erro!");
$in = "insert into produtos (nome_produto, preco) values ('$nome_produto', '$preco')";
$incluir=mysqli_query($con,$in);

if ($incluir==1)
{
   echo
"
<br>
<b><h1><span style='font-family:Lucida Console;text-align: center;color: rgb(105, 108, 255); font-size: 15 px'>Produto: $nome_produto <br></h1>	</b>

<h1><span style='font-family:Lucida Console;text-align: center;color: rgb(105, 108, 255); font-size: 15 px'>Preço:$preco <br></h1>
<br>
";
   
echo "<br><span style='font-family:Lucida Console;color: rgb(105, 108, 255); font-size: 15 px;'>Registro incluído com sucesso!<BR>";
}
else
{
   echo "Registro NÃO incluído!<BR>";
}
echo "<br><a href='produtoincluir.html'>Voltar</a>";

?>
</body>
</html>