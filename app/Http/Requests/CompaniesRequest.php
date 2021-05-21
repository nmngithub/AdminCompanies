<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
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
        if(isset($this->id)){
            $rule = [
                'name'=>'unique:Companies,name,'.$this->id.',id',
                'email'=>'unique:Companies,email,'.$this->id.',id',
                'website'=>'unique:Companies,website,'.$this->id.',id',
            ];
        }
        else{
            $rule = [
                'name'=>'unique:Companies,name',
                'email'=>'unique:Companies,email',
                'website'=>'unique:Companies,website',
            ];
        }
        return $rule;
        
    }

    public function messages()
    {
        return [
            'name.unique'=>'Tên công ty đã tồn tại!',
            'email.unique'=>'Email đã tồn tại!',
            'website.unique'=>'Website đã tồn tại!',
        ];
    }
}
