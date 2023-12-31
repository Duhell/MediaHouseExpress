<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{

    protected $fillable = [
            'FirstName',
            'MiddleName',
            'LastName',
            'PassportNumber',
            'SaudiResidenceID',
            'Gender',
            'EmailOrFacebook',
            'Occupation',
            'PersonalTele',
            'OtherTele',
            'LocationKSA',
            'EmployerName',
            'EmployerTele',
            'RecruitmentAgencySaudi',
            'RecruitmentAgencyPhilippines',
            'Complaint',
            'Location',
            'File_1',
            'File_2',
            'File_3',
    ];
}
