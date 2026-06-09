<x-app-layout>

<div class="d-flex">

    @include('components.sidebar')

    <div class="container-fluid p-4">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Pengaturan Sistem</h4>
            </div>

            <div class="card-body">

                <form>

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Perusahaan
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="PT SPR Langgak">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Sistem
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="Sistem Dokumentasi Digitalisasi Divisi Finance">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Email Administrator
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            value="{{ Auth::user()->email }}">

                    </div>

                    <button
                        type="button"
                        class="btn btn-success">

                        Simpan Pengaturan

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>