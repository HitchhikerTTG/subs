<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sprawdź skrzynkę — Kalkulator Subskrypcji</title>
  <style>
    *, *::before, *::after { box-sizing: border-box; }
    body {
      font-family: system-ui, -apple-system, sans-serif;
      background: #f5f5f5;
      margin: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }
    .card {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 1px 4px rgba(0,0,0,.1);
      padding: 2.5rem 2rem;
      width: 100%;
      max-width: 400px;
      text-align: center;
    }
    .icon { font-size: 2.5rem; margin-bottom: 1rem; }
    h1 { font-size: 1.25rem; margin: 0 0 .6rem; }
    p { color: #555; font-size: .92rem; margin: 0 0 .8rem; line-height: 1.5; }
    .email { font-weight: 600; color: #1a1a1a; }
    .note { font-size: .82rem; color: #888; margin-top: 1.5rem; }
    a { color: #1a1a1a; }
  </style>
</head>
<body>
  <div class="card">
    <div class="icon">📬</div>
    <h1>Sprawdź skrzynkę</h1>
    <p>Wysłaliśmy link do logowania na adres:</p>
    <p class="email"><?= esc($email) ?></p>
    <p>Link jest ważny przez <strong>15 minut</strong>. Sprawdź też folder spam.</p>
    <p class="note">
      Zły adres? <a href="/kalkulator">Wróć i wpisz ponownie.</a>
    </p>
  </div>
</body>
</html>
