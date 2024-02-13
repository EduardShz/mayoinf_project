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
        Schema::create('servicios', function (Blueprint $table) {
            $precision = 6;
            $table->id();
            $table->string('accesorios',200);
            $table->boolean('es_empresa')->nullable()->default(false);
            $table->timestamp('fecha_entrada', $precision)->nullable();
            $table->timestamp('fecha_salida', $precision)->nullable();
            $table->foreignId('usuario')->constrained(table: 'personas', indexName: 'servicios_usuario')->onDelete('cascade');
            $table->foreignId('tecnico')->constrained(table: 'personas', indexName: 'servicios_tecnico')->onDelete('cascade');
            $table->foreignId('tipo_servicio_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
