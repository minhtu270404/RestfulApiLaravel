<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return [
            'user_id' => 'required|exists:users,id',
            'code' => 'nullable|string|max:20',
            'gender' => 'nullable|in:men,woman,other',
            'birthdate' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email',
            'identily' => 'nullable|string|max:20',
            'tax_code' => 'nullable|string|max:20',
            'bank_account' => 'nullable|string|max:30',
            'bank' => 'nullable|string|max:100',
        ];
    }
    public function messages(): array
    {
        return [
            'user_id.required' => 'Người dùng không được để trống.',
            'user_id.exists' => 'Người dùng không tồn tại.',
            'code.string' => 'Mã phải là chuỗi ký tự.',
            'code.max' => 'Mã không được vượt quá 20 ký tự.',
            'gender.in' => 'Giới tính phải là một trong các giá trị: men, woman, other.',
            'birthdate.date' => 'Ngày sinh không hợp lệ.',
            'birth_place.max' => 'Nơi sinh không được vượt quá 255 ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 15 ký tự.',
            'email.email' => 'Email không hợp lệ.',
            'identily.max' => 'Số CMND/CCCD không được vượt quá 20 ký tự.',
            'tax_code.max' => 'Mã số thuế không được vượt quá 20 ký tự.',
            'bank_account.max' => 'Số tài khoản ngân hàng không được vượt quá 30 ký tự.',
            'bank.max' => 'Tên ngân hàng không được vượt quá 100 ký tự.',
        ];
    }
}
