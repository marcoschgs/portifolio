<?php 
    $nome = $_POST['nome'];
    
    
    $valor = isset($_POST['cortes']) ? $valor=$_POST['dia'] : 0;

    switch($valor){
        case "1":
            $corte = 1;
            echo "corte 1";
        break;

        case "2":
            $corte = 2;
            echo "corte 2";
        break;

        case "3":
            $corte = 3;
            echo "corte 3";
        break;

        case "4":
            $corte = 4;
            echo "corte 4";
        break;

        case "5":
            $corte = 5;
            echo "corte 5";
        break;

        case "6":
            $corte = 6;
            echo "corte 6";
        break;

        case "7":
            $corte = 7;
            echo "corte 7";
        break;
    }

    echo $nome;
    echo $corte;

   
?>