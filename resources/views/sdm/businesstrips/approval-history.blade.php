@extends('layout.app')

@section('title', 'Approval Perjalanan Dinas')

@section('content')

<div class="card shadow-sm">

    <div class="card-body">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h4 class="mb-0">
                    History Pengajuan Perjalanan Dinas
                </h4>

                <small class="text-muted">
                    History pengajuan perjalanan dinas pegawai
                </small>

            </div>

        </div>

        <!-- Table -->
        <div class="table-responsive">

            <table class="table table-hover table-bordered align-middle">

                <thead class="table-light">

                    <tr class="text-center">
                        <th>No</th>
                        <th>Pegawai</th>
                        <th>Tujuan Perdin</th>
                        <th>Kota</th>
                        <th>Tanggal & Durasi</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody class="text-center">

                    @forelse($businessTrips as $trip)

                        <tr>

                            <!-- No -->
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <!-- Pegawai -->
                            <td>

                                {{ $trip->employeeId->username }}

                            </td>

                            <!-- Tujuan -->
                            <td style="min-width: 250px;">

                                {{ $trip->purpose }}

                            </td>

                            <!-- Kota -->
                            <td>

                                {{ $trip->originCities->name }}
                                →
                                {{ $trip->destinationCities->name }}

                            </td>

                            <!-- Tanggal -->
                            <td>

                                {{ \Carbon\Carbon::parse($trip->departure_date)->translatedFormat('d F Y') }}
                                →
                                {{ \Carbon\Carbon::parse($trip->return_date)->translatedFormat('d F Y') }}

                                <small class="text-muted">

                                    ({{ $trip->duration_days }} Hari)

                                </small>

                            </td>

                            <!-- Status -->
                            <td>

                                @if($trip->status == 'PENDING')

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @elseif($trip->status == 'APPROVED')

                                    <span class="badge bg-success">
                                        Approved
                                    </span>

                                @elseif($trip->status == 'REJECTED')

                                    <span class="badge bg-danger">
                                        Rejected
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center py-4">
                                Tidak ada data pengajuan perjalanan dinas
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection