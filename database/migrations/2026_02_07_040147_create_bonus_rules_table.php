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
            $table->string('name', 50);
            $table->enum('type', ['ritase', 'distance']); // jenis bonus, bisa dapet salah satunya atau keduanya.
            $table->unsignedSmallInteger('min_value'); //diisi berdasarkan type bonus.
            $table->unsignedSmallInteger('max_value');
            $table->bigInteger('bonus_value');
            $table->foreignId('route_category')->nullable()->constrained('route_categories')->nullOnDelete();
            $table->boolean('is_active');
            $table->date('valid_from')->nullable();
            $table->date('valid_until')->nullable();
            $table->unique(['name', 'valid_from']); //data nama ATURAN BONUS & TANGGAL VALID ga boleh sama
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
