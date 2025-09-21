<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user2s', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            // $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('course')->nullable();
            $table->string('address');
            $table->integer('age');
            $table->string('qualification')->nullable();
            $table->string('family_member')->nullable();
            $table->integer('height')->nullable();
            $table->string('profile_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user2s');
    }
};
