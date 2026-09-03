<?php

// URL da API externa que queremos consultar
$url = "https://breeds-dogs-api-node.onrender.com/api/breeds-dogs";

// Criamos um array com os headers necessários.
// Aqui incluímos a API KEY que a API externa exige.
$headers = [
    "x-api-key: 4988b8203098eb4ddbeabac215934ce0"
];

// Inicializa o cURL, que é a ferramenta do PHP para fazer requisições HTTP
$ch = curl_init();

// Configurações da requisição
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false
]);

// Executa a requisição e guarda a resposta
$response = curl_exec($ch);

// Define que o retorno será JSON
header("Content-Type: application/json");

// Exibe a resposta da API externa
echo $response;
