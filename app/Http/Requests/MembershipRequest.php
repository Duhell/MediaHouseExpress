<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'FullName' => 'required|max:255',
            'PHPassport' => 'required|max:255',
            'MobilePhoneNumber' => 'required|max:255',
            'EmailAddress' => 'required|email|max:255',
            'Birthdate' => 'required|date|max:255',
            'CivilStatus' => 'required|max:255',
            'JobPosition' => 'required|max:255',
            'JobSite' => 'required|max:255',
            'NameOfEmployer' => 'required|max:255',
            'AddressOfEmployer' => 'required|max:255',
            'EmailOfEmployer' => 'required|email|max:255',
            'PhoneNumberOfEmployer' => 'required|max:255',
            'AgencyPH' => 'required|max:255',
            'AgencyPH_Number' => 'required|max:255',
            'EmailOfAgencyPH' => 'required|email|max:255',
            'AgencyForeign' => 'required|max:255',
            'AgencyForeign_Number' => 'required|max:255',
            'EmailOfForeignPH' => 'required|email|max:255',
            'OFWRelative' => 'required|max:255',
            'RelationshipOFW' => 'required|max:255',
            'PhoneNumberII' => 'required|max:255',
            'AddressII' => 'required|max:255',
            'EmailII' => 'required|email|max:255',
        ];
    }
}
