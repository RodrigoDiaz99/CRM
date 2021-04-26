<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliverydataStore extends FormRequest
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
            'name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'street'=>'required',
            'number_exterior'=>'required',
            'suburb'=>'required',
            'zip'=>'required',
            'reference'=>'required'
        ];
    }
}
