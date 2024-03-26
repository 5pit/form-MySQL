<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: pages/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    session_destroy();
    header("Location: pages/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulário</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <div class="container">
        <h2>Adicionar na Tabela</h2>

        <form action="pages/formulario.php" method="post">
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="email" placeholder="E-mail">
            <input type="submit" value="Enviar">
        </form>
        <button class="button"><a href="/pages/tabela.php">Historico</a></button>

        <form action="" method="post">
            <input type="submit" name="logout" value="Sair">
        </form>
    </div>
</body>
</html>
