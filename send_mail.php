<?php
require "adm/conecta.php";

$cert_id = $_GET['id'];

$sql = "SELECT * FROM certificados WHERE id = '".$cert_id."' ";
$result = mysqli_query($con, $sql);
echo mysqli_error($con);
$total = mysqli_num_rows($result);

if($total)
{   
    $dados = @mysqli_fetch_array($result); 
    $id = $dados["id"]; 
    $certificados = $dados["certificados"];
    $cnpj = $dados["cnpj"]; 
    $email = $dados["email"];
    $vencimento = $dados["vencimento"]; 
    $status = $dados["status"];    
    
}

if($status == 0){

    //Compo E-mail
  
  $arquivo = file_get_contents("email.html");
  $from = "ti@contafacio.com.br";
  $to = $email;
  $assunto = "Renovar certificado";

$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/html ; charset=iso-8859-1\n";
$headers .= "From: $from\n"; // remetente
$headers .= "Return-Path: $from\n"; // return-path
$headers .= "Reply-To: $to\n"; // Endereço (devidamente validado) que o seu usuário informou no contato

  $enviaremail = mail($to, $assunto, $arquivo, $headers, "-f$from");


  if(!$enviaremail){
     $errorMessage = error_get_last()['message'];
     echo $errorMessage;

  }else{
    echo "Email enviado com sucesso!";
  }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title></title>
    <script src="jquery-2.1.4.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style type="text/css">
    .content.active {
  display:block;
}
.content {
  display:none;
}
</style>
</head>
<body>
  
</body>

</html>







