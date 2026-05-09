<!-- Modal Edit Kota -->
<div
    class="modal fade"
    id="editCityModal{{ $city->id }}"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

            <form
                action="{{ route('sdm.cities.update', $city->id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <!-- Header -->
                <div
                    class="modal-header border-0 px-4 py-3"
                    style="background: linear-gradient(135deg, #f59e0b, #fbbf24);"
                >

                    <div>

                        <h5 class="modal-title text-white fw-bold mb-1">
                            Update Data Kota
                        </h5>

                        <small class="text-white-50">
                            Perbarui data master kota
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

                        <!-- Nama Kota -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Nama Kota
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light">
                                    <i class="bi bi-buildings"></i>
                                </span>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ $city->name }}"
                                    required
                                >

                            </div>

                        </div>

                        <!-- Provinsi -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Provinsi
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light">
                                    <i class="bi bi-geo-alt"></i>
                                </span>

                                <input
                                    type="text"
                                    name="province"
                                    class="form-control"
                                    value="{{ $city->province }}"
                                    required
                                >

                            </div>

                        </div>

                        <!-- Latitude -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Latitude
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light">
                                    <i class="bi bi-pin-map"></i>
                                </span>

                                <input
                                    type="text"
                                    name="latitude"
                                    class="form-control"
                                    value="{{ $city->latitude }}"
                                    required
                                >

                            </div>

                        </div>

                        <!-- Longitude -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Longitude
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light">
                                    <i class="bi bi-pin-map-fill"></i>
                                </span>

                                <input
                                    type="text"
                                    name="longitude"
                                    class="form-control"
                                    value="{{ $city->longitude }}"
                                    required
                                >

                            </div>

                        </div>

                        <!-- Pulau -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold">
                                Pulau
                            </label>

                            <select
                                name="island"
                                class="form-select"
                                required
                            >

                                <option value="Jawa" {{ $city->island == 'Jawa' ? 'selected' : '' }}>
                                    Jawa
                                </option>

                                <option value="Sumatera" {{ $city->island == 'Sumatera' ? 'selected' : '' }}>
                                    Sumatera
                                </option>

                                <option value="Kalimantan" {{ $city->island == 'Kalimantan' ? 'selected' : '' }}>
                                    Kalimantan
                                </option>

                                <option value="Sulawesi" {{ $city->island == 'Sulawesi' ? 'selected' : '' }}>
                                    Sulawesi
                                </option>

                                <option value="Papua" {{ $city->island == 'Papua' ? 'selected' : '' }}>
                                    Papua
                                </option>

                                <option value="Bali" {{ $city->island == 'Bali' ? 'selected' : '' }}>
                                    Bali
                                </option>

                                <option value="Nusa Tenggara" {{ $city->island == 'Nusa Tenggara' ? 'selected' : '' }}>
                                    Nusa Tenggara
                                </option>

                                <option value="Maluku" {{ $city->island == 'Maluku' ? 'selected' : '' }}>
                                    Maluku
                                </option>

                            </select>

                        </div>

                        <!-- Luar Negeri -->
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-semibold d-block">
                                Luar Negeri
                            </label>

                            <div class="d-flex gap-4 mt-2">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="is_foreign"
                                        value="1"
                                        id="foreignYes{{ $city->id }}"
                                        {{ $city->is_foreign ? 'checked' : '' }}
                                    >

                                    <label
                                        class="form-check-label"
                                        for="foreignYes{{ $city->id }}"
                                    >
                                        Ya
                                    </label>

                                </div>

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="is_foreign"
                                        value="0"
                                        id="foreignNo{{ $city->id }}"
                                        {{ !$city->is_foreign ? 'checked' : '' }}
                                    >

                                    <label
                                        class="form-check-label"
                                        for="foreignNo{{ $city->id }}"
                                    >
                                        Tidak
                                    </label>

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
                        class="btn btn-warning text-white px-4"
                    >
                        <i class="bi bi-save me-1"></i>
                        Update Data
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>