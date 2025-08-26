<?php

use App\Models\company;
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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string("nome")->nullable();
            $table->string("perfil")->nullable();
            $table->string("image")->nullable();
            $table->string("description")->nullable();
            $table->text("p1")->nullable();
            $table->text("p2")->nullable();
            $table->foreignIdFor(company::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
