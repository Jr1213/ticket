<?php

namespace App\Http\Controllers\Auth;

use App\Dtos\Auth\UserDto;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Http\Requests\Account\UpdatePasswordRequest;
use App\Services\Auth\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct(private readonly AuthService $authService)
    {
    }

    public function index(): View
    {
        $user = auth()->user();
        return view('pages.auth.account', compact('user'));
    }


    public function update(UpdateAccountRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = FileHelper::saveFile($request->file('image'), 'users');
        }

        $updated = $this->authService->update(UserDto::create($data), auth()->user());

        return redirect()->route('account.index')->with('success', 'your information has been updated');
    }

    public function password(UpdatePasswordRequest $request): RedirectResponse
    {
        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('danger', 'your current password incorrect.');
        };

        if ($request->password == $request->current_password) {
            return redirect()->back()->with('danger', 'new password and current password should not be matched.');
        }

        $this->authService->update(UserDto::create(['passowrd' => Hash::make($request->password)]), $user);
        return redirect()->back()->with('success', 'password has been updated.');
    
    }
}
