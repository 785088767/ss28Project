<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInsert extends FormRequest
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
            'loginname'=>'required|regex:/^[A-Za-z0-9_\x{4e00}-\x{9fa5}]+$/u|unique:home_user',
            'password'=>'required|regex:/\w{6,16}/',
            'phone'=>'required|regex:/^1[34578]\d{9}$/',
            'email'=>'required|email',
            'sex'=>'required',
            'level'=>'required',
            'truename'=>'required|regex:/\w{3,8}/',
            'repassword'=>'required|regex:/\w{6,16}/|same:password'
        ];
    }

    // 返回错误信息
    public function messages(){
        return [
            'loginname.required'=>'用户名不能为空',
            'loginname.regex'=>'用户名格式错误,请输入4-10位字母数字下划线',
            'loginname.unique'=>'用户名已被占用',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式错误,请输入6-16位任意字母数字下划线',
            'repassword.required'=>'重复密码不能为空',
            'repassword.regex'=>'重复密码不一致',
            'repassword.same'=>'重复密码不一致',
            'email.required'=>'邮箱地址不能为空',
            'email.email'=>'邮箱地址错误',
            'phone.required'=>'联系方式不能为空',
            'phone.regex'=>'联系方式格式错误',
            'truename.required'=>'请填写真实姓名',
            'truename.regex'=>'真心姓名必须为2~8位字符',
            'sex.required'=>'请选择性别',
            'level.required'=>'用户等级不能为空'
        ];
    }
}
