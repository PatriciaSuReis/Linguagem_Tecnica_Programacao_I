<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    <h1>Uploads de arquivos</h1>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="arquivo"/>
        <input type="submit" name="acao" value="Enviar">
    </form> <br>

    <?php
        session_start();
        $mensagem = $_SESSION['mensagem'];

        if($mensagem != '') {
            echo $mensagem."<br><br>";
        }

        echo "<hr>";

        $pasta = "upload/";
        $diretorio = dir($pasta);

        while($arquivo = $diretorio->read()){
            if($arquivo != '.' && $arquivo != '..'){
                echo "<a href='".$pasta.$arquivo."'><img src='".$pasta.$arquivo."'width='55'>".$arquivo."</a><br>";
            }
        }
    ?>

</body>
</html>