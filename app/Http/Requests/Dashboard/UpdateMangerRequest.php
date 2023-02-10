<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMangerRequest extends FormRequest
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
        $id = request()->id;
        return [
            'first_name' => 'required|min:3|max:250|alpha',
            'last_name' => 'required|min:3|max:250|alpha',
            'phone_number' => 'required|unique:employees,phone_number,except,id',
            'email' => 'required|email|unique:employees,email,except,id',
            'department_id' => 'required|integer', // |exists:departments,id',
            'salary' => 'required|numeric|digits_between:1,8',
            // 'password' => 'required', // |'.Password::min(8)->letters()->numbers()->symbols(),
        ];
    }
}
