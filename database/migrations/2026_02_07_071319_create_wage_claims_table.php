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
        Schema::create('wage_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('drivers')->cascadeOnDelete();
            $table->date('period_start');
            $table->date('period_end');
            $table->string('period_key');
            $table->unique(['driver_id', 'period_key']);
            $table->integer('total_ritase');
            $table->unsignedBigInteger('total_tarif');
            $table->unsignedBigInteger('total_bonus');
            $table->unsignedBigInteger('total_deduction');
            $table->unsignedBigInteger('total_fee');
            $table->unsignedBigInteger('total_net_salary');
            $table->enum('status', [
                'draft',
                'submitted',
                'approved_supervisor',
                'approved_finance',
                'rejected',
                'paid',
            ]);
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->timestamp('locked_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wage_claims');
    }
};
