<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

/**
 * Kontroler do uruchamiania migracji i seedera przez przeglądarkę.
 * Chroniony tokenem z .env (MIGRATE_TOKEN).
 *
 * Użycie:
 *   GET /migrate/{token}          — uruchom migracje
 *   GET /migrate/{token}/seed     — uruchom migracje + seeder
 *   GET /migrate/{token}/rollback — cofnij wszystkie migracje (UWAGA: usuwa dane)
 *   GET /migrate/{token}/status   — pokaż stan migracji
 */
class Migrate extends Controller
{
    private string $token;

    public function __construct()
    {
        $this->token = env('MIGRATE_TOKEN', '');
    }

    // -------------------------------------------------------------------------

    public function run(string $token): string
    {
        $this->guard($token);
        $log = $this->runMigrations();
        return $this->html('Migracje', $log);
    }

    public function seed(string $token): string
    {
        $this->guard($token);
        $log = $this->runMigrations();
        $log = array_merge($log, $this->runSeeder());
        return $this->html('Migracje + Seeder', $log);
    }

    public function rollback(string $token): string
    {
        $this->guard($token);
        $log = $this->runRollback();
        return $this->html('Rollback', $log);
    }

    public function status(string $token): string
    {
        $this->guard($token);
        $log = $this->getStatus();
        return $this->html('Status migracji', $log);
    }

    // -------------------------------------------------------------------------

    private function guard(string $token): void
    {
        if ($this->token === '') {
            $this->abort('Ustaw MIGRATE_TOKEN w pliku .env przed użyciem tego kontrolera.');
        }
        if (!hash_equals($this->token, $token)) {
            $this->abort('Nieprawidłowy token.');
        }
    }

    private function runMigrations(): array
    {
        $migrate = \Config\Services::migrations();
        $log     = [];

        try {
            $migrate->latest();
            $log[] = ['ok', 'Migracje wykonane pomyślnie.'];
        } catch (\Throwable $e) {
            $log[] = ['err', 'Błąd migracji: ' . $e->getMessage()];
        }

        return $log;
    }

    private function runRollback(): array
    {
        $migrate = \Config\Services::migrations();
        $log     = [];

        try {
            $migrate->regress(0);
            $log[] = ['ok', 'Rollback wykonany — wszystkie tabele usunięte.'];
        } catch (\Throwable $e) {
            $log[] = ['err', 'Błąd rollback: ' . $e->getMessage()];
        }

        return $log;
    }

    private function runSeeder(): array
    {
        $seeder = Database::seeder();
        $log    = [];

        try {
            $seeder->call('ServicesSeeder');
            $log[] = ['ok', 'ServicesSeeder wykonany pomyślnie.'];
        } catch (\Throwable $e) {
            $log[] = ['err', 'Błąd seedera: ' . $e->getMessage()];
        }

        return $log;
    }

    private function getStatus(): array
    {
        $migrate = \Config\Services::migrations();
        $log     = [];

        try {
            $history = $migrate->getHistory();
            if (empty($history)) {
                $log[] = ['info', 'Brak wykonanych migracji.'];
            } else {
                foreach ($history as $row) {
                    $log[] = ['ok', '[' . $row->batch . '] ' . $row->class . ' — ' . $row->time];
                }
            }
        } catch (\Throwable $e) {
            $log[] = ['err', 'Błąd pobierania statusu: ' . $e->getMessage()];
        }

        return $log;
    }

    // -------------------------------------------------------------------------

    private function abort(string $message): never
    {
        echo $this->html('Błąd', [['err', $message]]);
        exit;
    }

    private function html(string $title, array $log): string
    {
        $rows = '';
        foreach ($log as [$type, $msg]) {
            $color = match ($type) {
                'ok'   => '#2d6a2d',
                'err'  => '#8b0000',
                default => '#444',
            };
            $icon = match ($type) {
                'ok'   => '✓',
                'err'  => '✗',
                default => '·',
            };
            $rows .= sprintf(
                '<p style="margin:.4em 0;color:%s"><strong>%s</strong> %s</p>',
                $color,
                htmlspecialchars($icon),
                htmlspecialchars($msg)
            );
        }

        return <<<HTML
        <!DOCTYPE html>
        <html lang="pl">
        <head>
            <meta charset="utf-8">
            <title>Migracje — {$title}</title>
            <style>
                body { font-family: monospace; max-width: 800px; margin: 3em auto; padding: 0 1em; background: #f9f9f9; }
                h1   { font-size: 1.2em; border-bottom: 1px solid #ccc; padding-bottom: .5em; }
                .box { background: #fff; border: 1px solid #ddd; border-radius: 4px; padding: 1.2em 1.5em; }
            </style>
        </head>
        <body>
            <h1>kalkulatorSubskrypcji &rsaquo; {$title}</h1>
            <div class="box">{$rows}</div>
        </body>
        </html>
        HTML;
    }
}
