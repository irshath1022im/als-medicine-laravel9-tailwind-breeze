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
        Schema::create('consumptions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('batch_number_id');
            $table->integer('qty');
            $table->unsignedBigInteger('user_id');

            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('batch_number_id')->references('id')->on('batch_numbers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumptions');
    }
};
