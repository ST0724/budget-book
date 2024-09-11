<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'category' => ['required', 'integer'],
            'price' => ['required', 'integer']
        ];
    }

    public function messages(){
        return[
            'date' => '日付で入力してください。',
            'integer' => '数値で入力してください。',
            'required' => '必須項目です。'
        ];
    }
}
