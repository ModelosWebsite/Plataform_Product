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
        Schema::create('markings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // name or title of the appointment
            $table->text('description')->nullable(); // brief description
            $table->decimal('cost', 10, 2)->default(0.00); // cost per appointment
            $table->text('html_embed')->nullable(); // HTML for embed
            $table->boolean('status')->default(false);
            $table->foreignIdFor(company::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markings');
    }
};
