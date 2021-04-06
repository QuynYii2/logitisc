<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'name' => 'required|unique:users,email,' . $this->id ,
            'count'  => 'required|unique:users,name,'. $this->id ,
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Chưa nhập email hoặc email đã có người sử dụng',
            'name.required' => 'Nội dung bình luận phải có độ dài ngắn hơn 255 kí tự',
            'password.required' => 'Nội dung bình luận phải có độ dài ngắn hơn 255 kí tự',
            're-password.required' => 'Nội dung bình luận phải có độ dài ngắn hơn 255 kí tự',
        ];
    }

}
