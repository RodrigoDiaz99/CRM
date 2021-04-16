<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryUpdate extends FormRequest
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
            'total_count' => 'required',
            'purchase_price' => 'required',
            'percent_of_profit' => 'required',
            'sale_price' => 'required',
            'cost_of_shipping' => 'required'
        ];
    }
}
