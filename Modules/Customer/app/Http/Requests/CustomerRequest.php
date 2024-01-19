<?php

namespace Modules\Customer\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:6',
            'group_id' => 'required',
            'address' => 'required',
            'email'=>'email|unique:customers,email',
            'cellphone'=>'required|regex:/(0)[0-9]{9}/',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
