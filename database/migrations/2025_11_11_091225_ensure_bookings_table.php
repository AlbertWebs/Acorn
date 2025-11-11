<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('phone');
                $table->string('location')->nullable();
                $table->dateTime('booking_datetime')->nullable();
                $table->string('service')->nullable();
                $table->text('additional_info')->nullable();
                $table->decimal('consultation_fee', 10, 2)->nullable();
                $table->string('payment_status')->default('Not Paid');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('bookings')) {
            Schema::drop('bookings');
        }
    }
};
