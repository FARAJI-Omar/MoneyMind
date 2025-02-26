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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('credit_date'); // Drop the credit_date column
            $table->unsignedTinyInteger('credit_day')->nullable()->after('salary'); // Add credit_day after salary
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('credit_date')->nullable(); // Re-add credit_date
            $table->dropColumn('credit_day'); // Remove credit_day
        });
    }
};
