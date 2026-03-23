<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DB Inspect</title>
<style>
  *, *::before, *::after { box-sizing: border-box; }
  body { font: 13px/1.5 monospace; background: #0f0f0f; color: #d4d4d4; margin: 0; padding: 16px; }
  h1 { font-size: 15px; color: #fff; margin: 0 0 20px; }
  .toc { margin-bottom: 24px; display: flex; flex-wrap: wrap; gap: 8px; }
  .toc a { color: #7dd3fc; text-decoration: none; background: #1e1e2e; padding: 2px 8px; border-radius: 4px; font-size: 12px; }
  .toc a:hover { background: #2a2a3e; }
  .table-block { margin-bottom: 40px; }
  .table-header { display: flex; align-items: baseline; gap: 12px; margin-bottom: 8px; }
  .table-name { font-size: 14px; font-weight: bold; color: #e2e8f0; }
  .table-count { font-size: 11px; color: #6b7280; }
  table { border-collapse: collapse; width: 100%; margin-bottom: 12px; }
  thead th { background: #1e293b; color: #94a3b8; font-weight: normal; text-align: left;
             padding: 4px 10px; border-bottom: 1px solid #334155; font-size: 11px; }
  tbody td { padding: 3px 10px; border-bottom: 1px solid #1e293b; vertical-align: top; }
  tbody tr:hover td { background: #1a1a2e; }
  .schema-table td:first-child { color: #86efac; }
  .schema-table td:nth-child(2) { color: #fbbf24; }
  .schema-table td:nth-child(4) { color: #f87171; }
  .null-val { color: #4b5563; font-style: italic; }
  .long-val { max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: block; }
  .section-label { font-size: 11px; color: #475569; margin: 14px 0 4px; text-transform: uppercase; letter-spacing: .05em; }
  .empty { color: #4b5563; font-size: 12px; padding: 6px 0; }
</style>
</head>
<body>

<h1>DB Inspect &mdash; <?= date('Y-m-d H:i:s') ?></h1>

<div class="toc">
  <?php foreach (array_keys($tables) as $t): ?>
    <a href="#<?= $t ?>"><?= esc($t) ?> (<?= $tables[$t]['count'] ?>)</a>
  <?php endforeach ?>
</div>

<?php foreach ($tables as $tableName => $info): ?>
<div class="table-block" id="<?= $tableName ?>">

  <div class="table-header">
    <span class="table-name"><?= esc($tableName) ?></span>
    <span class="table-count"><?= $info['count'] ?> rows</span>
  </div>

  <div class="section-label">schema</div>
  <table class="schema-table">
    <thead>
      <tr>
        <th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($info['columns'] as $col): ?>
      <tr>
        <td><?= esc($col['Field']) ?></td>
        <td><?= esc($col['Type']) ?></td>
        <td><?= $col['Null'] === 'YES' ? '<span class="null-val">YES</span>' : 'NO' ?></td>
        <td><?= esc($col['Key'] ?? '') ?></td>
        <td><?= $col['Default'] !== null ? esc($col['Default']) : '<span class="null-val">NULL</span>' ?></td>
        <td><?= esc($col['Extra'] ?? '') ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <?php if (empty($info['rows'])): ?>
    <div class="empty">(brak danych)</div>
  <?php else: ?>
    <div class="section-label">data (max 50)</div>
    <table>
      <thead>
        <tr>
          <?php foreach (array_keys($info['rows'][0]) as $col): ?>
            <th><?= esc($col) ?></th>
          <?php endforeach ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($info['rows'] as $row): ?>
        <tr>
          <?php foreach ($row as $val): ?>
            <td>
              <?php if ($val === null): ?>
                <span class="null-val">NULL</span>
              <?php else: ?>
                <span class="long-val" title="<?= esc($val) ?>"><?= esc($val) ?></span>
              <?php endif ?>
            </td>
          <?php endforeach ?>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  <?php endif ?>

</div>
<?php endforeach ?>

</body>
</html>
