<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Polymorphic relation to billable entities (events, bookings, etc.)
            $table->nullableMorphs('billable'); // adds billable_id, billable_type

            // Generic item fields
            $table->string('item_name')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('unit_price', 10, 2)->nullable();

            // Make some service-specific fields nullable/flexible
            $table->integer('hours')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropMorphs('billable');
            $table->dropColumn(['item_name','quantity','unit_price']);
            $table->integer('hours')->default(1)->change();
        });
    }
};


