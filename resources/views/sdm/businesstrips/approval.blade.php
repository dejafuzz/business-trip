<!-- Modal Approval -->
<div
    class="modal fade"
    id="approvalModal{{ $trip->id }}"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <form
                action="{{ route('sdm.business.trip.approval', ['id' => $trip->id]) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <!-- Header -->
                <div
                    class="modal-header border-0 text-white"
                    style="background: linear-gradient(135deg, #2563eb, #1d4ed8);"
                >

                    <div>

                        <h5 class="modal-title fw-bold mb-1">
                            Approval Perjalanan Dinas
                        </h5>

                        <small class="text-white-50">
                            Review dan approval pengajuan perjalanan dinas pegawai
                        </small>

                    </div>

                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                    ></button>

                </div>

                <!-- Body -->
                <div class="modal-body p-4">

                    <!-- Informasi Pegawai -->
                    <div class="row g-4">

                        <div class="col-md-6">

                            <div class="border rounded-4 p-3 h-100">

                                <small class="text-muted d-block mb-2">
                                    Pegawai
                                </small>

                                <div class="fw-semibold fs-6">
                                    {{ $trip->employeeId->username }}
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="border rounded-4 p-3 h-100">

                                <small class="text-muted d-block mb-2">
                                    Status Pengajuan
                                </small>

                                <div>

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

                                </div>

                            </div>

                        </div>

                        <!-- Tujuan -->
                        <div class="col-12">

                            <div class="border rounded-4 p-3">

                                <small class="text-muted d-block mb-2">
                                    Maksud / Tujuan Perdin
                                </small>

                                <div class="fw-semibold">
                                    {{ $trip->purpose }}
                                </div>

                            </div>

                        </div>

                        <!-- Kota -->
                        <div class="col-md-6">

                            <div class="border rounded-4 p-3 h-100">

                                <small class="text-muted d-block mb-2">
                                    Rute Perjalanan
                                </small>

                                <div class="fw-semibold">

                                    {{ $trip->originCities->name }}
                                    →
                                    {{ $trip->destinationCities->name }}

                                </div>

                            </div>

                        </div>

                        <!-- Tanggal -->
                        <div class="col-md-6">

                            <div class="border rounded-4 p-3 h-100">

                                <small class="text-muted d-block mb-2">
                                    Tanggal Perjalanan
                                </small>

                                <div class="fw-semibold">

                                    {{ \Carbon\Carbon::parse($trip->departure_date)->translatedFormat('d F Y') }}
                                    →
                                    {{ \Carbon\Carbon::parse($trip->return_date)->translatedFormat('d F Y') }}

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Summary Card -->
                    <div class="card border-0 bg-light rounded-4 mt-4">

                        <div class="card-body p-4">

                            <div class="row text-center">

                                <!-- Total Hari -->
                                <div class="col-md-4 mb-3 mb-md-0">

                                    <div class="border rounded-4 bg-white p-4 h-100">

                                        <div class="text-muted small mb-2">
                                            Total Hari
                                        </div>

                                        <div class="fw-bold fs-3 text-primary">
                                            {{ $trip->duration_days }}
                                        </div>

                                        <small class="text-muted">
                                            Hari
                                        </small>

                                    </div>

                                </div>

                                <!-- Jarak -->
                                <div class="col-md-4 mb-3 mb-md-0">

                                    <div class="border rounded-4 bg-white p-4 h-100">

                                        <div class="text-muted small mb-2">
                                            Jarak Tempuh
                                        </div>

                                        <div class="fw-bold fs-3 text-success">
                                            {{ number_format($trip->distance_km, 0) }}
                                        </div>

                                        <small class="text-muted">
                                            KM
                                        </small>

                                    </div>

                                </div>

                                <!-- Uang Saku -->
                                <div class="col-md-4">

                                    <div class="border rounded-4 bg-white p-4 h-100">

                                        <div class="text-muted small mb-2">
                                            Total Uang Saku
                                        </div>

                                        <div class="fw-bold fs-4 text-danger">

                                            {{ $trip->currency }}

                                            {{ number_format($trip->total_allowence, 0, ',', '.') }}

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Footer -->
                <div class="modal-footer border-0 px-4 pb-4">

                    <!-- Reject -->
                    <button
                        type="submit"
                        name="status"
                        value="REJECTED"
                        class="btn btn-outline-danger px-4"
                    >
                        <i class="bi bi-x-circle me-1"></i>
                        Reject
                    </button>

                    <!-- Approve -->
                    <button
                        type="submit"
                        name="status"
                        value="APPROVED"
                        class="btn btn-success px-4"
                    >
                        <i class="bi bi-check-circle me-1"></i>
                        Approve
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>