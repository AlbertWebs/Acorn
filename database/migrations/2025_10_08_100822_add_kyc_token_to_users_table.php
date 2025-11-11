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
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('kyc_token')->nullable()->unique()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'kyc_token')) {
            DB::statement('DROP INDEX IF EXISTS users_kyc_token_unique');

            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('kyc_token');
            });
        }
    }
};
