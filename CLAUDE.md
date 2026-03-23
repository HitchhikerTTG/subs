# CLAUDE.md — kalkulatorSubskrypcji
> Plik referencyjny dla Claude. Aktualizować po każdej iteracji.
> Ostatnia aktualizacja: 2026-03-23 | Iteracje ukończone: 1, 2

---

## PROJEKT

- **Cel:** panel zarządzania subskrypcjami cyfrowymi dla polskich użytkowników
- **URL:** `subskrypcje.pl/kalkulator`
- **Stack:** CI4.6.x / PHP 8.1+ / MySQL utf8mb4 / shared hosting
- **Deploy:** Working Copy (iPadOS) → GitHub (prywatne) → cPanel Git Version Control
- **Waluta:** tylko PLN (v2: EUR)

---

## STRUKTURA PLIKÓW (rzeczywista)

```
Controllers/
  Auth.php           ✅ iteracja 2
  BaseController.php ✅ stock CI4
  Home.php           ✅ stock CI4
  Migrate.php        ✅ iteracja 1 (browser-triggered, chroniony tokenem z .env)
  Profile.php        ❌ brakuje
  Services.php       ❌ brakuje
  Admin.php          ❌ brakuje

Models/
  UserModel.php      ✅ iteracja 2
  AuthTokenModel.php ✅ iteracja 2
  ServiceModel.php          ❌ brakuje
  ServicePlanModel.php      ❌ brakuje
  UserSubscriptionModel.php ❌ brakuje

Views/
  auth/login.php     ✅ iteracja 2
  auth/sent.php      ✅ iteracja 2
  profile/           ❌ brakuje
  services/          ❌ brakuje
  admin/             ❌ brakuje

Database/
  Migrations/        ✅ wszystkie 5 — iteracja 1
  Seeds/
    ServicesSeeder.php ✅ ~40 serwisów — iteracja 1

Config/Routes.php    ✅ routing zdefiniowany w całości, kontrolery jeszcze nie istnieją
```

---

## BAZA DANYCH

### Tabele (wszystkie migracje wgrane)

```sql
users
  id INT PK AI
  email VARCHAR(255) UNIQUE
  email_hash VARCHAR(64)          -- SHA-256(email), publiczny ID w URL
  last_login_at DATETIME NULL
  created_at, updated_at DATETIME

auth_tokens
  id INT PK AI
  user_id INT FK→users.id CASCADE
  token VARCHAR(128) UNIQUE       -- bin2hex(random_bytes(32)), 64 znaki
  expires_at DATETIME             -- created_at + 15 min
  used_at DATETIME NULL           -- NULL = nieużyty
  created_at DATETIME

services
  id INT PK AI
  name VARCHAR(150)
  slug VARCHAR(160) UNIQUE
  category ENUM(streaming_video, streaming_music, gaming_console,
                gaming_mobile, software, ai, cloud_storage,
                shopping, health_fitness, news_education, transport, other)
  logo_url VARCHAR(300) NULL
  website_url VARCHAR(300) NULL
  description TEXT NULL
  verified TINYINT(1) DEFAULT 0   -- 0=user-added, 1=admin-verified
  added_by_user_id INT NULL FK→users.id SET NULL
  active TINYINT(1) DEFAULT 1
  created_at, updated_at DATETIME

service_plans
  id INT PK AI
  service_id INT FK→services.id CASCADE
  name VARCHAR(100)
  price DECIMAL(8,2)
  billing_cycle ENUM(monthly, yearly, one_time, included) DEFAULT monthly
  description VARCHAR(300) NULL
  sort_order TINYINT UNSIGNED DEFAULT 0
  active TINYINT(1) DEFAULT 1
  created_at, updated_at DATETIME

user_subscriptions
  id INT PK AI
  user_id INT FK→users.id CASCADE
  plan_id INT NULL FK→service_plans.id SET NULL
  custom_name VARCHAR(150) NULL   -- wymagane gdy plan_id IS NULL
  custom_price DECIMAL(8,2) NULL  -- override ceny z planu
  billing_cycle ENUM(monthly, yearly, one_time, included) NULL  -- override
  status ENUM(active, trial, occasional, cancelled) DEFAULT active
  started_at DATE NULL
  created_at, updated_at DATETIME
```

### Reguła integralności (enforced w app, nie FK):
`plan_id IS NOT NULL` XOR `custom_name IS NOT NULL`

