<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
                body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        #container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
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

    </style>
</head>
<body>

<div id="container">
    <h2>Registro</h2>
    <form id="registerForm" action="auth/processar_registro.php" method="post">
        <label for="username">Nome de usuário:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br>
        
        <input type="submit" value="Registrar">
    </form>
</div>

<div class="modal fade" id="registroModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Conta Criada</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Sua conta foi criada com sucesso!</p>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    <?php
    if(isset($_GET['registro']) && $_GET['registro'] == 'sucesso'){ ?>
        $("#registroModal").modal('show');
    <?php } ?>
});
</script>

</body>
</html>
