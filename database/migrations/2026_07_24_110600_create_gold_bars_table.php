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
        Schema::create('gold_bars', function (Blueprint $table) {
            $table->id();
            $table->string('weight'); // например, "1 г.", "31.1035 г."
            $table->string('buy_price');
            $table->string('sell_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gold_bars');
    }
};
