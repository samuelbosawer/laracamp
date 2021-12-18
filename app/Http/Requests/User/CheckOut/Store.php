<?php

namespace App\Http\Requests\User\CheckOut;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $expired = date('Y-m', time());
        return [
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::id() . ',id',
            'occpation' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',

        ];
    }
}
