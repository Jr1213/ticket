<?php

namespace App\Dtos\Auth;

use App\Traits\StaticCreateSelf;
use App\Traits\ToArray;

class UserDto
{
    use ToArray, StaticCreateSelf;
    public readonly ?string $name;
    public readonly ?string $email;
    public readonly ?string $password;
    public readonly ?string $role;
    public readonly ?string $image;
}
