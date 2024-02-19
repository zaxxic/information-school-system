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
        Schema::create('greetings', function (Blueprint $table) {
            $table->id();
            $table->text('paragraf1')->nullable();
            $table->text('paragraf2')->nullable();
            $table->text('paragraf3')->nullable();
            $table->text('paragraf4')->nullable();
            $table->text('paragraf5')->nullable();
            $table->text('text')->nullable();
            $table->string('jenis');
            $table->text('quote')->nullable();
            $table->string('photo')->nullable();
            $table->string('photo2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('greetings');
    }
};
