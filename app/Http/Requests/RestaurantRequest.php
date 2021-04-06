<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            'restaurant_name' => 'required|unique:restaurants,name,' . $this->id ,
        ];
    }

    public function messages()
    {
        return [
            'restaurant_name.required' => 'Nội dung bình luận phải có độ dài ngắn hơn 255 kí tự',
        ];
    }

}