### Logika wyświetlanej ceny:
```
cena    = custom_price    ?? service_plans.price
cykl    = billing_cycle   ?? service_plans.billing_cycle
```

### Suma kalkulatora (tylko `active` + `occasional`):
- miesięczna: `SUM( IF(cykl=monthly, cena, cena/12) )`
- roczna: miesięczna × 12

---

## AUTH

- **Mechanizm:** magic link — email → token → sesja CI4 (server-side)
- **Token:** `bin2hex(random_bytes(32))` = 64 znaki hex, single-use, 15 min
- **Sesja:** `user_id`, `user_email`, `logged_in` (bool)
- **Email:** Postmark — konfiguracja przez `.env` (`POSTMARK_FROM`, `POSTMARK_FROM_NAME`)
- **Brak rozróżnienia** rejestracja/logowanie — `findOrCreate()` w UserModel

---

## ROUTING (Config/Routes.php — kompletny)

```
GET  /kalkulator                       → Auth::index
POST /kalkulator/login                 → Auth::send
GET  /kalkulator/auth/(:segment)       → Auth::verify/$1
GET  /kalkulator/logout                → Auth::logout

GET  /kalkulator/profile               → Profile::index     ❌
POST /kalkulator/profile/add           → Profile::add       ❌
POST /kalkulator/profile/update        → Profile::update    ❌
POST /kalkulator/profile/delete        → Profile::delete    ❌

GET  /kalkulator/api/services          → Services::search   ❌  (JSON autocomplete)
GET  /kalkulator/serwis/(:segment)     → Services::show/$1  ❌  (SEO landing)

GET  /kalkulator/admin                 → Admin::index       ❌
POST /kalkulator/admin/verify/(:num)   → Admin::verify/$1   ❌
POST /kalkulator/admin/merge/(:num)    → Admin::merge/$1    ❌

GET  /migrate/(:segment)               → Migrate::run/$1    ✅
GET  /migrate/(:segment)/seed          → Migrate::seed/$1   ✅
GET  /migrate/(:segment)/rollback      → Migrate::rollback  ✅
GET  /migrate/(:segment)/status        → Migrate::status    ✅
```

---

## DECYZJE PROJEKTOWE

| ID  | Decyzja |
|-----|---------|
| D-01 | Magic link zamiast hasła — brak wrażliwych danych, prostsze |
| D-02 | `services` + `service_plans` rozdzielone — 1 serwis = 1 SEO page = 1 agregat popularności |
| D-03 | `verified=0` widoczny w profilu usera od razu — admin moderuje w tle |
| D-04 | Autocomplete (live) + fuzzy match (submit) jako dwa poziomy deduplikacji |
| D-05 | Tylko PLN w MVP |
| D-06 | Sesja CI4 server-side, brak tracking cookies |

---

## STATUS ITERACJI

| # | Zakres | Status | Commit |
|---|--------|--------|--------|
| 1 | Migracje (5 tabel) + ServicesSeeder (~40 serwisów) | ✅ | `dccb8ce` |
| 2 | Auth: magic link, UserModel, AuthTokenModel, widoki login/sent | ✅ | `b1f4643` |
| 3 | ServiceModel, ServicePlanModel, Services::search (JSON), Services::show (SEO) | ❌ | — |
| 4 | UserSubscriptionModel, Profile::index/add/update/delete, widoki profilu | ❌ | — |
| 5 | Agregaty popularności (ile active/cancelled per serwis) | ❌ | — |
| 6 | Widok publiczny serwisu — strona SEO pod artykuły WP | ❌ | — |
| 7 | Admin: moderacja verified=0, merge duplikatów | ❌ | — |

---

## MVP vs v2

### MVP (iter 1–7): profil, baza serwisów, autocomplete, deduplikacja, kalkulator, statusy, popularność, strona serwisu, panel admina

### v2: alternatywy, bundle detection, eksport PDF/CSV, przypomnienia email, porównywarka planów, EUR, publiczny profil (hash URL)

---

## ZMIENNE .env (wymagane)

```
MIGRATE_TOKEN=         # token do /migrate/* (Migrate.php)
POSTMARK_FROM=         # adres nadawcy
POSTMARK_FROM_NAME=    # nazwa nadawcy
app.baseURL=           # https://subskrypcje.pl
database.default.*     # host/db/user/pass
```
