<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUsersRequest extends FormRequest
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


    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. $this->id,
            'password' => 'confirmed',
            'admin' => 'required ',
        ];
    }


    public function messages()
    {

        return [
            'name.required' => 'ادخل اسم للمستخدم ',
            'email.required'   =>'ادخل ايميل للمستخدم',
            'email.unique'   =>'الايميل موجود مسبقا',
            'admin.required'   =>'اختر صلاحية للمستخدم',
            'password.confirmed' => 'كلمة المرور غير متطابقة',


        ];
    }

}
