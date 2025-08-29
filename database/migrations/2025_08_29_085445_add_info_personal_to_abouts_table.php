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
        Schema::table('abouts', function (Blueprint $table) {
            $table->string("nome")->nullable();
            $table->string("perfil")->nullable();
            $table->string("image")->nullable();
            $table->string("description")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('nome');
            $table->dropColumn('perfil');
            $table->dropColumn('description');
        });
    }
};
