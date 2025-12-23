<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news_comments', function (Blueprint $table) {
            $table->id();

            // связь с новостями (events)
            $table->foreignId('news_id')
                ->constrained('news')
                ->cascadeOnDelete();

            // пользователь
            $table->string('name', 120);
            $table->text('message');

            // модерация
            $table->boolean('is_approved')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_comments');
    }
};
