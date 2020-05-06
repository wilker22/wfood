<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermission extends FormRequest
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
        $id = $this->segment(3); //recuperar o id do profile para comparar na validação da coluna name

        return [
            'name' => "required|min:3|max:255|unique:profiles,name,{$id},id", //caso seja editado com o mesmo nome ele não validar como UNIQUE
            'description' => 'nullable|min:3|max:255',
        ];
    }
}
