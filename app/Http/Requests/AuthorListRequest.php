<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorListRequest extends FormRequest
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
            'orderDir' =>'in:asc,desc' 
        ];
    }

    /**
     * @return array
     */
    public function messages ()
    {
        return [
            'orderDir.in' => 'Значение для сортировки выбрано неверное, попробуйте asc или desc'
        ];
    }
}
