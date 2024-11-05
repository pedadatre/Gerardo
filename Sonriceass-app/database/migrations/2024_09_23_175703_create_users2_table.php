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
        Schema::create('library', function (Blueprint $table) {
            $table->string('ISBN')->primary();
            $table->string('author');
            $table->string('title');
            $table->string('editorial');
            $table->string('type');
            $table->integer('nPages');
            $table->integer('quantity');
            $table->integer('format_id');
            $table->boolean('available')->default(0);
            $table->timestamps();
        });

        Schema::create('users2', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library');
    }
};
