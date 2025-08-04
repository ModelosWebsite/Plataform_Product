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
        Schema::table('companies', function (Blueprint $table) {
            $table->enum('delivery_method', ['Meus Entregadores', 'Entregadores PB'])
                ->default('Meus Entregadores')
                ->after('payment_type')
                ->comment('Método de entrega utilizado pela empresa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('delivery_method');
        });
    }
};
