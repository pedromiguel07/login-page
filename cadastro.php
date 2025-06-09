<?php

$localhost = 'localhost';
$user = 'root';
$pass = '';
$database = 'sp-con';

$conn = new mysqli($localhost, $user, $pass, $database);

if($conn -> connect_error){
    die('Connection failed:' . $conn -> connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration completed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn -> close();
?>