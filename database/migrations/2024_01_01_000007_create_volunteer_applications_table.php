<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('volunteer_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->integer('age')->nullable();
            $table->string('city')->nullable();
            $table->string('occupation')->nullable();
            $table->json('availability')->nullable(); // días/horarios disponibles
            $table->json('skills')->nullable();       // habilidades/áreas de interés
            $table->text('motivation');
            $table->string('status')->default('pending'); // pending, reviewing, accepted, rejected
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteer_applications');
    }
};
