<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EstatesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price' => ['required', 'integer'],
            'address' => ['required'],
            'phone' => ['required', 'regex:/\+38\(0\d\d\)\d\d\d-\d\d-\d\d/'],
            'region_id' => ['required'],
            'room_option_id' => ['required'],
            'photos' => ['array'],
            'photos.*' => ['image'],
        ];
    }
}
