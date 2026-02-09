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
        Schema::create('driver_bios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('fullname', 30);
            $table->enum('jk', ['L', 'P'])->default('L');
            $table->date('date_birth');
            $table->string('place_birth', 30);
            $table->string('address');
            $table->string('medical_story');
            $table->string('no_tlp', 13);
            $table->string('no_emergency', 13);
            $table->enum('status', ['active', 'nonactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_bios');
    }
};
