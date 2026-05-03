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
        Schema::create('registros_asistencia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained()->onDelete('cascade');
            $table->dateTime('entrada')->nullable();
            $table->dateTime('salida')->nullable();
            $table->decimal('latitud_entrada', 10, 8)->nullable();
            $table->decimal('longitud_entrada', 10, 8)->nullable();
            $table->decimal('latitud_salida', 10, 8)->nullable();
            $table->decimal('longitud_salida', 10, 8)->nullable();
            $table->enum('estado', ['presente','ausente','tardanza'])->default('presente');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_asistencia');
    }
};
