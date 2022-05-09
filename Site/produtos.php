<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/produtos.css">
</head>
<body>
	<section>
		<?php
		require_once 'classes/Produto.php';
		$p = new Produto('formulario_produtos','localhost','root','');
		$dados_produtos = $p->BuscarProdutos();
		if(empty($dados_produtos)){
			echo 'nn tem nada aqui';
		}else{
			//var_dump($dados_produtos);
			for ($i=0; $i <count($dados_produtos) ; $i++) { 
				echo "<a href='exibir_produto.php?id={$dados_produtos[$i]['id_produto']}'>
			<div>
				<img src='imagens/{$dados_produtos[$i]['fotocapa']}'>
				<h2>{$dados_produtos[$i]['nome_produto']}</h2>
			</div>
		</a>";
			}
		}
		
		?>
		
	</section>
</body>
</html>