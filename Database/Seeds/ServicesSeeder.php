<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');

        $services = [
            // ── STREAMING VIDEO ──────────────────────────────────────────
            [
                'data' => [
                    'name'        => 'Netflix',
                    'slug'        => 'netflix',
                    'category'    => 'streaming_video',
                    'website_url' => 'https://www.netflix.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Podstawowy',  'price' => '33.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                    ['name' => 'Standard',    'price' => '49.00', 'billing_cycle' => 'monthly', 'sort_order' => 2],
                    ['name' => 'Premium',     'price' => '67.00', 'billing_cycle' => 'monthly', 'sort_order' => 3],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Max',
                    'slug'        => 'max',
                    'category'    => 'streaming_video',
                    'website_url' => 'https://www.max.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Podstawowy', 'price' => '29.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                    ['name' => 'Standard',   'price' => '39.99', 'billing_cycle' => 'monthly', 'sort_order' => 2],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Disney+',
                    'slug'        => 'disney-plus',
                    'category'    => 'streaming_video',
                    'website_url' => 'https://www.disneyplus.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '34.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                    ['name' => 'Premium',  'price' => '59.99', 'billing_cycle' => 'monthly', 'sort_order' => 2],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Amazon Prime Video',
                    'slug'        => 'amazon-prime-video',
                    'category'    => 'streaming_video',
                    'website_url' => 'https://www.primevideo.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '10.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Apple TV+',
                    'slug'        => 'apple-tv-plus',
                    'category'    => 'streaming_video',
                    'website_url' => 'https://tv.apple.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '34.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'SkyShowtime',
                    'slug'        => 'skyshowtime',
                    'category'    => 'streaming_video',
                    'website_url' => 'https://www.skyshowtime.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '24.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Canal+ Online',
                    'slug'        => 'canal-plus-online',
                    'category'    => 'streaming_video',
                    'website_url' => 'https://www.canalplus.com/pl',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '29.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Polsat Box Go',
                    'slug'        => 'polsat-box-go',
                    'category'    => 'streaming_video',
                    'website_url' => 'https://polsatboxgo.pl',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '30.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Player.pl',
                    'slug'        => 'player-pl',
                    'category'    => 'streaming_video',
                    'website_url' => 'https://player.pl',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '19.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'CDA Premium',
                    'slug'        => 'cda-premium',
                    'category'    => 'streaming_video',
                    'website_url' => 'https://www.cda.pl',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '19.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Viaplay',
                    'slug'        => 'viaplay',
                    'category'    => 'streaming_video',
                    'website_url' => 'https://viaplay.com/pl',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '34.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],

            // ── STREAMING MUSIC ──────────────────────────────────────────
            [
                'data' => [
                    'name'        => 'Spotify',
                    'slug'        => 'spotify',
                    'category'    => 'streaming_music',
                    'website_url' => 'https://www.spotify.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Premium Individual', 'price' => '27.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'YouTube Premium',
                    'slug'        => 'youtube-premium',
                    'category'    => 'streaming_music',
                    'website_url' => 'https://www.youtube.com/premium',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Individual', 'price' => '25.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Apple Music',
                    'slug'        => 'apple-music',
                    'category'    => 'streaming_music',
                    'website_url' => 'https://music.apple.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Individual', 'price' => '23.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Tidal',
                    'slug'        => 'tidal',
                    'category'    => 'streaming_music',
                    'website_url' => 'https://tidal.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Individual', 'price' => '23.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Empik Go',
                    'slug'        => 'empik-go',
                    'category'    => 'streaming_music',
                    'website_url' => 'https://www.empikgo.pl',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '24.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],

            // ── GAMING KONSOLE/PC ─────────────────────────────────────────
            [
                'data' => [
                    'name'        => 'Xbox Game Pass',
                    'slug'        => 'xbox-game-pass',
                    'category'    => 'gaming_console',
                    'website_url' => 'https://www.xbox.com/pl-PL/xbox-game-pass',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'PC',      'price' => '40.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                    ['name' => 'Ultimate','price' => '54.99', 'billing_cycle' => 'monthly', 'sort_order' => 2],
                ],
            ],
            [
                'data' => [
                    'name'        => 'PlayStation Plus',
                    'slug'        => 'playstation-plus',
                    'category'    => 'gaming_console',
                    'website_url' => 'https://www.playstation.com/pl-pl/ps-plus',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Essential', 'price' => '39.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                    ['name' => 'Extra',     'price' => '59.99', 'billing_cycle' => 'monthly', 'sort_order' => 2],
                    ['name' => 'Premium',   'price' => '79.99', 'billing_cycle' => 'monthly', 'sort_order' => 3],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Nintendo Switch Online',
                    'slug'        => 'nintendo-switch-online',
                    'category'    => 'gaming_console',
                    'website_url' => 'https://www.nintendo.com/pl-pl/Nintendo-Switch-Online',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Individual',                         'price' =>  '9.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                    ['name' => 'Individual + Pakiet rozszerzeń',     'price' => '29.99', 'billing_cycle' => 'monthly', 'sort_order' => 2],
                ],
            ],
            [
                'data' => [
                    'name'        => 'EA Play',
                    'slug'        => 'ea-play',
                    'category'    => 'gaming_console',
                    'website_url' => 'https://www.ea.com/ea-play',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '19.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Ubisoft+',
                    'slug'        => 'ubisoft-plus',
                    'category'    => 'gaming_console',
                    'website_url' => 'https://www.ubisoft.com/pl-pl/ubisoft-plus',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '59.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],

            // ── GAMING MOBILNE ────────────────────────────────────────────
            [
                'data' => [
                    'name'        => 'Apple Arcade',
                    'slug'        => 'apple-arcade',
                    'category'    => 'gaming_mobile',
                    'website_url' => 'https://www.apple.com/apple-arcade',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '34.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Google Play Pass',
                    'slug'        => 'google-play-pass',
                    'category'    => 'gaming_mobile',
                    'website_url' => 'https://play.google.com/about/play-pass',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '14.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Netflix Games',
                    'slug'        => 'netflix-games',
                    'category'    => 'gaming_mobile',
                    'website_url' => 'https://www.netflix.com/pl/games',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Wliczone w Netflix', 'price' => '0.00', 'billing_cycle' => 'included', 'sort_order' => 1],
                ],
            ],

            // ── SOFTWARE / PRODUKTYWNOŚĆ ──────────────────────────────────
            [
                'data' => [
                    'name'        => 'Microsoft 365',
                    'slug'        => 'microsoft-365',
                    'category'    => 'software',
                    'website_url' => 'https://www.microsoft.com/pl-pl/microsoft-365',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Personal', 'price' => '37.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                    ['name' => 'Family',   'price' => '49.00', 'billing_cycle' => 'monthly', 'sort_order' => 2],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Adobe Creative Cloud',
                    'slug'        => 'adobe-creative-cloud',
                    'category'    => 'software',
                    'website_url' => 'https://www.adobe.com/pl/creativecloud.html',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Wszystkie aplikacje', 'price' => '299.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                    ['name' => 'Photoshop',           'price' => '119.00', 'billing_cycle' => 'monthly', 'sort_order' => 2],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Notion',
                    'slug'        => 'notion',
                    'category'    => 'software',
                    'website_url' => 'https://www.notion.so',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Plus', 'price' => '49.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Canva',
                    'slug'        => 'canva',
                    'category'    => 'software',
                    'website_url' => 'https://www.canva.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Pro', 'price' => '59.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => '1Password',
                    'slug'        => '1password',
                    'category'    => 'software',
                    'website_url' => 'https://1password.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Individual', 'price' => '34.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Todoist',
                    'slug'        => 'todoist',
                    'category'    => 'software',
                    'website_url' => 'https://todoist.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Pro', 'price' => '24.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],

            // ── CLOUD STORAGE ─────────────────────────────────────────────
            [
                'data' => [
                    'name'        => 'Google One',
                    'slug'        => 'google-one',
                    'category'    => 'cloud_storage',
                    'website_url' => 'https://one.google.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => '100 GB', 'price' =>  '9.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                    ['name' => '200 GB', 'price' => '14.99', 'billing_cycle' => 'monthly', 'sort_order' => 2],
                ],
            ],
            [
                'data' => [
                    'name'        => 'iCloud+',
                    'slug'        => 'icloud-plus',
                    'category'    => 'cloud_storage',
                    'website_url' => 'https://www.apple.com/icloud',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => '50 GB',  'price' =>  '4.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                    ['name' => '200 GB', 'price' => '14.99', 'billing_cycle' => 'monthly', 'sort_order' => 2],
                    ['name' => '2 TB',   'price' => '44.99', 'billing_cycle' => 'monthly', 'sort_order' => 3],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Apple One',
                    'slug'        => 'apple-one',
                    'category'    => 'cloud_storage',
                    'website_url' => 'https://www.apple.com/apple-one',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Individual', 'price' => '39.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],

            // ── AI ────────────────────────────────────────────────────────
            [
                'data' => [
                    'name'        => 'ChatGPT',
                    'slug'        => 'chatgpt',
                    'category'    => 'ai',
                    'website_url' => 'https://chat.openai.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Plus', 'price' => '99.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Claude',
                    'slug'        => 'claude',
                    'category'    => 'ai',
                    'website_url' => 'https://claude.ai',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Pro', 'price' => '99.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Midjourney',
                    'slug'        => 'midjourney',
                    'category'    => 'ai',
                    'website_url' => 'https://www.midjourney.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Basic', 'price' => '42.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Microsoft Copilot',
                    'slug'        => 'microsoft-copilot',
                    'category'    => 'ai',
                    'website_url' => 'https://copilot.microsoft.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Pro', 'price' => '89.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Perplexity',
                    'slug'        => 'perplexity',
                    'category'    => 'ai',
                    'website_url' => 'https://www.perplexity.ai',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Pro', 'price' => '79.00', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],

            // ── ZAKUPY / TRANSPORT ────────────────────────────────────────
            [
                'data' => [
                    'name'        => 'Allegro Smart',
                    'slug'        => 'allegro-smart',
                    'category'    => 'shopping',
                    'website_url' => 'https://allegro.pl/smart',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '11.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Amazon Prime',
                    'slug'        => 'amazon-prime',
                    'category'    => 'shopping',
                    'website_url' => 'https://www.amazon.pl/prime',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '14.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Uber One',
                    'slug'        => 'uber-one',
                    'category'    => 'transport',
                    'website_url' => 'https://www.uber.com/pl/pl/u/uber-one',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '29.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],

            // ── ZDROWIE / FITNESS / EDUKACJA ──────────────────────────────
            [
                'data' => [
                    'name'        => 'Strava',
                    'slug'        => 'strava',
                    'category'    => 'health_fitness',
                    'website_url' => 'https://www.strava.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Summit', 'price' => '29.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'MyFitnessPal',
                    'slug'        => 'myfitnesspal',
                    'category'    => 'health_fitness',
                    'website_url' => 'https://www.myfitnesspal.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Premium', 'price' => '39.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Calm',
                    'slug'        => 'calm',
                    'category'    => 'health_fitness',
                    'website_url' => 'https://www.calm.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Premium', 'price' => '49.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Headspace',
                    'slug'        => 'headspace',
                    'category'    => 'health_fitness',
                    'website_url' => 'https://www.headspace.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '54.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Duolingo',
                    'slug'        => 'duolingo',
                    'category'    => 'news_education',
                    'website_url' => 'https://www.duolingo.com',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Plus', 'price' => '24.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Storytel',
                    'slug'        => 'storytel',
                    'category'    => 'news_education',
                    'website_url' => 'https://www.storytel.com/pl',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '34.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
            [
                'data' => [
                    'name'        => 'Legimi',
                    'slug'        => 'legimi',
                    'category'    => 'news_education',
                    'website_url' => 'https://www.legimi.pl',
                    'verified'    => 1,
                    'active'      => 1,
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ],
                'plans' => [
                    ['name' => 'Standard', 'price' => '39.99', 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ],
            ],
        ];

        $plans = [];

        foreach ($services as $service) {
            $this->db->table('services')->insert($service['data']);
            $serviceId = $this->db->insertID();

            foreach ($service['plans'] as $plan) {
                $plans[] = [
                    'service_id'    => $serviceId,
                    'name'          => $plan['name'],
                    'price'         => $plan['price'],
                    'billing_cycle' => $plan['billing_cycle'],
                    'sort_order'    => $plan['sort_order'],
                    'active'        => 1,
                    'created_at'    => $now,
                    'updated_at'    => $now,
                ];
            }
        }

        $this->db->table('service_plans')->insertBatch($plans);
    }
}
