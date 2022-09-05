<?php

namespace App\Http\Requests\Manage;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
    public function rules()
    {
        return [
            'idDevice' => 'required',
            'nameDevice' => 'required',
            'typeDevice' => 'required',
            'ip_address' => 'required',
            'username' => 'required',
            'password' => 'required',
            'service' => 'required'
        ];
    }
    public function message() : array{
        return [
            'idDevice.required' => 'Vui lòng nhập mã thiết bị',
            'nameDevice.required' => 'Vui lòng nhập tên thiết bị',
            'typeDevice.required' => 'Vui lòng nhập tên thiết bị',
            'username.required' => 'Vui lòng nhập tên thiết bị',
            'password.required' => 'Vui lòng nhập tên thiết bị',
            'service.required' => 'Vui lòng nhập tên thiết bị'
        ];
    }
}
