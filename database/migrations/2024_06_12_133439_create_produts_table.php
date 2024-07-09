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
        Schema::create('produts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->decimal("price");
            $table->string("description");
            $table->string("image");
            $table->foreignIdFor(company::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produts');
    }
};
