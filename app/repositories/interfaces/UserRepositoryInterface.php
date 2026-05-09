<?php

namespace App\repositories\interfaces;

interface UserRepositoryInterface
{
    public function getAll();
    public function findByUsername(string $username);

    public function updateRole(int $id, int $role);
}