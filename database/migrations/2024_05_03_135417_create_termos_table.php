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
        Schema::create('termos', function (Blueprint $table) {
            $table->id();
            $table->text("pbprivacy")->nullable();
            $table->text("pbcondition")->nullable();
            $table->text("companycondition")->nullable();
            $table->text("companyprivacy")->nullable();
            $table->enum("status", ["active", "inactive"])->default("inactive");
            $table->foreignIdFor(company::class)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('termos');
    }
};
