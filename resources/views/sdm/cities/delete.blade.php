<!-- Modal Delete Kota -->
<div
    class="modal fade"
    id="deleteCityModal{{ $city->id }}"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

            <form
                action="{{ route('sdm.cities.delete', $city->id) }}"
                method="POST"
            >

                @csrf
                @method('DELETE')

                <!-- Header -->
                <div class="modal-header border-0 bg-danger text-white">

                    <h5 class="modal-title fw-semibold">
                        Hapus Data Kota
                    </h5>

                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                    ></button>

                </div>

                <!-- Body -->
                <div class="modal-body text-center py-4">

                    <div class="mb-3">

                        <div
                            class="d-inline-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10"
                            style="width: 80px; height: 80px;"
                        >

                            <i
                                class="bi bi-trash text-danger"
                                style="font-size: 2rem;"
                            ></i>

                        </div>

                    </div>

                    <h5 class="fw-bold mb-2">
                        Yakin ingin menghapus?
                    </h5>

                    <p class="text-muted mb-1">
                        Data kota berikut akan dihapus:
                    </p>

                    <div class="fw-semibold fs-5">
                        {{ $city->name }}
                    </div>

                    <small class="text-muted">
                        {{ $city->province }} - {{ $city->island }}
                    </small>

                </div>

                <!-- Footer -->
                <div class="modal-footer border-0 justify-content-center pb-4">

                    <button
                        type="button"
                        class="btn btn-light px-4"
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="btn btn-danger px-4"
                    >
                        <i class="bi bi-trash me-1"></i>
                        Hapus
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>