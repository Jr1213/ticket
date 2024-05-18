<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function  fetchAll(array $filter = []): Collection
    {
        $query = User::query();
        if (isset($filter['role'])) {
            $query->where('role', $filter['role']);
        }

        return $query->orderByDesc('created_at')->get();
    }
}
