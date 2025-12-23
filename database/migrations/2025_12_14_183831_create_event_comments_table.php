<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('event_comments', function (Blueprint $table) {
            $table->id();

            // если у тебя events в БД: связь с events.id
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();

            // гость может оставить имя/почту
            $table->string('name', 120);
            $table->string('email', 190)->nullable();

            $table->text('message');

            // модерация
            $table->enum('status', ['pending', 'approved'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_comments');
    }
};
