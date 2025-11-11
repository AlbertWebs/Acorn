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
        Schema::table('clients', function (Blueprint $table) {
            $table->uuid('kyc_token')->nullable()->unique()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('clients', 'kyc_token')) {
            DB::statement('DROP INDEX IF EXISTS clients_kyc_token_unique');

            Schema::table('clients', function (Blueprint $table) {
                $table->dropColumn('kyc_token');
            });
        }
    }
};
