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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('phone');
            $table->string('start_date');
            $table->string('department');
            $table->string('designation');
            $table->timestamps();

              // Define foreign key constraint
              $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade'); // This will delete associated designations if the referenced  is deleted

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
