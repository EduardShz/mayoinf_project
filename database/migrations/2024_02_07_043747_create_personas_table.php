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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('paterno',100);
            $table->string('materno',100);
            $table->string('telefono',15);
            $table->string('correo',100)->unique();
            $table->foreignId('empresa_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('tipo_persona_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
