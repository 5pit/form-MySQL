<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: pages/login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contas";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com banco de dados: " . $conn->connect_error);
}

$showModal = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if (!empty($nome) && !empty($email)) {
        $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";

        if ($conn->query($sql) === TRUE) {
            $showModal = true; 
        } else {
            $showModal = true;
        }
    } else {
        $showModal = true; 
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        .modal {
            display: <?php echo $showModal ? 'block' : 'none'; ?>;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .modal-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .modal-success {
            color: #4CAF50;
        }

        .modal-error {
            color: #f44336;
        }

        .modal-warning {
            color: #ff9800;
        }

        .modal-content p {
            margin: 0;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #593ef3;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    width: 50%;
    border-radius: 20px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
}

h2 { 
    text-align: center;
    color: #333;
}

form {
    margin-top: 20px;
}

input[type="text"] {
    width: 50%;
    text-align: center;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    background-color: white;
    color: black;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="password"] {
    width: 50%;
    text-align: center;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    background-color: white;
    color: black;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="logout"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #e44b4b;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #008CBA;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
}

button:hover {
    background-color: #0073a4
}

.button a {
    text-decoration: none;
    color: white;
}




    </style>
</head>
<body>
    <div class="modal" style="display: <?php echo $showModal ? 'block' : 'none'; ?>;">
        <div class="modal-content modal-success">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-icon">&#10003;</div>
            <p>Dados inseridos com sucesso!</p>
        </div>
    </div>

    <div class="modal" style="display: <?php echo $showModal ? 'block' : 'none'; ?>;">
        <div class="modal-content modal-error">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-icon">&#10060;</div>
            <p>Erro ao inserir os dados!</p>
    </div>
</div>

<div class="modal" style="display: <?php echo $showModal ? 'block' : 'none'; ?>;">
    <div class="modal-content modal-warning">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-icon">&#9888;</div>
        <p>Todos os campos devem ser preenchidos!</p>
    </div>
</div>

<div class="container">
    <h2>Formulário Exemplo</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="email" placeholder="E-mail">
        <input type="submit" value="Enviar">
    </form>
    <button class="button"><a href="/pages/tabela.php">Ver tabela</a></button>
</div>

<script>
    function closeModal() {
        document.querySelectorAll(".modal").forEach(modal => {
            modal.style.display = "none";
        });
    }
</script>
</body>
</html>