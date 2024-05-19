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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('purchase_by');
            $table->integer('amount');
            $table->longText('note')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
            ->references('id')
            ->on('users')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
