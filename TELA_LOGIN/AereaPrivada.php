<?php
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location: index.php");
    exit;
}
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Solicitação</title>
        <link rel = "stylesheet" href="CSS/estilo.css">
        
   
    </head>
    <body>
        <div id="corpo-form">
        <h1>Solicitação</h1>
            <form method="POST" >
                <input type="Nome" placeholder="Nome" name="Nome">
                <input type="Quarto"  placeholder="Quarto" name="Quarto">
                <input type="Descrição"  placeholder="Descrição" name="Descrição">
        <input type="submit" value="Enviar">
        

<a href="Sair.php">Sair</a>