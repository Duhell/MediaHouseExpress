<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'FullName',
        'PHPassport',
        'MobilePhoneNumber',
        'EmailAddress',
        'Birthdate',
        'CivilStatus',
        'JobPosition',
        'JobSite',
        'NameOfEmployer',
        'AddressOfEmployer',
        'EmailOfEmployer',
        'PhoneNumberOfEmployer',
        'AgencyPH',
        'AgencyPH_Number',
        'EmailOfAgencyPH',
        'AgencyForeign',
        'AgencyForeign_Number',
        'EmailOfForeignPH',
        'OFWRelative',
        'RelationshipOFW',
        'PhoneNumberII',
        'AddressII',
        'EmailII',
    ];
}
