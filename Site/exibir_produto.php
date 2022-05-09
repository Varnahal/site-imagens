<?php

require_once 'classes/Produto.php';
$p = new Produto('formulario_produtos','localhost','root','');
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id = filter_input(INPUT_GET,"id");
	$dados_produto = $p->BuscarProdutoPorId($id);
	$imagens = $p->BuscarImagensPorId($id);
}else{
	header("Location:produtos.php");
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/exi-produto.css">
</head>
<body>
	<section>
		<?php
		//var_dump($imagens);
		echo"<div>
				<h1>{$dados_produto['nome_produto']}</h1>
				<p><b>Descrição: {$dados_produto['descricao']}</b></p>
			</div>";
			for ($i=0; $i < count($imagens) ; $i++) { 
				echo'<div id="imagens">
						<div class="caixa-img">
							<img src="imagens/'.$imagens['nome_imagem'].'">
						</div>
					</div>';
			}
		?>
		
		
	</section>
</body>
</html>