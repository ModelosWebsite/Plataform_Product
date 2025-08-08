<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{Payment, FunctionalityPlus};

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pacotes', function (Blueprint $table) {
            $table->foreignIdFor(Payment::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(FunctionalityPlus::class)->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('pacotes', function (Blueprint $table) {
            $table->dropForeignIdFor(Payment::class);
            $table->dropForeignIdFor(FunctionalityPlus::class);
        });
    }
};