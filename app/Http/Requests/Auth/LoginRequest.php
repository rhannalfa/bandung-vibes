<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
{
    $login = $this->input('login');
    $password = $this->input('password');

    $loginType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'nickname';

    if (!Auth::attempt([$loginType => $login, 'password' => $password], $this->boolean('remember'))) {
        throw ValidationException::withMessages([
            'login' => __('The provided credentials do not match our records.'),
        ]);
    }

    $this->session()->regenerate();
}


    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('login')).'|'.$this->ip());
    }

}
