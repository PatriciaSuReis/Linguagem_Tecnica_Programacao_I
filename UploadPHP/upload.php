<?php
    
    if(isset($_POST['acao'])){ 

        session_start();

        $arquivo = $_FILES['arquivo'];

        $extensoes = array('jpg', 'png', 'bmp', 'pdf');

        // Faz a verificação da extensão do arquivo
        $extensao = explode('.', $_FILES['arquivo']['name']);
        $extensao = strtolower(array_pop($extensao));
        
        if (array_search($extensao, $extensoes) === false) {
            $_SESSION['mensagem'] = "Por favor, envie arquivos com as seguintes extensões: jpg, png, bmp ou pdf.";
            header("location: index.php");
        } else {

            if( move_uploaded_file($arquivo['tmp_name'],'upload/'.$arquivo['name'])){
                $_SESSION['mensagem'] =  "Upload feito!";
                header("location: index.php");
            } else{
                $_SESSION['mensagem'] =  "Upload falhou, tente novamente!";
                header("location: index.php");
            }
            
        }

    }
?>