<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
                'email'=>'unique:Employees,email,'.$this->id.',id',
                'phone'=>'unique:Employees,phone,'.$this->id.',id',
            ];
        }
        else{
            $rule = [
                'email'=>'unique:Employees,email',
                'phone'=>'unique:Employees,phone',
            ];
        }
        return $rule;
        
    }

    public function messages()
    {
        return [
            'email.unique'=>'Email đã tồn tại!',
            'phone.unique'=>'SĐT đã tồn tại!',
        ];
    }
}
