<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuldingRequest extends FormRequest
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
            'name' => 'required|max:100',
            'address' => 'required',
            'type_id' => 'required',
            'rent' => 'required',
            'roms' => 'required',
            'price' => 'required',
            'square' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(){

    return [
        'name.required' => 'ادخل اسم للعقار',
        'address.required' => 'ادخل عنوان للعقار',
        'type_id.required'   =>'يرجى اختيار نوع للعقار',
        'rent.required'   =>'يرجى اختيار نوع العرض',
        'square.required'   =>'ادخل مساحة العقار',
        'price.required'   =>'ادخل سعر العقار',
        'description.required'   =>'ادخل وصف للعقار',
        'sm_description.max'   =>'لاتدخل اكثر من 160 حرف في الوصف الصغير',
        'tags.required'   =>'ادخل كلمات مفتاحية',
        'roms.required'   =>'ادخل عدد الغرف',

    ];
}

}
