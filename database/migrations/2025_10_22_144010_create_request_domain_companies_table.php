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
        Schema::create('request_domain_companies', function (Blueprint $table) {
            $table->id();
            $table->string("domain_name")->nullable();
            $table->enum("extension",[".it.ao", ".ao", ".co.ao",".org.ao",".edu.ao",".gov.ao"]);
            $table->foreignIdFor(company::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_domain_companies');
    }
};
