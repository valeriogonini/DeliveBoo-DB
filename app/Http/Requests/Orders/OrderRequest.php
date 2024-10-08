<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'token' => 'required',
            'amount' => 'required',
            'customer_name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'phone_number' => 'required|max:20',
            'address' => 'required|max:250',
            'total_price' => 'required',
        ];
    }
}
