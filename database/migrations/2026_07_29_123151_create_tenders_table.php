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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Заголовок тендера / объявления
            $table->text('description')->nullable(); // Подробное описание (опционально)
            $table->string('file_path')->nullable(); // Прикрепленный файл (документация тендера)
            $table->date('published_at'); // Дата публикации
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
