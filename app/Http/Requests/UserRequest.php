<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|unique:users,email,' . $this->id ,
            'name'  => 'required|unique:users,name,'. $this->id ,
            'password' => 'required',
            're-password' => 'required',
            'role' => 'required'
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
