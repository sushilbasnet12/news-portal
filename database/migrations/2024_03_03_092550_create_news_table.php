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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name');
            $table->string('image');
            $table->unsignedBigInteger('category_id'); //assigning a foreign key
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');  // defining a foreign key in orders table//Assigning foreign Key             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
