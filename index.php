<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");


// Obtém apenas o caminho da URL acessada.
// Exemplo: se acessar /api/dogs/1, o valor será "/api/dogs/1"
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// ------------------------------
// ROTA: /api/dogs
// ------------------------------
// Se o usuário acessar exatamente "/api/dogs",
// então carregamos o arquivo que lista todos os cães.
if ($path === '/api/dogs') {
    require __DIR__ . '/dogs/getAll.php';
    exit; // encerra o script aqui
}

// ------------------------------
// ROTA: /api/dogs/{id}
// ------------------------------
// Aqui verificamos se a URL segue o padrão "/api/dogs/algum-numero"
if (preg_match('#^/api/dog/(\d+)$#', $path, $matches)) {

    // O número capturado na URL (ex: 1) é colocado em $_GET['id']
    $_GET['id'] = $matches[1];

    // Carrega o arquivo que busca um cão pelo ID
    require __DIR__ . '/dogs/getById.php';
    exit;
}

// Se nenhuma rota acima for encontrada, retornamos erro em JSON
header('Content-Type: application/json');
echo json_encode(["error" => "Rota não encontrada"]);
