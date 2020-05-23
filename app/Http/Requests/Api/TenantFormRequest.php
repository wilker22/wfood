<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TenantFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            'token_company' => 'required|exists:tenants,uuid',
=======
            'token_company' => ['required', 'exists:tenants,uuid'],
>>>>>>> dad99c20418a46e5341affe3d2806e68109005c6
        ];
    }
}
