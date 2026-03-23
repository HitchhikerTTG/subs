<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');

        $services = [
            // streaming_video
            ['name' => 'Netflix',         'slug' => 'netflix',         'category' => 'streaming_video',  'website_url' => 'https://netflix.com'],
            ['name' => 'Disney+',         'slug' => 'disney-plus',     'category' => 'streaming_video',  'website_url' => 'https://disneyplus.com'],
            ['name' => 'HBO Max',         'slug' => 'hbo-max',         'category' => 'streaming_video',  'website_url' => 'https://max.com'],
            ['name' => 'Amazon Prime Video', 'slug' => 'amazon-prime-video', 'category' => 'streaming_video', 'website_url' => 'https://primevideo.com'],
            ['name' => 'Apple TV+',       'slug' => 'apple-tv-plus',   'category' => 'streaming_video',  'website_url' => 'https://tv.apple.com'],
            ['name' => 'Canal+',          'slug' => 'canal-plus',      'category' => 'streaming_video',  'website_url' => 'https://canalplus.com/pl'],
            ['name' => 'Player',          'slug' => 'player',          'category' => 'streaming_video',  'website_url' => 'https://player.pl'],
            ['name' => 'Polsat Box Go',   'slug' => 'polsat-box-go',   'category' => 'streaming_video',  'website_url' => 'https://polsatboxgo.pl'],

            // streaming_music
            ['name' => 'Spotify',         'slug' => 'spotify',         'category' => 'streaming_music',  'website_url' => 'https://spotify.com'],
            ['name' => 'Apple Music',     'slug' => 'apple-music',     'category' => 'streaming_music',  'website_url' => 'https://music.apple.com'],
            ['name' => 'YouTube Premium', 'slug' => 'youtube-premium', 'category' => 'streaming_music',  'website_url' => 'https://youtube.com/premium'],
            ['name' => 'Tidal',           'slug' => 'tidal',           'category' => 'streaming_music',  'website_url' => 'https://tidal.com'],

            // gaming_console
            ['name' => 'Xbox Game Pass Ultimate', 'slug' => 'xbox-game-pass-ultimate', 'category' => 'gaming_console', 'website_url' => 'https://xbox.com/pl-PL/xbox-game-pass'],
            ['name' => 'PlayStation Plus',        'slug' => 'playstation-plus',        'category' => 'gaming_console', 'website_url' => 'https://playstation.com/pl-pl/ps-plus'],
            ['name' => 'Nintendo Switch Online',  'slug' => 'nintendo-switch-online',  'category' => 'gaming_console', 'website_url' => 'https://nintendo.com/pl-pl/switch/online'],
            ['name' => 'EA Play',                 'slug' => 'ea-play',                 'category' => 'gaming_console', 'website_url' => 'https://ea.com/ea-play'],

            // gaming_mobile
            ['name' => 'Apple Arcade',    'slug' => 'apple-arcade',    'category' => 'gaming_mobile',    'website_url' => 'https://apple.com/pl/apple-arcade'],
            ['name' => 'Google Play Pass','slug' => 'google-play-pass', 'category' => 'gaming_mobile',   'website_url' => 'https://play.google.com/intl/pl/about/play-pass'],

            // software
            ['name' => 'Adobe Creative Cloud', 'slug' => 'adobe-creative-cloud', 'category' => 'software', 'website_url' => 'https://adobe.com/pl/creativecloud'],
            ['name' => 'Microsoft 365',        'slug' => 'microsoft-365',        'category' => 'software', 'website_url' => 'https://microsoft.com/pl-pl/microsoft-365'],
            ['name' => 'Notion',               'slug' => 'notion',               'category' => 'software', 'website_url' => 'https://notion.so'],
            ['name' => 'Canva Pro',            'slug' => 'canva-pro',            'category' => 'software', 'website_url' => 'https://canva.com'],
            ['name' => 'NordVPN',              'slug' => 'nordvpn',              'category' => 'software', 'website_url' => 'https://nordvpn.com/pl'],

            // ai
            ['name' => 'ChatGPT Plus',   'slug' => 'chatgpt-plus',   'category' => 'ai', 'website_url' => 'https://chat.openai.com'],
            ['name' => 'Claude Pro',     'slug' => 'claude-pro',     'category' => 'ai', 'website_url' => 'https://claude.ai'],
            ['name' => 'Midjourney',     'slug' => 'midjourney',     'category' => 'ai', 'website_url' => 'https://midjourney.com'],
            ['name' => 'GitHub Copilot', 'slug' => 'github-copilot', 'category' => 'ai', 'website_url' => 'https://github.com/features/copilot'],
            ['name' => 'Perplexity Pro', 'slug' => 'perplexity-pro', 'category' => 'ai', 'website_url' => 'https://perplexity.ai'],

            // cloud_storage
            ['name' => 'Google One',    'slug' => 'google-one',    'category' => 'cloud_storage', 'website_url' => 'https://one.google.com'],
            ['name' => 'iCloud+',       'slug' => 'icloud-plus',   'category' => 'cloud_storage', 'website_url' => 'https://apple.com/pl/icloud'],
            ['name' => 'Dropbox Plus',  'slug' => 'dropbox-plus',  'category' => 'cloud_storage', 'website_url' => 'https://dropbox.com/pl'],
            ['name' => 'OneDrive',      'slug' => 'onedrive',      'category' => 'cloud_storage', 'website_url' => 'https://microsoft.com/pl-pl/microsoft-365/onedrive'],

            // shopping
            ['name' => 'Amazon Prime',  'slug' => 'amazon-prime',  'category' => 'shopping', 'website_url' => 'https://amazon.pl'],
            ['name' => 'Empik Premium', 'slug' => 'empik-premium', 'category' => 'shopping', 'website_url' => 'https://empik.com/empik-premium'],
            ['name' => 'InPost Pay',    'slug' => 'inpost-pay',    'category' => 'shopping', 'website_url' => 'https://inpost.pl'],

            // health_fitness
            ['name' => 'Fitatu Premium', 'slug' => 'fitatu-premium', 'category' => 'health_fitness', 'website_url' => 'https://fitatu.com'],
            ['name' => 'Headspace',      'slug' => 'headspace',      'category' => 'health_fitness', 'website_url' => 'https://headspace.com'],

            // news_education
            ['name' => 'Wyborcza.pl',    'slug' => 'wyborcza',       'category' => 'news_education', 'website_url' => 'https://wyborcza.pl'],
            ['name' => 'Duolingo Plus',  'slug' => 'duolingo-plus',  'category' => 'news_education', 'website_url' => 'https://duolingo.com'],
            ['name' => 'Audioteka Club', 'slug' => 'audioteka-club', 'category' => 'news_education', 'website_url' => 'https://audioteka.com'],

            // transport
            ['name' => 'Bolt Business', 'slug' => 'bolt-business',  'category' => 'transport', 'website_url' => 'https://bolt.eu'],
        ];

        $plans = [
            'netflix' => [
                ['name' => 'Standard z reklamami', 'price' => 29.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Standard',             'price' => 43.00,  'billing_cycle' => 'monthly', 'sort_order' => 2],
                ['name' => 'Premium',              'price' => 65.00,  'billing_cycle' => 'monthly', 'sort_order' => 3],
            ],
            'disney-plus' => [
                ['name' => 'Standard',             'price' => 28.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Premium',              'price' => 37.99,  'billing_cycle' => 'monthly', 'sort_order' => 2],
            ],
            'hbo-max' => [
                ['name' => 'Basic z reklamami',    'price' => 24.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Standard',             'price' => 34.99,  'billing_cycle' => 'monthly', 'sort_order' => 2],
                ['name' => 'Premium',              'price' => 44.99,  'billing_cycle' => 'monthly', 'sort_order' => 3],
            ],
            'amazon-prime-video' => [
                ['name' => 'Prime Video',          'price' => 25.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'apple-tv-plus' => [
                ['name' => 'Apple TV+',            'price' => 37.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'canal-plus' => [
                ['name' => 'CANAL+ Online',        'price' => 45.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'CANAL+ Online + Sport', 'price' => 75.00, 'billing_cycle' => 'monthly', 'sort_order' => 2],
            ],
            'player' => [
                ['name' => 'Player One',           'price' => 30.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'polsat-box-go' => [
                ['name' => 'Go Standard',          'price' => 29.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Go Sport',             'price' => 49.00,  'billing_cycle' => 'monthly', 'sort_order' => 2],
            ],
            'spotify' => [
                ['name' => 'Individual',           'price' => 23.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Duo',                  'price' => 31.99,  'billing_cycle' => 'monthly', 'sort_order' => 2],
                ['name' => 'Family',               'price' => 34.99,  'billing_cycle' => 'monthly', 'sort_order' => 3],
                ['name' => 'Student',              'price' => 11.99,  'billing_cycle' => 'monthly', 'sort_order' => 4],
            ],
            'apple-music' => [
                ['name' => 'Individual',           'price' => 23.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Family',               'price' => 37.99,  'billing_cycle' => 'monthly', 'sort_order' => 2],
                ['name' => 'Student',              'price' => 11.99,  'billing_cycle' => 'monthly', 'sort_order' => 3],
            ],
            'youtube-premium' => [
                ['name' => 'Individual',           'price' => 29.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Family',               'price' => 44.99,  'billing_cycle' => 'monthly', 'sort_order' => 2],
            ],
            'tidal' => [
                ['name' => 'HiFi',                 'price' => 24.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'HiFi Plus',            'price' => 49.99,  'billing_cycle' => 'monthly', 'sort_order' => 2],
            ],
            'xbox-game-pass-ultimate' => [
                ['name' => 'Game Pass Ultimate',   'price' => 54.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'playstation-plus' => [
                ['name' => 'Essential',            'price' => 36.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Extra',                'price' => 53.99,  'billing_cycle' => 'monthly', 'sort_order' => 2],
                ['name' => 'Premium',              'price' => 62.99,  'billing_cycle' => 'monthly', 'sort_order' => 3],
            ],
            'nintendo-switch-online' => [
                ['name' => 'Individual (rok)',     'price' => 79.90,  'billing_cycle' => 'yearly',  'sort_order' => 1],
                ['name' => 'Family (rok)',         'price' => 139.90, 'billing_cycle' => 'yearly',  'sort_order' => 2],
            ],
            'ea-play' => [
                ['name' => 'EA Play',              'price' => 20.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'apple-arcade' => [
                ['name' => 'Apple Arcade',         'price' => 25.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'google-play-pass' => [
                ['name' => 'Google Play Pass',     'price' => 23.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'adobe-creative-cloud' => [
                ['name' => 'Wszystkie aplikacje',  'price' => 263.88, 'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Jedna aplikacja',      'price' => 131.94, 'billing_cycle' => 'monthly', 'sort_order' => 2],
            ],
            'microsoft-365' => [
                ['name' => 'Personal',             'price' => 37.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Family',               'price' => 54.00,  'billing_cycle' => 'monthly', 'sort_order' => 2],
            ],
            'notion' => [
                ['name' => 'Plus',                 'price' => 48.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Business',             'price' => 90.00,  'billing_cycle' => 'monthly', 'sort_order' => 2],
            ],
            'canva-pro' => [
                ['name' => 'Pro',                  'price' => 62.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'nordvpn' => [
                ['name' => 'Basic',                'price' => 57.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Plus',                 'price' => 70.00,  'billing_cycle' => 'monthly', 'sort_order' => 2],
            ],
            'chatgpt-plus' => [
                ['name' => 'Plus',                 'price' => 85.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'claude-pro' => [
                ['name' => 'Pro',                  'price' => 85.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'midjourney' => [
                ['name' => 'Basic',                'price' => 40.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Standard',             'price' => 100.00, 'billing_cycle' => 'monthly', 'sort_order' => 2],
                ['name' => 'Pro',                  'price' => 200.00, 'billing_cycle' => 'monthly', 'sort_order' => 3],
            ],
            'github-copilot' => [
                ['name' => 'Individual',           'price' => 42.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'perplexity-pro' => [
                ['name' => 'Pro',                  'price' => 85.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'google-one' => [
                ['name' => '100 GB',               'price' => 8.99,   'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => '200 GB',               'price' => 13.99,  'billing_cycle' => 'monthly', 'sort_order' => 2],
                ['name' => '2 TB',                 'price' => 44.99,  'billing_cycle' => 'monthly', 'sort_order' => 3],
            ],
            'icloud-plus' => [
                ['name' => '50 GB',                'price' => 3.99,   'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => '200 GB',               'price' => 11.99,  'billing_cycle' => 'monthly', 'sort_order' => 2],
                ['name' => '2 TB',                 'price' => 37.99,  'billing_cycle' => 'monthly', 'sort_order' => 3],
                ['name' => '6 TB',                 'price' => 109.99, 'billing_cycle' => 'monthly', 'sort_order' => 4],
            ],
            'dropbox-plus' => [
                ['name' => 'Plus',                 'price' => 61.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Professional',         'price' => 120.00, 'billing_cycle' => 'monthly', 'sort_order' => 2],
            ],
            'onedrive' => [
                ['name' => '100 GB',               'price' => 8.00,   'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'amazon-prime' => [
                ['name' => 'Prime',                'price' => 49.00,  'billing_cycle' => 'yearly',  'sort_order' => 1],
            ],
            'empik-premium' => [
                ['name' => 'Premium',              'price' => 9.99,   'billing_cycle' => 'monthly', 'sort_order' => 1],
                ['name' => 'Premium+ (rok)',       'price' => 99.00,  'billing_cycle' => 'yearly',  'sort_order' => 2],
            ],
            'inpost-pay' => [
                ['name' => 'InPost Pay',           'price' => 9.99,   'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'fitatu-premium' => [
                ['name' => 'Premium',              'price' => 19.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'headspace' => [
                ['name' => 'Premium',              'price' => 55.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'wyborcza' => [
                ['name' => 'Wyborcza+',            'price' => 25.00,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'duolingo-plus' => [
                ['name' => 'Super',                'price' => 24.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'audioteka-club' => [
                ['name' => 'Club',                 'price' => 39.99,  'billing_cycle' => 'monthly', 'sort_order' => 1],
            ],
            'bolt-business' => [
                ['name' => 'Business',             'price' => 0.00,   'billing_cycle' => 'included', 'sort_order' => 1, 'description' => 'Brak opłaty subskrypcyjnej'],
            ],
        ];

        foreach ($services as $service) {
            $serviceData = array_merge($service, [
                'verified'   => 1,
                'active'     => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $this->db->table('services')->insert($serviceData);
            $serviceId = $this->db->insertID();

            $slug = $service['slug'];
            if (isset($plans[$slug])) {
                foreach ($plans[$slug] as $plan) {
                    $this->db->table('service_plans')->insert(array_merge($plan, [
                        'service_id'  => $serviceId,
                        'active'      => 1,
                        'created_at'  => $now,
                        'updated_at'  => $now,
                    ]));
                }
            }
        }
    }
}
