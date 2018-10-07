<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminInsert extends FormRequest
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
            // 用户名限制
            'username'=>'required|regex:/\w{3,8}/|unique:admin_user',
            'password'=>'required|regex:/\w{6,16}/',
            'repassword'=>'required|regex:/\w{6,16}/|same:password'

        ];
    }

    // 返回错误信息
    public function messages(){
        return [
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名格式错误,请输入4-10位字母数字下划线',
            'username.unique'=>'用户名已被占用',

            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式错误,请输入6-16位任意字母数字下划线',
            'repassword.required'=>'重复密码不能为空',
            'repassword.regex'=>'重复密码不一致',
            'repassword.same'=>'重复密码不一致',
        ];
    }
}
