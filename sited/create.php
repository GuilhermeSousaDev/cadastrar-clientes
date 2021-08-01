<?php
session_start();
include_once 'db_connect.php';
function clear($input) {
    global $conn;
    $sqlTratament = mysqli_escape_string($conn,$input);
    $xssTratament = htmlspecialchars($sqlTratament);
    return $xssTratament;
}
if(isset($_POST['btn-cadastrar'])) {
    $nome = clear($_POST['name']);
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);
    
    $sql = "INSERT INTO clientes(nome,sobrenome,email,idade) VALUES('$nome','$sobrenome','$email',$idade)";
    mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn) > 0) {
        $_SESSION['msg'] = "Cadastrado Com Sucesso";
        header('Location: index.php');
    }else {
        $_SESSION['msg'] = "Erro ao Cadastrar";
        header('Location: index.php');
    }
}