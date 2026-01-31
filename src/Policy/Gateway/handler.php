<?php
// Ten plik będzie celem symlinka
$autoload = __DIR__ . '/../../../../../vendor/autoload.php';
if (file_exists($autoload)) require_once $autoload;

$config = require __DIR__ . '/../../../../config/silo_cookies.php';
$service = new \Silo\Policy\Cookies\CookieService();

header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);

echo json_encode($service->handleConsent($input, $config['auth_token']));
