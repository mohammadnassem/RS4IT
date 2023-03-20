<?php

use App\Enums\RoomType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('check_in_date');
            $table->date('check_out_date');
          $table->tinyInteger('room_type');
            $table->foreignId('extra_reservation_id')->nullable()
                ->constrained('reservations')->onDelete('cascade');
            $table->foreignId('passenger_id')
                ->constrained('passengers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
