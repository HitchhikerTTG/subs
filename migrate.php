<?php
/**
 * Tymczasowy skrypt do uruchamiania migracji przez przeglądarkę.
 * WAŻNE: Usuń ten plik natychmiast po użyciu!
 *
 * Użycie: https://twoja-domena.pl/migrate.php?token=ZMIEN_TEN_TOKEN
 */

define('SECRET_TOKEN', 'ZMIEN_TEN_TOKEN');

// Weryfikacja tokenu
if (!isset($_GET['token']) || $_GET['token'] !== SECRET_TOKEN) {
    http_response_code(403);
    die('Brak dostępu. Podaj ?token=...');
}

// Znajdź katalog główny CI4 (gdzie jest plik spark)
$root = __DIR__;
$sparkFile = null;

for ($i = 0; $i < 5; $i++) {
    if (file_exists($root . '/spark')) {
        $sparkFile = $root . '/spark';
        break;
    }
    $root = dirname($root);
}

if (!$sparkFile) {
    die('Nie znaleziono pliku spark. Umieść ten skrypt w folderze public/ aplikacji CI4.');
}

$php = PHP_BINARY ?: 'php';

header('Content-Type: text/plain; charset=utf-8');

echo "=== Katalog CI4: {$root} ===\n\n";

// Migracje
echo "--- php spark migrate ---\n";
$output = shell_exec("cd " . escapeshellarg($root) . " && " . escapeshellarg($php) . " spark migrate --force 2>&1");
echo $output . "\n";

// Seeder (uruchamia się tylko jeśli tabela services jest pusta)
echo "--- php spark db:seed ServicesSeeder ---\n";
$output = shell_exec("cd " . escapeshellarg($root) . " && " . escapeshellarg($php) . " spark db:seed ServicesSeeder 2>&1");
echo $output . "\n";

// Status migracji
echo "--- php spark migrate:status ---\n";
$output = shell_exec("cd " . escapeshellarg($root) . " && " . escapeshellarg($php) . " spark migrate:status 2>&1");
echo $output . "\n";

echo "=== GOTOWE. Usuń teraz plik migrate.php z serwera! ===\n";
