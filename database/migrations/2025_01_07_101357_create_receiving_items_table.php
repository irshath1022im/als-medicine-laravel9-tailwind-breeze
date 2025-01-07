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
        Schema::create('receiving_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('receiving_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('batch_number_id');
            $table->integer('qty');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('cost', 8, 2);
            $table->text('remark')->nullable();

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('batch_number_id')->references('id')->on('batch_numbers');
            $table->foreign('receiving_id')->references('id')->on('receivings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receiving_items');
    }
};
