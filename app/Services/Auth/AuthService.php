<?php

namespace App\Services\Auth;

use App\Dtos\Auth\UserDto;
use App\Dtos\Dto;
use App\Models\User;

class AuthService
{
    public function create(UserDto|Dto $userDto): User
    {
        return User::create($userDto->toArray());
    }
}
