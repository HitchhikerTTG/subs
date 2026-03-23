<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AuthTokenModel;

class Auth extends BaseController
{
    // -------------------------------------------------------------------------
    // Formularz logowania
    // -------------------------------------------------------------------------

    public function index(): string
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('/kalkulator/profile')->send() ?: '';
        }

        return view('auth/login');
    }

    // -------------------------------------------------------------------------
    // Wysyłka magic linka
    // -------------------------------------------------------------------------

    public function send(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $email = trim($this->request->getPost('email') ?? '');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->to('/kalkulator')->with('error', 'Podaj prawidłowy adres email.');
        }

        $userModel  = new UserModel();
        $tokenModel = new AuthTokenModel();

        $user  = $userModel->findOrCreate($email);
        $token = $tokenModel->createForUser($user['id']);

        $sent = $this->sendMagicLink($email, $token);

        if (!$sent) {
            return redirect()->to('/kalkulator')->with('error', 'Nie udało się wysłać emaila. Spróbuj ponownie.');
        }

        return view('auth/sent', ['email' => $email]);
    }

    // -------------------------------------------------------------------------
    // Weryfikacja tokenu z maila
    // -------------------------------------------------------------------------

    public function verify(string $token): \CodeIgniter\HTTP\RedirectResponse
    {
        $tokenModel = new AuthTokenModel();
        $userModel  = new UserModel();

        $record = $tokenModel->findValid($token);

        if ($record === null) {
            return redirect()->to('/kalkulator')->with('error', 'Link wygasł lub został już użyty. Zaloguj się ponownie.');
        }

        $tokenModel->consume($record['id']);
        $userModel->touchLogin($record['user_id']);

        $user = $userModel->find($record['user_id']);

        $session = session();
        $session->regenerate(true);
        $session->set([
            'user_id'    => $user['id'],
            'user_email' => $user['email'],
            'logged_in'  => true,
        ]);

        return redirect()->to('/kalkulator/profile');
    }

    // -------------------------------------------------------------------------
    // Wylogowanie
    // -------------------------------------------------------------------------

    public function logout(): \CodeIgniter\HTTP\RedirectResponse
    {
        session()->destroy();
        return redirect()->to('/kalkulator');
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    private function isLoggedIn(): bool
    {
        return (bool) session()->get('logged_in');
    }

    private function sendMagicLink(string $to, string $token): bool
    {
        $baseUrl = rtrim(env('app.baseURL', base_url()), '/');
        $link    = $baseUrl . '/kalkulator/auth/' . $token;

        $email = \Config\Services::email();

        $email->setFrom(
            env('POSTMARK_FROM', env('email.fromEmail', 'noreply@subskrypcje.pl')),
            env('POSTMARK_FROM_NAME', 'Subskrypcje.pl')
        );
        $email->setTo($to);
        $email->setSubject('Twój link do logowania — Subskrypcje.pl');
        $email->setMessage($this->magicLinkBody($link));
        $email->setAltMessage($this->magicLinkText($link));

        return $email->send(false); // false = nie wyrzucaj wyjątku
    }

    private function magicLinkBody(string $link): string
    {
        return <<<HTML
        <!DOCTYPE html>
        <html lang="pl">
        <head><meta charset="utf-8"></head>
        <body style="font-family:sans-serif;max-width:520px;margin:2em auto;color:#222">
          <h2 style="font-size:1.1em;font-weight:600">Zaloguj się do Kalkulatora Subskrypcji</h2>
          <p>Kliknij przycisk poniżej, żeby się zalogować. Link jest ważny przez <strong>15 minut</strong>.</p>
          <p style="margin:2em 0">
            <a href="{$link}"
               style="background:#1a1a1a;color:#fff;padding:.75em 1.5em;border-radius:4px;text-decoration:none;font-size:.95em">
              Zaloguj się
            </a>
          </p>
          <p style="font-size:.85em;color:#666">Jeśli nie prosiłeś/aś o ten link, możesz go zignorować.</p>
          <hr style="border:none;border-top:1px solid #eee;margin:2em 0">
          <p style="font-size:.8em;color:#999">
            Nie możesz kliknąć przycisku? Skopiuj i wklej ten adres w przeglądarce:<br>
            <span style="color:#555">{$link}</span>
          </p>
        </body>
        </html>
        HTML;
    }

    private function magicLinkText(string $link): string
    {
        return "Zaloguj się do Kalkulatora Subskrypcji\n\n"
             . "Kliknij lub skopiuj link (ważny 15 minut):\n{$link}\n\n"
             . "Jeśli nie prosiłeś/aś o ten link, zignoruj tę wiadomość.";
    }
}
