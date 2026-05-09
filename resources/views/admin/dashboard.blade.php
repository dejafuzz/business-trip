@extends('layout.app')

@section('title', 'Dashboard Admin')

@section('content')

<div class="card shadow-sm">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="mb-0">
                    Manajemen Role User
                </h4>

                <small class="text-muted">
                    Kelola role user pegawai dan SDM
                </small>
            </div>

        </div>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th width="220">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($users as $user)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $user->username }}
                            </td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ $user->role->level }}
                                </span>
                            </td>

                            <td>

                                <button
                                    class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editRoleModal{{ $user->id }}"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                            </td>

                        </tr>

                        <!-- Modal Edit Role -->
                        <div
                            class="modal fade"
                            id="editRoleModal{{ $user->id }}"
                            tabindex="-1"
                            aria-hidden="true"
                        >

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <form
                                        action="{{ route('admin.update.role', ['id' => $user->id]) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">

                                            <h5 class="modal-title">
                                                Update Role User
                                            </h5>

                                            <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                            ></button>

                                        </div>

                                        <div class="modal-body">

                                            <div class="mb-3">

                                                <label class="form-label">
                                                    Username
                                                </label>

                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    value="{{ $user->username }}"
                                                    readonly
                                                >

                                            </div>

                                            <div class="mb-3">

                                                <label class="form-label">
                                                    Role
                                                </label>

                                                <select
                                                    name="role_id"
                                                    class="form-select"
                                                    required
                                                >

                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id_role }}" {{ $user->role_id == $role->id_role ? 'selected' : '' }}>
                                                        {{ $role->level }}
                                                    </option>
                                                @endforeach

                                                </select>

                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal"
                                            >
                                                Close
                                            </button>

                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                            >
                                                Update
                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center">
                                Data user kosong
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection