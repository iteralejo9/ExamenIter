<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('medicinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->string('principio_activo', 200);
            $table->string('concentracion', 50);
            $table->string('laboratorio', 100);
            $table->unsignedInteger('stock')->default(0);
            $table->decimal('precio', 8, 2);
            $table->date('fecha_vencimiento');
            $table->string('categoria', 50);
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('medicinas');
    }
};
