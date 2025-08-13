<?php

// Definisikan direktori root aplikasi Anda
define('LARAVEL_START', microtime(true));

// Arahkan ke file bootstrap Laravel
require __DIR__.'/../vendor/autoload.php';

// Bootstrap aplikasi dan jalankan
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);