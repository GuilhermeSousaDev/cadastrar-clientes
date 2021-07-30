<?php
session_start();
include_once 'includes/header.php';
include_once 'db_connect.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    $dados = mysqli_fetch_array($result);
    $_SESSION['id'] = $_GET['id'];
}
?>
<div class="row">
<div class="col s12 m6 push-m3">
    <h3 class="light">Editar Cliente</h3>
    <!--Formulário de Cadastro-->
    <form action="update.php" method="POST">
        <div class="input-field col s12">
            <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>">
            <label for="nome">Nome</label>
        </div>
        <div class="input-field col s12">
            <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome'];?>">
            <label for="sobrenome">Sobrenome</label>
        </div>
        <div class="input-field col s12">
            <input type="text" name="email" id="email" value="<?php echo $dados['email'];?>">
            <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
            <input type="text" name="idade" id="idade" value="<?php echo $dados['idade'];?>">
            <label for="idade">Idade</label>
        </div>
        <button type="submit" name="btn-editar" class="btn">Atualizar</button>
        <a href="index.php" class="btn green">Lista de Clientes</a>
    </form>
    <br>
</div>
</div>

    