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
        Schema::create('class_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('class_category_id')->constrained();
            $table->string('photo');
            $table->text('paragraf1');
            $table->text('paragraf2');
            $table->text('paragraf3')->nullable();
            $table->boolean('status')->default(0);
            $table->string('foto')->nullable();
            $table->string('video')->nullable();
            $table->longText('more')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_articles');
    }
};
