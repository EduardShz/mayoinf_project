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
        Schema::create('servicios_unidades', function (Blueprint $table) {
            $precision = 1;
            $table->string('descripcion',200);
            $table->string('observaciones',200);
            $table->timestamp('fecha_trabajo', $precision)->nullable();
            $table->foreignId('servicio_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_unidades');
    }
};
