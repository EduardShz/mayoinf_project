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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('modelo',50);
            $table->boolean('es_empresa')->nullable()->default(false);
            $table->string('no_serie',50);
            $table->string('descripcion',300);
            $table->foreignId('marca_id')->constrained()->onDelete('cascade');
            $table->foreignId('tipo_unidade_id')->constrained()->onDelete('cascade');
            $table->foreignId('tipo_estado_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};
