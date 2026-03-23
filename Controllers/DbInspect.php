<?php

namespace App\Controllers;

class DbInspect extends BaseController
{
    public function index(string $token): string
    {
        if ($token !== env('MIGRATE_TOKEN')) {
            return $this->response->setStatusCode(403)->setBody('403 Forbidden')->send() ?? '';
        }

        $db     = \Config\Database::connect();
        $tables = $db->listTables();
        $data   = [];

        foreach ($tables as $table) {
            $columns = $db->query("SHOW COLUMNS FROM `{$table}`")->getResultArray();
            $count   = $db->query("SELECT COUNT(*) AS n FROM `{$table}`")->getRow()->n;
            $rows    = $db->query("SELECT * FROM `{$table}` LIMIT 50")->getResultArray();

            $data[$table] = compact('columns', 'count', 'rows');
        }

        return view('dbinspect/index', ['tables' => $data]);
    }
}
