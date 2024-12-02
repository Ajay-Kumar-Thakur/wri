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
            $table->string('handled');
            $table->string('source');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('location');
            $table->string('english');
            $table->string('passed');
            $table->decimal('gpa', 3, 2);
            $table->string('level');
            $table->string('university');
            $table->string('course');
            $table->string('intake');
            $table->string('processing');
            $table->string('document');
            $table->string('initiated');
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
