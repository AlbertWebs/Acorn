<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Drop the old foreign key
            $table->dropForeign(['booking_id']);

            // Add the correct foreign key pointing to bookings
            $table->foreign('booking_id')
                ->references('id')
                ->on('bookings') // corrected table name
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['booking_id']);
            $table->foreign('booking_id')
                ->references('id')
                ->on('appointments') // rollback to old (wrong) state
                ->onDelete('cascade');
        });
    }
};
