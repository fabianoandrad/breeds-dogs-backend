<?php

// Verifica se o ID foi enviado pela rota
// Se não tiver ID, retorna erro
if (!isset($_GET['id'])) {
    echo json_encode(["error" => "ID não informado"]);
    exit;
}

// Captura o ID enviado pela rota
$id = $_GET['id'];

// Monta a URL da API externa usando o ID
$url = "https://breeds-dogs-api-node.onrender.com/api/breed/$id";

// Headers com API KEY
$headers = [
    "x-api-key: 4988b8203098eb4ddbeabac215934ce0"
];

// Inicializa o cURL
$ch = curl_init();

// Configurações da requisição
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false
]);

// Executa a requisição
$response = curl_exec($ch);

// Define o retorno como JSON
header("Content-Type: application/json");

// Exibe o resultado
echo $response;
