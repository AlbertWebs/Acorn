<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (! Schema::hasColumn('events', 'event_date')) {
                $table->date('event_date')->nullable()->index()->after('is_published');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('events', 'event_date')) {
            // Drop the index on SQLite manually before removing the column to avoid errors.
            DB::statement('DROP INDEX IF EXISTS events_event_date_index');

            Schema::table('events', function (Blueprint $table) {
                $table->dropColumn('event_date');
            });
        }
    }
};


