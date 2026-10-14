<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('phone_number'); // WhatsApp number, e.g., 628123456789
            $table->text('address');
            $table->text('landmark'); // Detailed local landmark description
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->boolean('is_approved')->default(true); // Default true for seeders/dev
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
