<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            if (Schema::hasColumn('galleries', 'context_type')) {
                DB::statement('DROP INDEX IF EXISTS galleries_context_type_index');
            }

            if (Schema::hasColumn('galleries', 'context_slug')) {
                DB::statement('DROP INDEX IF EXISTS galleries_context_slug_index');
            }
        });

        Schema::table('galleries', function (Blueprint $table) {
            $columnsToDrop = [];

            if (Schema::hasColumn('galleries', 'context_type')) {
                $columnsToDrop[] = 'context_type';
            }

            if (Schema::hasColumn('galleries', 'context_slug')) {
                $columnsToDrop[] = 'context_slug';
            }

            if (! empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};


