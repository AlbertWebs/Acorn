<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->insert([
            [
                'question' => 'What services does Acorn Special Tutorials offer?',
                'answer' => 'We provide inclusive education support, training and capacity building, consultation services, auditory integration therapy (AIT), individualized education plans (IEPs), and detailed assessments for children and families.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'How can I schedule an assessment?',
                'answer' => 'You can call us directly at 0725 959137 or visit our Nairobi office at 407 Muhuri. Our team will guide you through the assessment process and schedule a convenient time.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'What is Auditory Integration Therapy (AIT)?',
                'answer' => 'AIT is a sound-based therapy designed to improve listening and communication skills for individuals with sensory processing or auditory challenges.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Do you work with schools and teachers?',
                'answer' => 'Yes, we offer inclusive school support and teacher training to help schools create environments that accommodate all learners effectively.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'How do Individualized Education Plans (IEPs) work?',
                'answer' => 'IEPs are customized plans tailored to each learner’s needs, outlining specific goals, support strategies, and progress tracking methods for effective learning outcomes.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
