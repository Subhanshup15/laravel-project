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
    Schema::table('employees', function (Blueprint $table) {
        // Add index only if it doesn’t exist
        if (!Schema::hasColumn('employees', 'name')) {
            $table->index('name');
        }

        // Department index already exists, so skip it

        // Email might already be unique, skip if so
        // If not, uncomment below
        // $table->unique('email');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
};
