<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios de Função PHP</title>
</head>

<body>

    <h1>Calculadora</h1>
    <form action="" method="POST">
        <label for="numero">Informe um número</label>
        <div class="container-input">
            <input type="text" name="numero" id="numero" required>
            <input name="botaoCalculadora" type="submit" value="Calcular">
        </div>
    </form>

    <?php

    # CALCULADORA

    echo "<h3> === Resultado === </h3>";

    if (isset($_POST['botaoCalculadora'])) :
        $numero = $_POST['numero'];
        if (!is_numeric($numero)) :
            echo 'Informe apenas números';
        else :
            Calculadora($numero);
        endif;
    endif;

    function Calculadora($numero)
    {
        for ($index = 1; $index <= 10; $index++) {
            echo "<p> $numero x $index = " . $numero * $index . "</p>";
        }
    }
    ?>
    <hr>
    <h1>Inverte Array</h1>
    <?php

    # INVERTER O ARRAY

    $frutas = ['Maçã', 'Pera', 'Melão', 'Banana', 'Abacate', 'Kiwi'];
    echo "<h3>Vetor de frutas</h3>";
    echo "<pre>";
    print_r($frutas);
    echo "</pre>";

    echo "<h3>Vetor de frutas invertido</h3>";
    echo "<pre>";
    print_r(array_reverse($frutas));
    echo "</pre>";

    ?>
    <hr>
    <h1>Formata CPF</h1>
    <form action="" method="POST">
        <label for="cpf">Informe um cpf</label>
        <div class="container-input">
            <input type="text" name="cpf" id="cpf" required maxlength="11">
            <input name="botaoCPF" type="submit" value="Formatar">
        </div>
    </form>
    <?php

    # FORMATAR CPF

    if (isset($_POST['botaoCPF'])) :
        $cpf = $_POST['cpf'];
        $cpfFormatado =
            substr($cpf, 0, 3) . '.' .
            substr($cpf, 3, 3) . '.' .
            substr($cpf, 6, 3) . '-' .
            substr($cpf, 9, 3);
        echo "<p> CPF: $cpfFormatado </p>";
    endif;
    ?>
    <hr>
    <h1>Converter Temperaturas</h1>

    <?php

    # CONVERTER TEMPERATURAS

    function converteTemperatura($temperaturas)
    {
        $celsius = [];
        foreach ($temperaturas as $temperatura) {
            $temperatura = number_format(($temperatura - 32) / 1.8, 2);
            array_push($celsius, $temperatura);
        }
        return $celsius;
    }

    $fahrenheitArray = [90, 77, 52, 12];
    $celsiusArray = converteTemperatura($fahrenheitArray);

    $temperaturas = [$fahrenheitArray, $celsiusArray];

    foreach ($temperaturas as $index => $temperatura) {
        echo "<br>";
        foreach ($temperatura as $tipo) {
            if ($index === 0) {
                echo "$tipo ºF <br>";
            } else {
                echo "$tipo ºC <br>";
            }
        }
    }
    ?>
    <hr>
    <h1>Busca Texto</h1>

    <?php

    # BUSCAR TEXTO

    function buscarPalavras($texto, $buscar)
    {
        if (is_array($buscar)) {
            foreach ($buscar as $palavra) {
                $modificacao = "<font color='red'>$palavra</font>";
                $texto = str_replace($palavra, $modificacao, $texto);
            }
        }
        return "<p>$texto</p>";
    }

    $texto = 'Num ninho de mafagafos há sete mafagafinhos. Quando a mafagafa gafa, gafam os sete mafagafinhos.';
    $buscar = ['mafagafinhos', 'sete', 'gafa'];

    echo buscarPalavras($texto, $buscar);

    ?>
    <hr>
    <h1>Acumular valores</h1>

    <?php

    # SOMAR VALORES DO VETOR

    function somarVetor($vetor)
    {
        $acumulador = 0;

        $acumulador = array_sum($vetor);

        /*for ($index = 0; $index <= count($vetor); $index++) {
            $acumulador += $vetor[$index]; //erro em acessa a última chave do array
        }*/
        
        return "Acumulador: " . $acumulador;
    }

    $numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    echo somarVetor($numeros);

    ?>
    <hr>
    <h1>Maior número do vetor</h1>

    <?php
        # MAIOR VALOR DO ARRAY
        
        $array = [1,3,5,7,9];
        $arraymax = max($array); 

        echo "Valores do vetor ";
        foreach ($array as $value) {
            echo $value . ", ";
        }
        echo "<br>O número maior do vetor é " . $arraymax . ".";
        
    ?>

</body>

</html>