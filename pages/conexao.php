<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contas";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexao com banco de dados: ". $conn->connect_error);
}
?>