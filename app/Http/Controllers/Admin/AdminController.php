<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\interfaces\RoleRepositoryInterface;
use App\repositories\interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected UserRepositoryInterface $userRepository;
    protected RoleRepositoryInterface $roleRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index() {
        $users = $this->userRepository->getAll();
        $roles = $this->roleRepository->getAll();
        return view('admin.dashboard', compact('users', 'roles'));
    }

    public function updateRole(Request $request, int $id) {
        $this->userRepository->updateRole($id, $request->role_id);

        return redirect()->route('admin.dashboard')->with('success', 'Role berhasil di perbarui');
    }
}