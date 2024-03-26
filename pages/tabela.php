<!DOCTYPE html>
<head>
    <title>Tabela</title>

    <style>

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }




    </style>
</head>
<body>
    <h2>Dados do Banco de Dados</h2>

    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>

    <?php

    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: /pages/login.php");
    exit();
    }
    
    include 'conexao.php';

    $sql = "SELECT nome, email FROM usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["nome"] . "</td><td>". $row["email"] . "</td></tr>";
    } 
    } else {
            echo "<tr><td colspan='2'>Nenhum dado foi encontrado.</td></tr>";
    }
    
    $conn->close();
    ?>
    </table>


</body>
</html>