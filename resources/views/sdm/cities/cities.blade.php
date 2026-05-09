@extends('layout.app')

@section('title', 'Master Kota')

@section('content')

<div class="card shadow-sm">

    <div class="card-body">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h4 class="mb-0">
                    Master Kota
                </h4>

                <small class="text-muted">
                    Kelola data kota perjalanan dinas
                </small>

            </div>

            <button
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#createCityModal"
            >
                + Tambah Kota
            </button>

        </div>

        @include('sdm.cities.create')

        <!-- Alert -->
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <!-- Table -->
        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th>No</th>
                        <th>Kota</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Provinsi</th>
                        <th>Pulau</th>
                        <th>Luar Negeri</th>
                        <th width="120">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($cities as $city)

                        <tr>

                            <!-- No -->
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <!-- Kota -->
                            <td>

                                <div class="fw-semibold">
                                    {{ $city->name }}
                                </div>

                            </td>

                            <!-- Latitude -->
                            <td>
                                {{ $city->latitude }}
                            </td>

                            <!-- Longitude -->
                            <td>
                                {{ $city->longitude }}
                            </td>

                            <!-- Provinsi -->
                            <td>
                                {{ $city->province }}
                            </td>

                            <!-- Pulau -->
                            <td>
                                {{ $city->island }}
                            </td>

                            <!-- Luar Negeri -->
                            <td>

                                @if($city->is_foreign)
                                    Ya
                                @else
                                    Tidak
                                @endif

                            </td>

                            <!-- Action -->
                            <td>

                                <div class="d-flex gap-2">

                                    <!-- Edit -->
                                    <button
                                        class="btn btn-outline-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editCityModal{{ $city->id }}"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <!-- Delete -->
                                    <button
                                        class="btn btn-outline-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteCityModal{{ $city->id }}"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </div>

                            </td>

                        </tr>

                        @include('sdm.cities.update', ['city' => $city])
                        @include('sdm.cities.delete', ['city' => $city])

                    @empty

                        <tr>

                            <td colspan="8" class="text-center py-4">
                                Data kota belum tersedia
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection