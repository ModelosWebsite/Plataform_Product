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
        Schema::create('themes', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 100);
            $table->string('folder', 100); // Nome da pasta (ex: "default", "modern")
            $table->string('author', 100)->nullable();
            $table->string('version', 20)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
