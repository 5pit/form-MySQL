<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        #container {
            max-width: 400px;
            margin: 100px auto;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            background-color: #fff;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"]:hover,
        input[type="password"]:hover {
            border-color: #45a049;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .button {
            background-color: red;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        a {
            text-decoration: none;
            color: white;
        }

        button:hover {
            background-color: #e4605e;
        }

        /* Estilos para o modal */
        .modal {
            display: none;
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
            border: 1px solid #888;
            width: 80%;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
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
    </style>
</head>
<body>

<div id="container">
    <h2>Painel de Login</h2>
    <form action="auth/autenticar.php" method="post">
        <label for="username">Nome de usuário:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br>
        
        <input type="submit" value="Login">
        <button class="button"><a href="./registro.php">Criar Conta</a></button>
    </form>
</div>

<div id="modalErrorMessage" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Erro de Autenticação</h2>
        <p>Nome de usuário ou senha incorretos.</p>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById("modalErrorMessage").style.display = "block";
    }

    function closeModal() {
        document.getElementById("modalErrorMessage").style.display = "none";
    }

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $result->num_rows != 1) : ?>
        window.addEventListener("DOMContentLoaded", function() {
            openModal();
        });
    <?php endif; ?>
</script>

</body>
</html>
