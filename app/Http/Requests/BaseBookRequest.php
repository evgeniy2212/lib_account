<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseBookRequest extends FormRequest
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
     * @return array
     */
    public function attributes()
    {
        return [
            'name'          => 'Name',
            'description'   => 'Description',
            'page_count'    => 'Page count',
            'is_available'  => 'Is available',
            'assign'        => 'Authors',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'description'   => 'required',
            'page_count'    => 'required|numeric|min:1',
            'is_available'  => 'required|boolean',
            'assign'        => 'required|array',
            'assign.*'      => 'exists:authors,id',
        ];
    }
}
