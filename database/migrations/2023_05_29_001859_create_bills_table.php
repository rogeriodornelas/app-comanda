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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->string('costumer_name')->nullable();
            $table->boolean('bol_paid')->default(false);
            $table->boolean('bol_canceled')->default(false);
            $table->unsignedBigInteger('user_creator_id');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('user_creator_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
