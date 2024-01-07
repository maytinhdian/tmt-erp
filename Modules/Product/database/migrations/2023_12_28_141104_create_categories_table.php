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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',200)->nullable()->unique();
            $table->string('slug',200)->nullable();
            $table->jsonb('allowed_attributes')->nullable();
            $table->foreignId('parent_id')->default(0);//->constrained(table:'categories',column:'id');
            $table->unsignedBigInteger('created_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
