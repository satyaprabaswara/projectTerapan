<x-app-layout>

    <div class="d-flex min-vh-100 bg-light">

        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Main Content -->
        <main class="flex-grow-1 p-4">

            <!-- Header -->
            <div class="mb-4">

                <h1 class="fw-bold"
                    style="font-size: 40px;">

                    👤 Tambah Pengguna

                </h1>

                <p class="text-muted fs-5 mb-0">

                    Hanya admin yang bisa membuat user baru

                </p>

            </div>

            <!-- Card Form -->
            <div class="bg-white rounded-5 shadow-sm border p-5"
                 style="max-width: 750px;">

                <!-- Title -->
                <div class="mb-4">

                    <h3 class="fw-bold text-dark">

                        Form Tambah Pengguna

                    </h3>

                    <p class="text-muted mb-0">

                        Isi data pengguna lalu klik tombol simpan

                    </p>

                </div>

                <!-- Form -->
                <form method="POST"
                      action="{{ route('users.store') }}">

                    @csrf

                    <!-- Nama -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control rounded-4 py-3 px-4"
                            placeholder="Masukkan nama pengguna"
                            required>

                        @error('name')

                            <div class="text-danger small mt-2">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- Email -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control rounded-4 py-3 px-4"
                            placeholder="Masukkan email"
                            required>

                        @error('email')

                            <div class="text-danger small mt-2">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- Password -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control rounded-4 py-3 px-4"
                            placeholder="Masukkan password"
                            required>

                        @error('password')

                            <div class="text-danger small mt-2">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            Konfirmasi Password

                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control rounded-4 py-3 px-4"
                            placeholder="Ulangi password"
                            required>

                    </div>

                    <!-- Role -->
                    <div class="mb-5">

                        <label class="form-label fw-semibold">

                            Role Pengguna

                        </label>

                        <select
                            name="role"
                            class="form-select rounded-4 py-3 px-4"
                            required>

                            <option value="admin"
                                {{ old('role') == 'admin' ? 'selected' : '' }}>

                                👑 Admin

                            </option>

                            <option value="viewer"
                                {{ old('role') == 'viewer' ? 'selected' : '' }}>

                                👀 Viewer

                            </option>

                        </select>

                        @error('role')

                            <div class="text-danger small mt-2">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                    <!-- Button -->
                    <div class="d-flex gap-3">

                        <button
                            type="submit"
                            class="btn btn-success rounded-4 px-5 py-3 fw-semibold shadow-sm">

                            ✅ Simpan

                        </button>

                        <a href="{{ route('users.index') }}"
                           class="btn btn-light border rounded-4 px-5 py-3 fw-semibold">

                            ❌ Batal

                        </a>

                    </div>

                </form>

            </div>

        </main>

    </div>

</x-app-layout>