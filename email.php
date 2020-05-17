<?php

$nome = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$mensagem = addslashes($_POST['mensage']);

$to = "projetoverdemente@gmail.com";
$subject = "Semeando a semente do futuro";
$body = "Nome: ".$nome. "\r\n".
        "Email: ".$email. "\r\n".
        "Messagem".$mensagem. "\r\n";
$header = "from:caioneres40@gmail.com"."/r/n"
          ."Reply-To:".$email."/r/n"
          ."X=Mailer:PHP/".phpversion();

if(mail($to,$subject,$body,$header)){
    echo("Email enviado !");
}else{
    echo("email não enviado !");
}

?>