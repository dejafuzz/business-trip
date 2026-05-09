<?php

namespace App\repositories;

use App\Models\User;
use App\repositories\interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    public function getAll()
    {
        return User::where('role_id', '!=', 1)->get();
    }

    public function findByUsername(string $username)
    {
        return User::where('username', $username)->first();
    }

    public function updateRole(int $id, int $role)
    {
        $user = User::findOrFail($id);
        $user->role_id = $role;
        $user->save();
    }

}