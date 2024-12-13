<?php

/* require __DIR__ . "/../public/index.php"; */
// Aktivera alla PHP-fel för att få detaljerade felmeddelanden
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Testa om rutter laddas korrekt genom att logga
file_put_contents('/tmp/laravel_log.txt', "Anrop till API startade\n", FILE_APPEND);

// Inkludera Laravel index.php filen
require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Kontrollera om routingen fungerar genom att logga
file_put_contents('/tmp/laravel_log.txt', "Laravel applikation startad\n", FILE_APPEND);

$response = $app->make(Illuminate\Contracts\Http\Kernel::class)
    ->handle(
        $request = Illuminate\Http\Request::capture()
    );

// Logga om routen inte fungerar
file_put_contents('/tmp/laravel_log.txt', "Anrop till rutt: " . $request->getRequestUri() . "\n", FILE_APPEND);

$response->send();
