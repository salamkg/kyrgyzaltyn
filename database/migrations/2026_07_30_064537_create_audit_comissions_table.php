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
        Schema::create('audit_commissions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ФИО члена комиссии
            $table->string('position'); // Должность (например: Член Ревизионной комиссии)
            $table->string('photo_path')->nullable(); // Фото (необязательно)
            $table->integer('sort_order')->default(0); // Порядок сортировки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_comissions');
    }
};
