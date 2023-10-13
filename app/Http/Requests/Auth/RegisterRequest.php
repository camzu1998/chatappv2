<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'unique:users,email', 'email', 'max:250'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    /**
     * Validation rules messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => __('Pole :attribute jest wymagane.', ['attribute' => __('Imię')]),
            'name.string' => __('Pole :attribute musi być ciągiem znaków.', ['attribute' => __('Imię')]),
            'name.max' => __('Pole :attribute nie może być dłuższe niż :max znaków.', ['attribute' => __('Imię'), 'max' => 255]),
            'email.required' => __('Pole :attribute jest wymagane.', ['attribute' => __('Adres e-mail')]),
            'email.unique' => __('Pole :attribute już istnieje w bazie danych.', ['attribute' => __('Adres e-mail')]),
            'email.email' => __('Pole :attribute musi być poprawnym adresem e-mail.', ['attribute' => __('Adres e-mail')]),
            'email.max' => __('Pole :attribute nie może być dłuższe niż :max znaków.', ['attribute' => __('Adres e-mail'), 'max' => 255]),
            'password.required' => __('Pole :attribute jest wymagane.', ['attribute' => __('Hasło')]),
            'password.string' => __('Pole :attribute musi być ciągiem znaków.', ['attribute' => __('Hasło')]),
            'password.min' => __('Pole :attribute musi mieć co najmniej :min znaków.', ['attribute' => __('Hasło'), 'min' => 8]),
            'password.confirmed' => __('Pole :attribute i "Potwierdź hasło" muszą być takie same.', ['attribute' => __('Hasło')]),
        ];
    }
}
