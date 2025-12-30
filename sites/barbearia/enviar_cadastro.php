<?php

    include_once('config.php');

$nome = $_POST['nome'];  
$cortes = $_POST['cortes'];   
$dia = $_POST['dia']; 
$hora = $_POST['hora']; 


(new DateTime($hora))->format('H:i:s');


echo "Nome :".$nome; 
echo "<BR>";
echo "Corte :".$cortes;
echo "<BR>";
echo"dia:".$dia;
echo "<BR>";
echo"hora :".$hora;
// echo "<BR>";
// echo"email :".$email ;
 //echo "<BR>";
  // Tratamento campos
  
	

 $result = mysqli_query($conexao, "INSERT INTO agendamentos( nome, dia, hora)
values ($nome, $dia, $hora)");

if (mysqli_query($conexao, $result)) {
	echo "New record created successfully";
} else {
	echo "Error: " . $result . "<br>" . mysqli_error($conexao);
}
mysqli_close($conexao);
 
 


 
?>