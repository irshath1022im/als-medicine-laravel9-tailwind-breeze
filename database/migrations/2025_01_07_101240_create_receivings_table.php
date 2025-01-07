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
        Schema::create('receivings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('supplier_id');
            $table->string('po')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('delivery_note')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receivings');
    }
};
