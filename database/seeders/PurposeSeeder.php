<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purpose;

class PurposeSeeder extends Seeder
{
    public function run(): void
    {
        Purpose::create([
            'title' => 'Our Purpose',
            'content' => <<<HTML
<p>At Acorn, our purpose is simple yet profound: to be a bridge of hope, connection, and possibility.</p>

<ul class="list-disc pl-6 space-y-2">
    <li>🌱 <strong>For learners:</strong> We open doors to discovery, designing personalized pathways that help every child grow, flourish, and believe in their own brilliance.</li>
    <li>💙 <strong>For parents and families:</strong> We walk alongside you, offering guidance, encouragement, and strength, so that no family ever feels alone on this journey.</li>
    <li>📚 <strong>For schools and educators:</strong> We equip teachers with knowledge, tools, and confidence to create classrooms where diversity is celebrated, not feared.</li>
    <li>🌍 <strong>For society:</strong> We stand as advocates for inclusion and dignity, raising awareness, breaking down barriers, and building communities where everyone belongs.</li>
</ul>

<p>In the spirit of <strong>Ubuntu — I am because we are</strong> — our purpose is to weave these threads together into a fabric of belonging, where each learner’s story is honored and each step forward uplifts us all.</p>
HTML
        ]);
    }
}
