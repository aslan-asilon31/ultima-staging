<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatesPlanInsertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // return [
        //     "cancellation_id" => "required|exists:cancellation_policy,id",
        //     // "cancellation_id" => "required",
        //     'rates_name'     => 'required',
        //     'def_meal_available'     => 'required|numeric',
        //     'def_bookable'     => 'required',
        //     'def_minimum_stay'     => 'required',
        //     'room_name'     => 'required|array',
        //     'base_rate'     => 'required|numeric',
        //     'extrabed_rate'     => 'required|numeric',
        // ];
    }

    // public function validated()
    // {
    //     $body =  $this->validator->validated();
    //     $body['rate_name'] = data_get($body,"rates_name");
    //     unset($body['rates_name']);
    //     $body['extrabed_rate'] =  (float) data_get($body,"extrabed_rate");

    //     //CREATE ID
    //     $bytes = openssl_random_pseudo_bytes(4, $cstrong);
    //     $hex = bin2hex($bytes);
    //     $id = $hex;

    //     $body["id"]= $id;
    //     return  $body;
    // }
}
