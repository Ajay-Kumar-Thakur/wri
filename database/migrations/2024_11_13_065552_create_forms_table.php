<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('source');
            $table->string('handled'); 
            $table->string('name');
            $table->string('phone');
            $table->string('university');
            $table->string('intake');
            $table->string('email');
            $table->string('country');
            $table->string('level'); 
            $table->string('course'); 
            $table->string('processing');
            $table->string('english');
            $table->string('gpa');
            $table->string('passed'); 
            $table->string('document'); 
            $table->string('remarks');
            $table->string('initiated'); 
            $table->string('interview');
            $table->string('visa');
            $table->string('noc');
            $table->string('fees');
            $table->string('amount');
            $table->string('scholarship');
            $table->string('offer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
