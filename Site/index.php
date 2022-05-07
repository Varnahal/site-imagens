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
		<input type="submit" id="botao">
	</form>
	</section>
</body>
</html>