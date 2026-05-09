<!-- Modal Tambah Pengajuan Perdin -->
<div
    class="modal fade"
    id="createBusinessTripModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <form
                action="{{ route('employee.business.trips.create') }}"
                method="POST"
            >

                @csrf

                <!-- Header -->
                <div
                    class="modal-header border-0 px-4 py-3"
                    style="background: linear-gradient(135deg, #0d6efd, #2563eb);"
                >

                    <div>

                        <h5 class="modal-title text-white fw-bold mb-1">
                            Pengajuan Perjalanan Dinas
                        </h5>

                        <small class="text-white-50">
                            Lengkapi data pengajuan perjalanan dinas pegawai
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

                    <div class="row">

                        <!-- Maksud Tujuan -->
                        <div class="col-12 mb-4">

                            <label class="form-label fw-semibold">
                                Maksud / Tujuan Perdin
                            </label>

                            <textarea
                                name="purpose"
                                rows="4"
                                class="form-control"
                                placeholder="Contoh: Menghadiri meeting koordinasi proyek di Bandung"
                                required
                            ></textarea>

                        </div>

                        <!-- Kota Asal -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Kota Asal
                            </label>

                            <select
                                name="origin_city_id"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Kota Asal --
                                </option>

                                @foreach($cities as $city)

                                    <option value="{{ $city->id }}">
                                        {{ $city->name }}
                                        -
                                        {{ $city->province }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Kota Tujuan -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Kota Tujuan
                            </label>

                            <select
                                name="destination_city_id"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    -- Pilih Kota Tujuan --
                                </option>

                                @foreach($cities as $city)

                                    <option value="{{ $city->id }}">
                                        {{ $city->name }}
                                        -
                                        {{ $city->province }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Tanggal Berangkat -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Tanggal Berangkat
                            </label>

                            <input
                                type="date"
                                name="departure_date"
                                id="departure_date"
                                class="form-control"
                                required
                            >

                        </div>

                        <!-- Tanggal Pulang -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Tanggal Pulang
                            </label>

                            <input
                                type="date"
                                name="return_date"
                                id="return_date"
                                class="form-control"
                                required
                            >

                        </div>

                        <!-- Durasi Perjalanan -->
                        <div class="row justify-content-center">
                            <div class="col-8 mb-4">
    
                                <div
                                    class="card border-0 shadow-sm rounded-4 bg-light"
                                >
    
                                    <div class="card-body p-4">
    
                                        <div class="d-flex align-items-center mb-3">
    
                                            <div
                                                class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center me-3"
                                                style="width: 55px; height: 55px;"
                                            >
    
                                                <i
                                                    class="bi bi-calendar-week text-primary fs-4"
                                                ></i>
    
                                            </div>
    
                                            <div>
    
                                                <h6 class="fw-bold mb-1">
                                                    Durasi Perjalanan Dinas
                                                </h6>
    
                                                <small class="text-muted">
                                                    Durasi otomatis dihitung berdasarkan tanggal keberangkatan dan kepulangan
                                                </small>
    
                                            </div>
    
                                        </div>
    
                                        <div class="row text-center justify-content-center">
    
                                            <!-- Total Hari -->
                                            <div class="col-md-12 mb-3 mb-md-0">
    
                                                <div
                                                    class="border rounded-4 p-3 bg-primary text-white h-100"
                                                >
    
                                                    <small class="d-block mb-2 text-white-50">
                                                        Total Durasi
                                                    </small>
    
                                                    <div class="fs-3" id="duration_result">
                                                        0 Hari
                                                    </div>
    
                                                </div>
    
                                            </div>
    
                                        </div>
    
                                    </div>
    
                                </div>
    
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Footer -->
                <div class="modal-footer border-0 px-4 pb-4">

                    <button
                        type="button"
                        class="btn btn-light px-4"
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary px-4"
                    >
                        <i class="bi bi-send me-1"></i>
                        Ajukan Perdin
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

    const departureDate = document.getElementById('departure_date');
    const returnDate = document.getElementById('return_date');
    const durationResult = document.getElementById('duration_result');

    function calculateDuration() {

        const departure = new Date(departureDate.value);
        const returning = new Date(returnDate.value);

        // cek apakah kedua tanggal sudah dipilih
        if (
            departureDate.value &&
            returnDate.value
        ) {

            // hitung selisih milisecond
            const diffTime = returning - departure;

            // convert ke hari
            const diffDays = Math.floor(
                diffTime / (1000 * 60 * 60 * 24)
            ) + 1;

            // validasi jika tanggal pulang < tanggal berangkat
            if (diffDays <= 0) {

                durationResult.innerHTML = 'Tanggal Tidak Valid';

                return;
            }

            durationResult.innerHTML = diffDays + ' Hari';

        } else {

            durationResult.innerHTML = '0 Hari';

        }
    }

    departureDate.addEventListener(
        'change',
        calculateDuration
    );

    returnDate.addEventListener(
        'change',
        calculateDuration
    );

</script>