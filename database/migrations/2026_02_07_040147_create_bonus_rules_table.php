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
        Schema::create('bonus_rules', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->unique();
            $table->enum('type', ['ritase', 'distance']); // jenis bonus, bisa dapet salah satunya atau keduanya.
            $table->unsignedSmallInteger('min_value'); //diisi berdasarkan type bonus.
            $table->unsignedSmallInteger('max_value');
            $table->bigInteger('bonus_value');
            $table->foreignId('route_category')->nullable()->constrained()->nullOnDelete();
            $table->boolean('is_active')->default('true');
            $table->date('valid_from')->nullable();
            $table->date('valid_until')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonus_rules');
    }
};
