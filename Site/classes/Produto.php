<?php

class Produto{
    private $pdo;
    public function __construct($dbname,$host,$user,$pass) {
        try {
            $this->pdo = new PDO("mysql:dbname=$dbname;host=$host;charset=utf8",$user,$pass);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function EnviarProduto($nome,$desc,$fotos = array()){
        //enviar um novo produto ao banco de dados
        //iserir o produto
        $cmd = $this->pdo->prepare("INSERT INTO produtos VALUES (default,:n,:d)");
        $cmd->bindValue(':n',$nome);
        $cmd->bindValue(':d',$desc);
        $cmd->execute();
        $id_produto = $this->pdo->lastInsertId();
        //iserir imagem
        if(count($fotos)>0){//se imagens foram enviadas
            for ($i=0; $i < count($fotos) ; $i++) { 
                $foto = $fotos[$i];
                $cmd = $this->pdo->prepare("INSERT INTO imagens VALUES (default,:n,:fk)");
                $cmd->bindValue(':n',$foto);
                $cmd->bindValue(':fk',$id_produto);
                $cmd->execute();
            }
           
        }
        

    }
    public function BuscarProdutos(){
        //buscar todos os produtos do banco de dados 
        $cmd = $this->pdo->prepare("SELECT *,(SELECT nome_imagem FROM imagens WHERE fk_id_produto = produtos.id_produto LIMIT 1 ) AS fotocapa FROM produtos");
        $cmd->execute();
        if($cmd->rowCount()>0){
            $dados = $cmd->fetchAll();
        }else{
            $dados = array();
        }
        return $dados;
    }
    public function BuscarProdutoPorId($id){
        //buscar um produto especifico usando o id
        $cmd = $this->pdo->prepare("SELECT * FROM produtos WHERE id_produto = :id");
        $cmd->bindValue(':id',$id);
        $cmd->execute();
        if($cmd->rowCount()>0){
            $dados = $cmd->fetch();
        }else{
            $dados = array();
        }
        return $dados;
    }
    public function BuscarImagensPorId($id){
        //buscar imagens com base no id enviado
        $cmd = $this->pdo->prepare("SELECT nome_imagem FROM imagens WHERE fk_id_produto = :id");
        $cmd->bindValue(':id',$id);
        $cmd->execute();
        if($cmd->rowCount()>0){
            $dados = $cmd->fetch();
        }else{
            $dados = array();
        }
        return $dados;
    }

}

?>