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
        Schema::create('bikalps', function (Blueprint $table) {
            $table->id();
            $table->string('handled');
            $table->string('source');
            $table->string('b-to-b');
            $table->string('b-to-c');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('location');
            $table->string('english');
            $table->string('score');
            $table->string('test');
            $table->string('lastqualification');
            $table->string('universityandboard');
            $table->string('passed');
            $table->decimal('gpa', 3, 2);
            $table->string('level');
            $table->string('university13');
            $table->string('course13');
            $table->string('intake13');
            $table->string('processing');
            $table->string('university14');
            $table->string('course14');
            $table->string('intake14');
            $table->string('university15');
            $table->string('course15');
            $table->string('additional-info');
            $table->string('intake15');
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
        Schema::dropIfExists('bikalps');
    }
};
