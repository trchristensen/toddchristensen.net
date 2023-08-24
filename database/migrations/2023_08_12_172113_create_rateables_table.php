<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rateables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rating_id');
            $table->unsignedBigInteger('rateable_id'); // the model record id
            $table->string('taggable_type'); // the model class name
            $table->timestamps();

            $table->foreign('rating_id')->references('id')->on('ratings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rateables');
    }
};