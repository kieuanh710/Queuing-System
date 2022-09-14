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
            'username' => 'required|unique:devices',
            'password' => 'required|min:6',
            'service' => 'required',

            //services
            'idService' => 'required',
            'nameService' => 'required',
            'desService' => 'required',
        ];
    }
    public function message() : array
    {
        return [
            'idDevice.required' =>  'Nhập mã thiết bị',
            'nameDevice.required' => 'Nhập tên thiết bị',
            'ip_address.required' => 'Nhập địa chỉ thiết bị',
            'typeDevice.required' => 'Nhập loại thiết bị',
            'username.required' => 'Nhập tên người dùng',
            'username.unique' => 'Tên người dùng đã tồn tại vui lòng nhập tên khác',
            'password.required' => 'Password ít nhất 6 kí tự',
            'service.required' => 'Nhập dịch vụ sử dụng',
            // services
            'idService.required' => 'Nhập mã dịch vụ',
            'nameService.required' => 'Nhập tên dịch vụ',
            'desService.required' => 'Nhập mô tả dịch vụ',
        ];
    }
}
