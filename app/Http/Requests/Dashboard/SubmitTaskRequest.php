<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SubmitTaskRequest extends FormRequest
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
        $manger = auth('employees')->user();

        return [
            'employee_id' => 'required|exists:employees,id,manger_id,'.$manger->id,
            'task_description' => 'required|alpha_num|alpha_dash'
        ];
    }
}
