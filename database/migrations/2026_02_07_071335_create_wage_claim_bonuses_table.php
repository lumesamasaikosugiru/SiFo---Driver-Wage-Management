<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wage_claim_bonuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wage_claim_id')->constrained('wage_claims')->cascadeOnDelete();
            $table->foreignId('bonus_rule_id')->constrained('bonus_rules')->cascadeOnDelete();
            $table->unsignedBigInteger('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wage_claim_bonuses');
    }
};
