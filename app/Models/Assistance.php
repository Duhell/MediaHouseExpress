<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    use HasFactory;

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
            'File_1',
            'File_2',
            'File_3',
    ];
}
