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
        Schema::table('electricities', function (Blueprint $table) {
            $table->timestamp('payment_date');
            $table->boolean('is_paid')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('electricities', function (Blueprint $table) {
            $table->dropColumn('payment_date');
            $table->dropColumn('is_paid');
        });
    }
};
