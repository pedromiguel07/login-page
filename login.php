<?php

$localhost = 'localhost';
$user = 'root';
$pass = '';
$database = 'sp-con';

$conn = new mysqli($localhost, $user, $pass, $database);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login realizado com sucesso!";
        header('Location: index.html');
        exit();
    } else {
        echo "Usuário ou senha incorretos.";
    }
}

$conn->close();
?>