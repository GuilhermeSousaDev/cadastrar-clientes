<?php
$server = 'localhost';
$username = 'root';
$senha = "";
$db_name = 'crud';

$conn = mysqli_connect($server,$username,$senha,$db_name);
mysqli_set_charset($conn, "uft8");

if(mysqli_connect_error()) {
    echo "Erro na conexão:" . mysqli_connect_error();
}