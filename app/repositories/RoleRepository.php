<?php

namespace App\repositories;

use App\Models\Role;
use App\Repositories\interfaces\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface {
    public function getAll() {
        return Role::whereNot('id_role', 1)->get();
    }
}