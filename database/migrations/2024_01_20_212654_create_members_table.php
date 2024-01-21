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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->uuid('member_id');
            $table->string('FullName');
            $table->string('PHPassport');
            $table->string('MobilePhoneNumber');
            $table->string('EmailAddress');
            $table->string('Birthdate');
            $table->string('CivilStatus');
            $table->string('JobPosition');
            $table->string('JobSite');
            $table->string('NameOfEmployer');
            $table->string('AddressOfEmployer');
            $table->string('EmailOfEmployer');
            $table->string('PhoneNumberOfEmployer');
            $table->string('AgencyPH');
            $table->string('AgencyPH_Number');
            $table->string('EmailOfAgencyPH');
            $table->string('AgencyForeign');
            $table->string('AgencyForeign_Number');
            $table->string('EmailOfForeignPH');
            $table->string('OFWRelative');
            $table->string('RelationshipOFW');
            $table->string('PhoneNumberII');
            $table->string('AddressII');
            $table->string('EmailII');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
