<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            // Foreign keys (relations)
            $table->foreignId('appointment_id')
                ->nullable()
                ->constrained('appointments')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');

            $table->foreignId('consultant_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');

            // Client fallback info
            $table->string('client_name')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_phone')->nullable();

            // Invoice details
            $table->string('invoice_number')->unique();
            $table->date('invoice_date')->default(now());
            $table->date('due_date')->nullable();

            // Service details
            $table->string('service_type')->nullable();
            $table->integer('hours')->default(1);
            $table->decimal('rate_per_hour', 10, 2)->nullable();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->decimal('tax_amount', 10, 2)->default(0.00);
            $table->decimal('total_amount', 10, 2);

            // Payment details
            $table->enum('payment_method', ['mpesa', 'bank_transfer', 'cash', 'card'])->nullable();
            $table->enum('payment_status', ['unpaid', 'partial', 'paid', 'refunded'])->default('unpaid');
            $table->string('transaction_reference')->nullable();

            // Invoice status
            $table->enum('status', ['draft', 'sent', 'paid', 'cancelled'])->default('draft');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
