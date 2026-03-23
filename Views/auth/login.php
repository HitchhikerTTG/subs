<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Logowanie — Kalkulator Subskrypcji</title>
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
    }
    h1 { font-size: 1.25rem; margin: 0 0 .4rem; }
    p.sub { color: #666; font-size: .9rem; margin: 0 0 1.8rem; }
    label { display: block; font-size: .85rem; font-weight: 600; margin-bottom: .4rem; }
    input[type="email"] {
      width: 100%;
      padding: .65rem .8rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1rem;
      outline: none;
      transition: border-color .15s;
    }
    input[type="email"]:focus { border-color: #1a1a1a; }
    button {
      display: block;
      width: 100%;
      margin-top: 1rem;
      padding: .7rem;
      background: #1a1a1a;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
    }
    button:hover { background: #333; }
    .error {
      background: #fff0f0;
      border: 1px solid #f5c6c6;
      color: #8b0000;
      border-radius: 5px;
      padding: .65rem .8rem;
      font-size: .88rem;
      margin-bottom: 1rem;
    }
    .note { font-size: .8rem; color: #888; margin-top: 1.2rem; text-align: center; }
  </style>
</head>
<body>
  <div class="card">
    <h1>Kalkulator Subskrypcji</h1>
    <p class="sub">Podaj swój email — wyślemy Ci link do logowania.</p>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="error"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif ?>

    <form action="/kalkulator/login" method="post">
      <?= csrf_field() ?>
      <label for="email">Adres email</label>
      <input type="email" id="email" name="email" placeholder="jan@kowalski.pl"
             autocomplete="email" autofocus required>
      <button type="submit">Wyślij link logowania</button>
    </form>

    <p class="note">Nie musisz zakładać konta. Wystarczy email.</p>
  </div>
</body>
</html>
