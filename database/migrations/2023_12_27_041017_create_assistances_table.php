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
        Schema::create('assistances', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName');
            $table->string('MiddleName')->nullable();
            $table->string('LastName');
            $table->string('PassportNumber');
            $table->string('SaudiResidenceID')->nullable();
            $table->string('Gender');
            $table->string('EmailOrFacebook');
            $table->string('Occupation');
            $table->bigInteger('PersonalTele')->nullable();
            $table->bigInteger('OtherTele')->nullable();
            $table->string('LocationKSA');
            $table->string('EmployerName')->nullable();
            $table->bigInteger('EmployerTele')->nullable();
            $table->string('RecruitmentAgencySaudi')->nullable();
            $table->string('RecruitmentAgencyPhilippines')->nullable();
            $table->string('Complaint');
            $table->string('File_1')->nullable();
            $table->string('File_2')->nullable();
            $table->string('File_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistances');
    }
};
