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
        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->string('value')->nullable(false);
            $table->foreignId('product_attribute_id')->constrained(table:'product_attributes' )->onDelete('cascade');
            $table->foreignId('product_id')->constrained(table:'products',column:'id')->onDelete('cascade');
            $table->unsignedBigInteger('created_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attribute_values');
    }
};
