<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'url' => 'https://acorn.co.ke',
                'email' => 'info@acorn.co.ke',
                'mobile' => '+254712345678',
                'location' => 'Acorn House, Nairobi, Kenya',
                'facebook' => 'https://www.facebook.com/acorn',
                'instagram' => 'https://www.instagram.com/acorn',
                'tiktok' => 'https://www.tiktok.com/@acorn',
                'twitter' => 'https://twitter.com/acorn',
                'youtube' => 'https://www.youtube.com/@acorn',
                'linkedin' => 'https://www.linkedin.com/company/acorn',
                'tawkto' => 'https://tawk.to/chat/acorn',
                'whatsapp' => 'https://wa.me/254712345678',
                'map_iframe' => '<iframe src="https://maps.google.com/maps?q=Acorn%20House%20Nairobi&t=&z=13&ie=UTF8&iwloc=&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'logo' => 'uploads/settings/logo.png',
                'white_logo' => 'uploads/settings/logo-white.png',
                'favicon' => 'uploads/settings/favicon.png',
                'shape' => 'uploads/settings/shape.png',
            ]
        );
    }
}

