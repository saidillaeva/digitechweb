<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->string('image_path')->nullable();
            $table->dateTime('published_at')->nullable();

            // 🔥 мультиязычные поля
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('title_kg');
            $table->string('title_de');

            $table->string('excerpt_ru', 500)->nullable();
            $table->string('excerpt_en', 500)->nullable();
            $table->string('excerpt_kg', 500)->nullable();
            $table->string('excerpt_de', 500)->nullable();

            $table->text('content_ru');
            $table->text('content_en');
            $table->text('content_kg');
            $table->text('content_de');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
