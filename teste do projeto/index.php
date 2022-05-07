<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        NOME<input type="text" name="nome" id="nome">
        E-MAIL<input type="text" name="email" id="email">
        <input type="file" name="foto[]" id="foto" multiple>
        <input type="submit" value="enviar" name="penis">
    </form>
    <?php
    
   /* if(isset($_POST['penis'])){
    $dados = filter_input_array(INPUT_POST);
    var_dump($dados);
    if($_FILES['foto']['type'] == 'image/png')
    {
        $nome_foto = md5($_FILES['foto']['name'].rand(1,999)).".png";
    }elseif($_FILES['foto']['type']=='image/jpeg')
    {
        $nome_foto = md5($_FILES['foto']['name'].rand(1,999)).'.jpg';
        
    }else{
        $nome_foto = md5($_FILES['foto']['name'].rand(1,999)).'.jpg';
    }
    if(isset($_FILES['foto'])){
        
      move_uploaded_file($_FILES['foto']['tmp_name'],"imagens/$nome_foto");
        
       // header("Location:index.php");
        echo $_FILES['foto']['type'];
    }
}*/
if(isset($_FILES['foto']))
{
    for ($i=0; $i < count($_FILES['foto']['name']); $i++) 
    { 
            if($_FILES['foto']['type'][$i]== 'image/png')
        {
            $nome_foto = md5($_FILES['foto']['name'][$i].rand(1,999)).".png";
            move_uploaded_file($_FILES['foto']['tmp_name'][$i],"imagens/$nome_foto");
        }
        elseif($_FILES['foto']['type'][$i]=='image/jpeg')
        {
            $nome_foto = md5($_FILES['foto']['name'][$i].rand(1,999)).'.jpg';
            move_uploaded_file($_FILES['foto']['tmp_name'][$i],"imagens/$nome_foto");
        }
        else
        {
            echo 'formatos aceitados são png e jpg';
        }
    }
}
    ?>
</body>
</html>