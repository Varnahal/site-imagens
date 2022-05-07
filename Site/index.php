<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<section>
	<a href="produtos.php">Ver todos os produtos</a>
	<form method="POST" enctype="multipart/form-data">
		<h1>ENVIO DE IMAGENS</h1>
		<label for="nome">Nome do Produto</label>
		<input type="text" name="nome" id="nome">
		<label for="des">Descrição</label>
		<textarea name="desc" id="desc"></textarea>
		<input type="file" name="foto[]" multiple id="foto">
		<input type="submit" id="botao" name="botao">
	</form>
	</section>
</body>
</html>
<?php

if(isset($_POST['botao'])){
	$nome = addslashes($_POST['nome']);
	$desc = addslashes($_POST['desc']);
	$fotos = array();
	if(isset($_FILES['foto'])){
		for ($i=0; $i < count($_FILES['foto']['name']) ; $i++) { 
			//colocando as imagens no diretorio imagens
			$nome_arquivo = md5($_FILES['foto']['name'][$i].rand(1,9999)).'.jpg';
			move_uploaded_file($_FILES['foto']['tmp_name'][$i],'imagens/'.$nome_arquivo);
			//colocando o nome das fotos em um array
			array_push($fotos,$nome_arquivo);
		}
	}
	if(!empty($nome)&&!empty($desc)){
		require_once 'classes/Produto.php';
		$p = new Produto('formulario_produtos','localhost','root','');
		$p->EnviarProduto($nome,$desc,$fotos);
		?>
		<script>alert("Produto enviado com sucesso")</script>
		<?php
	}else{
		?>
		<script>alert("Preencha todo os campos")</script>
		<?php
	}
}

?>