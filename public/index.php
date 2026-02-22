<?php
require __DIR__ . '/../vendor/autoload.php';

// Charge les variables d'environnement depuis .env (si present)
$envPath = __DIR__ . '/../.env';
if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) {
            continue;
        }

        [$name, $value] = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if ($name !== '' && getenv($name) === false) {
            putenv($name . '=' . $value);
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

$routes = require __DIR__ . '/../routes/wed.php';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$uri = $uri !== '/' ? rtrim($uri, '/') : '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$routeKey = strtoupper($method) . ' ' . $uri;

if (isset($routes[$routeKey]) && is_callable($routes[$routeKey])) {
    try {
        $response = $routes[$routeKey]();
        if (is_string($response)) {
            echo $response;
        }
    } catch (\Throwable $e) {
        http_response_code(500);
        echo 'Erreur serveur: ' . htmlspecialchars($e->getMessage());
    }
    return;
}

http_response_code(404);
echo "404 - Page non trouvee";
