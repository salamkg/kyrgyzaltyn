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
        Schema::create('board_members', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ФИО (например: Абдраимов Кубат Бейшенбекович)
            $table->string('position'); // Должность (например: Председатель Правления ОАО «КыргызАлтын»)
            $table->string('photo_path'); // Фотография
            $table->integer('sort_order')->default(0); // Порядок сортировки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_members');
    }
};
