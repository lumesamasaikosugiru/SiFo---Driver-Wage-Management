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
        Schema::create('job_orders', function (Blueprint $table) {
            $table->id();
            $table->string('job_order_number')->unique();
            $table->string('vehicle_number', 9);
            $table->string('load_address');
            $table->string('unload_address');
            $table->unsignedMediumInteger('distance_km');
            $table->string('cargo_name', 30);
            $table->decimal('load_tonnage', 20, 2);
            $table->decimal('unload_tonnage', 20, 2);
            $table->string('delivery_note_photo');
            $table->string('unload_note_photo');
            $table->enum('status', ['draft', 'on_delivery', 'completed', 'cancelled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_orders');
    }
};
