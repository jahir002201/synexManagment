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
            $table->string('phone',14);
            $table->string('start_date');
            $table->unsignedBigInteger('department_id')->nullable()->default(null);
            $table->unsignedBigInteger('designation_id')->nullable()->default(null);
            $table->string('image')->nullable();
            $table->timestamps();

              // users
              $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
              //department
              $table->foreign('department_id')
              ->references('id')
              ->on('departments')
              ->onDelete('set null');
              //designation
              $table->foreign('designation_id')
              ->references('id')
              ->on('designations')
              ->onDelete('set null');

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
