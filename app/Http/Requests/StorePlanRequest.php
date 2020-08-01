<?php

namespace App\Http\Requests;

use App\Rules\PricePlanNotNull;
use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
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
            'check_price' => 'required',
            // required_withでうまくいかなかっため、カスタムでルールで対応
            'price' => new PricePlanNotNull()
        ];
    }
}
