<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            $table->string('title_ru');
            $table->string('title_en');
            $table->string('title_kg');
            $table->string('title_de');

            $table->string('doc_group')->index();
            $table->string('period')->nullable()->index();

            $table->string('file_path');

            $table->date('published_at')->nullable()->index();

            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_kg')->nullable();
            $table->text('description_de')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
