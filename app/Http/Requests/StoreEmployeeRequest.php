<?php

namespace App\Http\Requests;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $fechaActual = new DateTime();
        $fechaNacimiento = new DateTime($this->birth_date);
        $diferencia = $fechaActual->diff($fechaNacimiento);
        $age = $diferencia->y;
        $this->merge([
            'age' => $age,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'key' => 'required|string|unique:employees',
            'name' => 'required',
            'age' => 'required',
            'birth_date' => 'required',
            'sex' => 'required',
            'base_salary' => 'required',
            'about_me' => 'nullable',
            'hobbies' => 'nullable',
            'language' => 'nullable',
        ];
    }
}
