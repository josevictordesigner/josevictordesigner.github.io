<?php

// Check for empty fields
if( empty( $_POST['nome'] ) ||
	empty( $_POST['email'] ) ||
	empty( $_POST['mensagem'] ) ||
	!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ) {
	 echo "Não há argumentos apresentados";
	 return false;
}

$nome = strip_tags( htmlspecialchars( $_POST['nome'] ) );
$email_address = strip_tags( htmlspecialchars( $_POST['email'] ) );
$mensagem = strip_tags( htmlspecialchars( $_POST['mensagem'] ) );

// Criar mensagem e enviar por email
$to = 'jv.lopes@live.com'; // Adicionar meu endereço de e-mail
$email_body = "Você recebeu uma nova mensagem pelo seu formulário .\n\n" . "Aqui estão os detalhes :\n\nNome: $nome\n\nEmail: $email_address\n\nMensagem:\n$mensagem";
$headers = "contato@cliente.com.br"; // E-mail que apareçe a quando eu receber a mensagem
$headers .= "Reply-To: $email_address";
mail( $to, $email_subject, $email_body, $headers );
return true;