<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use isadora\geometria;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

// Rota para calcular área do retângulo
$app->post('/retangulo', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $base = (float)($data['base'] ?? 0);
    $altura = (float)($data['altura'] ?? 0);
    
    $geometria = new geometria();
    $area = $geometria->calcularAreaRetangulo($base, $altura);
    
    $response->getBody()->write(json_encode(['area' => $area]));
    return $response->withHeader('Content-Type', 'application/json');
});

// Rota para calcular área do triângulo
$app->post('/triangulo', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $base = (float)($data['base'] ?? 0);
    $altura = (float)($data['altura'] ?? 0);
    
    $geometria = new geometria();
    $area = $geometria->calcularAreaTriangulo($base, $altura);
    
    $response->getBody()->write(json_encode(['area' => $area]));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();