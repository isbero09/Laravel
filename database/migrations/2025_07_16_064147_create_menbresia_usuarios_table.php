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
        Schema::create('menbresia_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('membresia');
            $table->integer('membresia_id');
            $table->double('precio');
            $table->date('fecha_pago');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menbresia_usuarios');
    }
};
