<?php
session_start();
include_once 'db_connect.php';
if(isset($_POST['btn-cadastrar'])) {
    $nome = mysqli_escape_string($conn, $_POST['nome']);
    $sobrenome = mysqli_escape_string($conn, $_POST['sobrenome']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $idade = mysqli_escape_string($conn, $_POST['idade']);
    
    $sql = "INSERT INTO clientes(nome,sobrenome,email,idade) VALUES('$nome','$sobrenome','$email',$idade)";
    mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn) > 0) {
        $_SESSION['msg'] = "Cadastrado Com Sucesso";
        header('Location: index.php?sucesso');
    }else {
        $_SESSION['msg'] = "Erro ao Cadastrar";
        header('Location: index.php?erro');
    }
}