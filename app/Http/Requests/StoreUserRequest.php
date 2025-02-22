<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'=>'required|unique:users,name|max:60',
            'username'=>'required|unique:users,username|max:60',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|min:8|same:password_confirm',
            'user_level'=>'required|integer|exists:user_groups,group_level',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
