<?php 
        

        if(isset($_GET['agendar'])){

            $nome = $_GET['nome'];
            $data = $_GET['dia'];
            $hora = $_GET['hora'];
            $corte = 0;
   
            $valor = isset($_GET['cortes']) ? $valor=$_GET['cortes'] : 0;

            switch($valor){
                case "1":
                    $corte = 1;
                  
                break;

                case "2":
                    $corte = 2;
                    
                break;

                case "3":
                    $corte = 3;
                    
                break;

                case "4":
                    $corte = 4;
                    
                break;

                case "5":
                    $corte = 5;
                    
                break;

                case "6":
                    $corte = 6;
                    
                break;

                case "7":
                    $corte = 7;
                    
                break;
             }

             include_once('config.php');

        $result = "insert into agendamento(id_prod, nome, dia, hora, morto) values ('$corte', '$nome' ,'$data','$hora', false)";
        $resultado = mysqli_query($conexao, $result);
        echo '<script>alert("Agendado com sucesso, procure não se atrasar!")</script>';
        $corte = "";
        $nome = "";
        $data = "";
        $hora = "";

        echo '<script>window.location.replace("index1.html")</script>';

        if (mysqli_insert_id($conexao)) {
	    
        } 
        else {
	    
            echo "Error: " . $result . "<br>" . mysqli_error($conexao);
        
    
            }
     
        mysqli_close($conexao);

        }
        
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: url("https://i.imgur.com/q53oPmf.png");
        }

        .box{
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%, -50%);
            background-color: #EEBB00;
            padding: 15px;
            border-radius: 15px;
            width: 30%;
        }

        fieldset{
            border:3px solid black;

        }
        legend{
            border: 2px solid white;
            padding: 10px;
            text-align: center;
            color: white;
            background-color: black;
            border-radius: 9px;
        }
        .inputBox{

            position: relative;

        }

        #palavra{
            font-size: 25px;
        }

        .inputUser{
            background: none;
            border: none;
            border-bottom: 2px solid black;
            outline: none;
            font-size: 25px;
            width: 100%;
            letter-spacing: 2px;

        }
        
       #dia, #hora{
        border:none;
        padding: 8px;
        border-radius: 5px;
        outline: none;
       }
      
       #agendar{
        
        width: 100%;
        border:none;
        padding: 15px;
        color:black;
        font-size: 16px;
        cursor: pointer;
        border-radius: 8px;
       }

       #agendar:hover {
        background-image: linear-gradient(to left, #ebebeb, #f3e331 );

}

    </style>

</head>
<body>
    <div class="box">
        <form name="cadastrar" method="GET" action="agendamentos.php">
            <fieldset>
            <legend><b>AGENDAMENTOS</b></legend>
            </br>
            <div class="imputBox">
                <label for="nome" class="labelInput" id="palavra"> <b>Seu nome: </b></label>
                <input type="text" name="nome" id="nome" class="inputUser" required>
                
            </div>
            <br> <br>
            <div class="campo">
                <label for="cortes" id="palavra"><strong>Cortes: </strong></label>
                <select id="cortes" name = "cortes" class="form-control form-control-lg" required>
                  <option selected disabled value="0">Selecione</option>
                  <option value= "1">Corte Normal</option>
                  <option value= "2">Corte Narvalhado</option>
                  <option value= "3">Corte Infanil</option>
                  <option value= "4">Progressiva</option>
                  <option value= "5">Corte e barbar</option>
                  <option value= "6">luzes</option>
                  <option value= "7">Descoloração</option>  
                </select>

                <br><br>
                
                    <label for="dia" id="palavra"><b> Data para Agendar </b></label>
                    <input type="date" name="dia" id="dia" required>
                
                <br><br>
                
                    <label for="hora" id="palavra"><b> hora para Agendar </b></label>
                    <input type="time" name="hora" id="hora"  required>
                    
                
            </div>
            <br><br>
            <button type = 'submit' name ='agendar' id='agendar'> Agendar </button>
            </fieldset>
        </form>
    </div>
    
</body>
</html>