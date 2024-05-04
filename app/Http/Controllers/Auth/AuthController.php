<?php

namespace App\Http\Controllers\Auth;

use App\Dtos\Auth\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateAccountRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService)
    {
    }
    public function singInForm()
    {
        return view('pages.auth.login');
    }

    public function singIn(LoginRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'Invalid credentials.');
    }


    public function singUpForm()
    {
        return view('pages.auth.register');
    }

    public function singUp(CreateAccountRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = $this->authService->create(UserDto::create($data));
        return redirect()->route('login');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
