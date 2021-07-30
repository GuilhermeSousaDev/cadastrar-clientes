<?php
    include_once 'includes/message.php';
    include_once 'db_connect.php';
    include_once 'includes/header.php';   
    if(isset($_GET['delete_id'])) {
        $id = mysqli_escape_string($conn,$_GET['delete_id']);
        $sql = "DELETE FROM clientes WHERE id = $id";
        mysqli_query($conn,$sql);
        header('Location:index.php');
    }
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Clientes</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Sobrenome:</th>
                    <th>Email:</th>
                    <th>Idade:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM clientes";
                    $result = mysqli_query($conn,$sql);
                    while($dados = mysqli_fetch_array($result)) {  
                ?>
                <tr>
                    <td><?php echo $dados['nome'];?></td>
                    <td><?php echo $dados['sobrenome'];?></td>
                    <td><?php echo $dados['email'];?></td>
                    <td><?php echo $dados['idade'];?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $dados['id']?>" class="btn-floating blue">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                    <td>
                        <a name="delete" href="index.php?delete_id=<?php echo $dados['id']?>" class="btn-floating red">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <a href="newclient.php" class="btn">Adicionar Cliente</a>
    </div>
</div>
 
        