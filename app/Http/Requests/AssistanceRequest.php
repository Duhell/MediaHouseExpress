<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssistanceRequest extends FormRequest
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
            'FirstName' => 'required',
            'MiddleName' => 'nullable',
            'LastName' => 'required',
            'PassportNumber' => 'required',
            'SaudiResidenceID' => 'nullable',
            'Gender' => 'required',
            'EmailOrFacebook' => 'required',
            'Occupation' => 'required',
            'PersonalTele' => 'nullable',
            'OtherTele' => 'nullable',
            'LocationKSA' => 'nullable',
            'EmployerName' => 'nullable',
            'EmployerTele' => 'nullable',
            'RecruitmentAgencySaudi' => 'nullable',
            'RecruitmentAgencyPhilippines' => 'nullable',
            'Complaint' => 'required',
            'File_1' => 'sometimes|nullable',
            'File_2' => 'sometimes|nullable',
            'File_3' => 'sometimes|nullable',
        ];
    }
}
