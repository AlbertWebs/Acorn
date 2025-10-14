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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            // The client booking the appointment
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // The consultant being booked (optional)
            $table->foreignId('consultant_id')->nullable()->constrained('users')->onDelete('set null');

            // Appointment details
            $table->dateTime('appointment_datetime');
            $table->integer('duration_minutes')->default(60); // Default 1-hour session

            // Appointment topic or reason
            $table->string('service_type')->nullable(); // e.g., "Business Strategy", "Legal Advice"
            $table->text('notes')->nullable(); // Client’s description or requirements

            // Meeting method & location
            $table->enum('meeting_type', ['in_person', 'virtual'])->default('virtual');
            $table->string('meeting_link')->nullable(); // for virtual meetings (Zoom, Google Meet)
            $table->string('location')->nullable(); // for physical meetings

            // Payment or status info
            $table->decimal('consultation_fee', 10, 2)->nullable();
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');

            // Appointment progress
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
