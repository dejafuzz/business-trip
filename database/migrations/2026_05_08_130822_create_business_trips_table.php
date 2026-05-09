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
        Schema::create('business_trips', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained('users');
            $table->foreignId('origin_city_id')->constrained('cities');
            $table->foreignId('destination_city_id')->constrained('cities');

            $table->text('purpose');

            $table->date('departure_date');
            $table->date('return_date');

            $table->integer('duration_days');
            
            $table->decimal('distance_km', 10, 2);

            $table->decimal('daily_allowence', 15, 2);

            $table->string('currency', 10)->default('IDR');

            $table->decimal('total_allowence', 15, 2);

            $table->string('status')->default('PENDING');

            $table->foreignId('approved_by')->nullable()->constrained('users');

            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_trips');
    }
};