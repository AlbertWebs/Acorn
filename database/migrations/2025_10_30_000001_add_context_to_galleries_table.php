<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('context_type')->nullable()->index(); // trainings, history, event, general
            $table->string('context_slug')->nullable()->index(); // e.g., event slug, history id as string
        });
    }

    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn(['context_type','context_slug']);
        });
    }
};


