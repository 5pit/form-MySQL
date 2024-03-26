<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "contas"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: /registro.php?registro=existe");
        exit();
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: /registro.php?registro=sucesso");
            exit();
        } else {
            header("Location: /registro.php?registro=erro");
            exit();
        }
    }
}

$conn->close();
?>
