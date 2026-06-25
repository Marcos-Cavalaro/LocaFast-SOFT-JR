<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
require_once './app/DB/Conexao.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function EnviarEmail($info) {

    $email          = $info[0]; 
    $nome           = $info[1]; 
    $data_retirada  = $info[2]; 
    $data_devolucao = $info[3]; 
    $valor_locacao  = $info[4]; 
    $categoria      = $info[5]; 

    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_OFF; 
        $mail->isSMTP();

        $mail->Host       = 'SEU HOST'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'SEU USERNAME'; 
        $mail->Password   = 'SUA SENHA'; 
        $mail->Port       = 2525;             


        $mail->setFrom('SEU EMAIL');
        $mail->addAddress($email);

  
        $mail->isHTML(true); 
        $mail->Subject = 'Confirmacao de Aluguel - Locafast';
        $mail->Body    = 'Ola ' . $nome .'! Seu aluguel foi cadastrado com sucesso no sistema. <br> | Data Retirada: ' . $data_retirada . ' | Data Devolucao: ' . $data_devolucao . ' | Categoria: ' . $categoria . ' | Valor Locacao: ' . $valor_locacao . ' |'  ;
        $mail->AltBody = 'Ola ' . $nome .'! Seu aluguel foi cadastrado com sucesso no sistema. <br> | Data Retirada: ' . $data_retirada . ' | Data Devolucao: ' . $data_devolucao . ' | Categoria: ' . $categoria . ' | Valor Locacao: ' . $valor_locacao . ' |';

        $mail->send();
        return true;
    } catch (Exception $e) {
        
        echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        return false;
    }
}

function EnviarEmailAtualizado($info) {

    $email          = $info[0]; 
    $nome           = $info[1]; 
    $data_retirada  = $info[2]; 
    $data_devolucao = $info[3]; 
    $valor_locacao  = $info[4]; 
    $categoria      = $info[5]; 

    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_OFF; 
        $mail->isSMTP();

        $mail->Host       = 'SEU HOST'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'SEU USERNAME'; 
        $mail->Password   = 'SUA SENHA'; 
        $mail->Port       = 2525;             


        $mail->setFrom('SEU EMAIL');
        $mail->addAddress($email);

  
        $mail->isHTML(true); 
        $mail->Subject = 'Confirmacao de Aluguel - Locafast';
        $mail->Body    = 'Ola ' . $nome .'! Seu aluguel foi Atualizado no sistema. <br> | Data Retirada: ' . $data_retirada . ' | Data Devolucao: ' . $data_devolucao . ' | Categoria: ' . $categoria . ' | Valor Locacao: ' . $valor_locacao . ' |'  ;
        $mail->AltBody = 'Ola ' . $nome .'! Seu aluguel foi Atualizado no sistema. <br> | Data Retirada: ' . $data_retirada . ' | Data Devolucao: ' . $data_devolucao . ' | Categoria: ' . $categoria . ' | Valor Locacao: ' . $valor_locacao . ' |';

        $mail->send();
        return true;
    } catch (Exception $e) {
        
        echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        return false;
    }
}

function EnviarEmailSolicita($info) {

    $email          = $info[0]; 
    $nome           = $info[1]; 
    $data_retirada  = $info[2]; 
    $data_devolucao = $info[3]; 
    $valor_locacao  = $info[4]; 
    $categoria      = $info[5];
    $status_aluguel = $info[6]; 

    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = SMTP::DEBUG_OFF; 
        $mail->isSMTP();

        $mail->Host       = 'SEU HOST'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'SEU USERNAME'; 
        $mail->Password   = 'SUA SENHA'; 
        $mail->Port       = 2525;             


        $mail->setFrom('SEU EMAIL');
        $mail->addAddress($email);

  
        $mail->isHTML(true); 
        $mail->Subject = 'Confirmacao de Aluguel - Locafast';
        $mail->Body    = 'Ola ' . $nome .'! Sua Solicitacao de aluguel foi Enviada com Sucesso. <br> | Data Retirada: ' . $data_retirada . ' | Data Devolucao: ' . $data_devolucao . ' | Categoria: ' . $categoria . ' | Valor Locacao: ' . $valor_locacao . ' | Status: ' . $status_aluguel . ' |'  ;
        $mail->AltBody = 'Ola ' . $nome .'! Sua Solicitacao de aluguel foi Enviada com Sucesso. <br> | Data Retirada: ' . $data_retirada . ' | Data Devolucao: ' . $data_devolucao . ' | Categoria: ' . $categoria . ' | Valor Locacao: ' . $valor_locacao . ' | Status: ' . $status_aluguel . ' |' ;

        $mail->send();
        return true;
    } catch (Exception $e) {
        
        echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        return false;
    }
}