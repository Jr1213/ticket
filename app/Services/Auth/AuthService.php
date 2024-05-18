<?php

namespace App\Services\Auth;

use App\Dtos\Auth\UserDto;
use App\Dtos\Dto;
use App\Helpers\FileHelper;
use App\Models\User;

class AuthService
{
    public function create(UserDto|Dto $userDto): User
    {
        return User::create($userDto->toArray());
    }

    public function user(): User
    {
        return auth()->user();
    }

    public function update(UserDto $userDto, User $user): User
    {

        $oldFile = $user->image;
        $user->update($userDto->toArray());
        if ($oldFile && isset($userDto->image)) {
            FileHelper::deleteFile($oldFile);
        }
        return $user;
    }

    
}
