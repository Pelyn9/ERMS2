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
            $table->integer('department_id'); // Employee id
            $table->string('full_name'); // Employee full_name
            $table->string('photo'); // Employee photo
            $table->string('address'); // Employee address
            $table->string('mobile'); // Employee mobile
            $table->string('status'); // Employee status
            $table->timestamps();
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
