<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
            "subscription_name" => ["required", "string"],
            "cost" => ["required", "decimal"],
            "start" => ["required", "bigint"],
            "payment_date" => ["required", "int"],
            "notice_period" => ["required", "int"]
        ];
    }
}
