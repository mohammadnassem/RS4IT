<?php

use App\Enums\Gender;
use App\Enums\VisaStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('passenger_information', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->tinyInteger('gender');
            $table->date('place_of_birth');
            $table->string('country_of_residency');
            $table->string('passport_no');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->string('place_of_issue');
            $table->date('arrival_date');
            $table->string('profession');
            $table->string('organization');
            $table->integer('visa_duration');
            $table->tinyInteger('visa_status');
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
        Schema::dropIfExists('passenger_information');
    }
};
