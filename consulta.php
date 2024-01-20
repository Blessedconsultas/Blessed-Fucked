<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Substitua isso pela lógica real para verificar se o usuário está autenticado
    // ou implemente sua lógica de sessão
    if (!isset($_SESSION['username'])) {
        echo json_encode(["error" => "Usuário não autenticado"]);
        exit;
    }

    // Substitua pelo seu código real de consulta à API
    // Exemplo: consultando por CPF
    $cpf = $_POST["cpf"];
    $token = '387a4560-4566-4f75-af1b-555c177a4fa3';  // Substitua pelo seu token válido

    $apiUrl = "https://worldata.online/api?token=$token&type=cpf3&query=$cpf";
    
    // Configurando a requisição POST
    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
        ]
    ];
    $context  = stream_context_create($options);
    $response = file_get_contents($apiUrl, false, $context);

    $data = json_decode($response, true);

    echo json_encode($data);
}
?>
