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

header('Content-Type: text/plain; charset=utf-8');

echo "=== Katalog CI4: {$root} ===\n";
echo "PHP_BINARY: " . PHP_BINARY . "\n";
echo "PHP: " . phpversion() . "\n\n";

// Sprawdź dostępne funkcje do wykonywania poleceń
$hasPopen    = function_exists('popen')      && !in_array('popen',      explode(',', ini_get('disable_functions')));
$hasExec     = function_exists('exec')       && !in_array('exec',       explode(',', ini_get('disable_functions')));
$hasShellExec= function_exists('shell_exec') && !in_array('shell_exec', explode(',', ini_get('disable_functions')));
$hasPassthru = function_exists('passthru')   && !in_array('passthru',   explode(',', ini_get('disable_functions')));

echo "Dostępne funkcje: "
    . ($hasPopen     ? "popen " : "")
    . ($hasExec      ? "exec " : "")
    . ($hasShellExec ? "shell_exec " : "")
    . ($hasPassthru  ? "passthru " : "")
    . "\n\n";

// Funkcja uruchamiająca polecenie przez najlepszą dostępną metodę
function runCmd(string $cmd): string
{
    global $hasPopen, $hasExec, $hasShellExec, $hasPassthru;

    if ($hasPopen) {
        $handle = popen($cmd, 'r');
        $output = '';
        while (!feof($handle)) {
            $output .= fread($handle, 4096);
        }
        pclose($handle);
        return $output;
    }

    if ($hasExec) {
        exec($cmd, $lines, $code);
        return implode("\n", $lines) . "\n(exit code: {$code})";
    }

    if ($hasShellExec) {
        return (string) shell_exec($cmd);
    }

    if ($hasPassthru) {
        ob_start();
        passthru($cmd);
        return ob_get_clean();
    }

    return "[BŁĄD] Żadna funkcja do wykonywania poleceń nie jest dostępna (safe_mode lub disable_functions).\n"
         . "disable_functions: " . ini_get('disable_functions') . "\n";
}

$php = PHP_BINARY ?: 'php';
$cd  = "cd " . escapeshellarg($root);

// Migracje
echo "--- php spark migrate ---\n";
echo runCmd("{$cd} && " . escapeshellarg($php) . " spark migrate --force 2>&1");
echo "\n";

// Seeder
echo "--- php spark db:seed ServicesSeeder ---\n";
echo runCmd("{$cd} && " . escapeshellarg($php) . " spark db:seed ServicesSeeder 2>&1");
echo "\n";

// Status migracji
echo "--- php spark migrate:status ---\n";
echo runCmd("{$cd} && " . escapeshellarg($php) . " spark migrate:status 2>&1");
echo "\n";

echo "=== GOTOWE. Usuń teraz plik migrate.php z serwera! ===\n";
