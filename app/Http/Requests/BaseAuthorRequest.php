<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseAuthorRequest extends FormRequest
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
            'first_name'    => 'required|string',
            'last_name'     => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'first_name'    => 'First name',
            'last_name'     => 'Last name',
        ];
    }
}
