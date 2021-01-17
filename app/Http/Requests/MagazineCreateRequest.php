<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class MagazineCreateRequest extends FormRequest
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
            'title' => 'required|max:255',
            'date' => 'required|date_format:d.m.Y',
            'authors' => 'required|array',
            'image' => 'required',

        ];
    }

     /**
     * @return array
     */
    public function messages ()
    {
        return [
            'image.required' => 'Требуется прикрепить картинку обложки журнала.',
            'authors.required' => 'Требуется выбрать как минимум одного автора.',
        ];
    }
}
