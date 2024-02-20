<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(Request $request )
    {
        return [

            // 'full_name' => 'required|unique:employees,full_name,'.$this->employee.'|max:200' ,
            // 'financial_Figure' => 'required|unique:employees,financial_Figure,'.$this->employee.'',
            // 'national_no' => 'max:12|unique:employees,national_no,'.$this->employee.'' ,
            // 'bank_accountNo' => 'unique:employees,bank_accountNo,'.$this->employee.'' ,

        ];
    }

    public function messages(): array
    {
        return [
            // 'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
            // 'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
            // 'full_name.required' => 'الرجاء ادخال اسم الموظف ',
            // 'full_name.unique' => 'اسم الموظف موجود مسبقا',
            // 'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
            // 'national_no.max' => 'الحد الأقصى للادخال 12 رقم',
            // 'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً'
        ];
    }
}
