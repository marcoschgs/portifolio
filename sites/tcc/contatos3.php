<?php 
        
        
// Conexão com o banco de dados (substitua as informações de acordo com seu ambiente)
$host = 'localhost';
$dbname = 'techfeeder';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Dados do cliente
if(isset($_GET['contatar'])){

    $nome = $_GET['nome'];
    $celular = $_GET['celular'];
    $email = $_GET['email'];

// Verifica se o cliente já está registrado
$stmt = $pdo->prepare("SELECT id_cli FROM cliente WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // Cliente já registrado, insere o contato com a chave estrangeira do cliente
    $cliente_id = $result['id_cli'];
    $mensagem = $_GET['mensagem'];

    $stmt = $pdo->prepare("INSERT INTO contatos (cliente_id, mensagem, data_emissao, morto) VALUES (:cliente_id, :mensagem, NOW(), false)");
    $stmt->bindParam(':cliente_id', $cliente_id);
    $stmt->bindParam(':mensagem', $mensagem);
    $stmt->execute();
    header("Location: confirmacao.php");
    echo "Contato registrado com sucesso!";
    $nome = "";
$celular = "";
$email = "";
$mensagem = "";
} else {
    // Cliente não registrado, insere o cliente e o contato
    $stmt = $pdo->prepare("INSERT INTO cliente (nome, celular, email, morto) VALUES (:nome, :celular, :email, false)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':celular', $celular);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $cliente_id = $pdo->lastInsertId();

    $mensagem = $_GET['mensagem'];

    $stmt = $pdo->prepare("INSERT INTO contatos (cliente_id, mensagem, data_emissao, morto) VALUES (:cliente_id, :mensagem, NOW(), false)");
    $stmt->bindParam(':cliente_id', $cliente_id);
    $stmt->bindParam(':mensagem', $mensagem);
    $stmt->execute();

    header("Location: confirmacao.php");
    echo "Cliente e contato registrados com sucesso!";
    $nome = "";
$celular = "";
$email = "";
$mensagem = "";
}


}
            
            
    ?>
    

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="os pikas" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="robots" content="index, follow"/>

    <link rel="stylesheet" type="text/css" href="css/styleC.css">
    <link rel="shortcut icon" href="img/icon.png" type="image/ico" />    
    
    <title>Contato</title>
</head>
<body>
    <div class="responsive_site">
    <div class="box1">

        <div class="responsive_titulo">
    <div class="letra1">Contato </div>
    <div class="letra2">Fale conosco </div>
        </div>
            <svg class="linha" xmlns="http://www.w3.org/2000/svg" width="3774" height="50" viewBox="0 0 3774 50" fill="none">
                <path d="M0.0043493 0L3773 0V50L0.00195312 50L0.0043493 0Z" fill="url(#paint0_linear_118_10)"/>
                <defs>
                <linearGradient id="paint0_linear_118_10" x1="-4792.51" y1="101.816" x2="5811.32" y2="169.815" gradientUnits="userSpaceOnUse">
                <stop offset="0.572917" stop-color="#425172"/>
                <stop offset="0.661458" stop-color="#FFF3D3"/>
                </linearGradient>
                </defs>
                </svg>
      


                <form class="form">
                    <label  class="dudahatake" for="telNo">Nome Completo:</label>
                    <input type="text" placeholder="Meu nome é:" class="textbox" id="nome" name="nome" required/>


                    <label  class="dudahatake" for="telNo">Número de Celular:</label>
                    <input type="tel" id="celular" name="celular" class="textbox" placeholder="(XX) XXXXX-XXXX" pattern="\([0-9]{2}\) [0-9]{5}-[0-9]{4}" required>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                        var telefoneInput = document.getElementById("celular");

                        telefoneInput.addEventListener("input", function (event) {
                            var inputValue = telefoneInput.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
                            var formattedValue = "";

                            if (inputValue.length > 0) {
                            formattedValue += "(" + inputValue.substring(0, 2) + ") ";

                            if (inputValue.length > 2) {
                                formattedValue += inputValue.substring(2, 7) + "-";

                                if (inputValue.length > 7) {
                                formattedValue += inputValue.substring(7, 11);
                                }
                            }
                            }

                            telefoneInput.value = formattedValue;
                        });

                        telefoneInput.addEventListener("keydown", function (event) {
                        if (event.key === "Backspace") {
                        // Permite a exclusão apenas se o cursor estiver imediatamente após um espaço, parêntese ou travessão
                        var cursorPosition = telefoneInput.selectionStart;
                        if (
                            cursorPosition > 0 &&
                            /[)-]/.test(telefoneInput.value[cursorPosition - 1])
                        ) {
                            event.preventDefault();
                            telefoneInput.value =
                            telefoneInput.value.slice(0, cursorPosition - 2) +
                            telefoneInput.value.slice(cursorPosition - 1);
                        }
                        }
                    });
                    });
                        </script>
                   
                    <label class="dudahatake" for="telNo">Email:</label>
                    <input type="email" placeholder="exemplo@gmail.com" class="textbox" id="email" name="email" required/>

                    <label class="dudahatake" for="telNo">Descreva:</label>
                    <textarea type="text" placeholder="Descreva a razão de seu contato:" class="textbox" autocomplete="off" style="height: 24%;" id="mensagem" name="mensagem"></textarea>
                


 <div class="responsive_titulo">
 <a href=""><button type="submit" class="read_button" id="contatar" name="contatar">Contatar</button></a>
</div>

                </form>





    </div>
</div>
   





</body>
</html>