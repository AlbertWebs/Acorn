<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('feedback')->insert([
            [
                'name' => 'Guy Hawkins',
                'position' => 'Co. Founder',
                'company' => 'Bexon Partners',
                'message' => "Working with Bexon has been a game-changer for our business. Their team's professionalism, attention to detail, and innovative solutions have helped us streamline operations and achieve our goals faster than we imagined. We truly feel like a valued partner.",
                'photo' => 'assets/images/testimonial/client-1.webp',
                'is_active' => true,
            ],
            [
                'name' => 'Ralph Edwards',
                'position' => 'Co. Founder',
                'company' => 'Visionary Group',
                'message' => "The results we’ve seen after partnering with Bexon are beyond our expectations. They not only understood our vision but also brought new ideas to the table that have taken our business to the next level. Their expertise and commitment to success make them a trusted ally.",
                'photo' => 'assets/images/testimonial/client-2.webp',
                'is_active' => true,
            ],
            [
                'name' => 'Devon Lane',
                'position' => 'Co. Founder',
                'company' => 'Growth Dynamics',
                'message' => "We’ve been working with Bexon for years, and they continue to deliver outstanding results. Their team is proactive, responsive, and always goes the extra mile to ensure our needs are met. They’ve become a key contributor to our growth and success.",
                'photo' => 'assets/images/testimonial/client-3.webp',
                'is_active' => true,
            ],
        ]);
    }
}
