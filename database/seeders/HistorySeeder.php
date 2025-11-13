<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\History;

class HistorySeeder extends Seeder
{
    public function run(): void
    {
        $histories = [
            [
                'year' => '2008',
                'step_number' => '01.',
                'title' => 'Founding and Early Years',
                'description' => 'Our mission is to empower businesses of all sizes to thrive in an ever-changing marketplace. We are committed to delivering exceptional value.',
                'image_one' => 'assets/images/history/history-1.webp',
                'image_two' => 'assets/images/history/history-2.webp',
                'order' => 1,
            ],
            [
                'year' => '2012',
                'step_number' => '02.',
                'title' => 'Expansion and Growth',
                'description' => 'We expanded our reach, building new partnerships and helping more clients grow sustainably.',
                'image_one' => 'assets/images/history/history-3.webp',
                'image_two' => 'assets/images/history/history-4.webp',
                'order' => 2,
            ],
            [
                'year' => '2016',
                'step_number' => '03.',
                'title' => 'Innovation and Industry Leadership',
                'description' => 'We embraced innovation and set new standards of excellence across our industry.',
                'image_one' => 'assets/images/history/history-5.webp',
                'image_two' => 'assets/images/history/history-6.webp',
                'order' => 3,
            ],
            [
                'year' => '2020',
                'step_number' => '04.',
                'title' => 'Global Expansion and Diversification',
                'description' => 'Our global presence grew, driven by diversification and digital transformation.',
                'image_one' => 'assets/images/history/history-7.webp',
                'image_two' => 'assets/images/history/history-8.webp',
                'order' => 4,
            ],
            [
                'year' => '2024',
                'step_number' => '05.',
                'title' => 'Looking Ahead',
                'description' => 'We continue to evolve, preparing for the future with bold strategies and a commitment to excellence.',
                'image_one' => 'assets/images/history/history-9.webp',
                'image_two' => 'assets/images/history/history-10.webp',
                'order' => 5,
            ],
        ];

        foreach ($histories as $history) {
            History::create($history);
        }
    }
}
