<x-app-layout>

<div class="d-flex bg-light min-vh-100">

    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h1 class="fw-bold mb-1"
                    style="font-size: 42px;">

                    📝 Log Aktivitas

                </h1>

                <p class="text-muted fs-5 mb-0">
                    Riwayat semua aktivitas yang terjadi dalam sistem.
                </p>

            </div>

            <!-- Filter -->
            <div>

                <form method="GET">

                <div class="d-flex gap-2">

                    <input
                        type="date"
                        name="date"
                        value="{{ request('date') }}"
                        class="form-control rounded-4 shadow-sm">

                    <button
                        type="submit"
                        class="btn btn-primary rounded-4 px-4">

                        Filter

                    </button>

                    <a
                        href="{{ route('activity.logs') }}"
                        class="btn bg-white border rounded-4 px-4 shadow-sm">

                        Semua

                    </a>

                </div>

            </form>

            </div>

        </div>

        <!-- Card -->
        <div class="bg-white rounded-5 shadow-sm overflow-hidden border">

            <!-- Table -->
            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead class="border-bottom">

                        <tr class="text-secondary">

                            <th class="px-4 py-4 fw-semibold">
                                User
                            </th>

                            <th class="px-4 py-4 fw-semibold">
                                Aktivitas
                            </th>

                            <th class="px-4 py-4 fw-semibold">
                                Dokumen
                            </th>

                            <th class="px-4 py-4 fw-semibold">
                                Waktu
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($logs as $log)

                            @php

                                $action = strtolower($log->action ?? '');

                                if(str_contains($action,'upload') || str_contains($action,'created')){

                                    $badge = 'bg-success-subtle text-success';
                                    $icon = '⬆️';
                                    $title = 'Upload Dokumen';
                                    $subtitle = 'Mengunggah dokumen baru';

                                }

                                elseif(str_contains($action,'download')){

                                    $badge = 'bg-primary-subtle text-primary';
                                    $icon = '⬇️';
                                    $title = 'Download Dokumen';
                                    $subtitle = 'Mengunduh dokumen';

                                }

                                elseif(str_contains($action,'edit') || str_contains($action,'updated')){

                                    $badge = 'bg-warning-subtle text-warning';
                                    $icon = '✏️';
                                    $title = 'Edit Dokumen';
                                    $subtitle = 'Mengubah informasi dokumen';

                                }

                                elseif(str_contains($action,'delete') || str_contains($action,'deleted')){

                                    $badge = 'bg-danger-subtle text-danger';
                                    $icon = '🗑️';
                                    $title = 'Hapus Dokumen';
                                    $subtitle = 'Menghapus dokumen';

                                }

                                else{

                                    $badge = 'bg-secondary-subtle text-secondary';
                                    $icon = '📄';
                                    $title = $log->action;
                                    $subtitle = 'Aktivitas dokumen';

                                }

                                $fileName = $log->document->nama_dokumen ?? '-';

                                $ext = pathinfo($fileName, PATHINFO_EXTENSION);

                                if($ext == 'pdf'){
                                    $fileIcon = '📕';
                                }
                                elseif($ext == 'docx' || $ext == 'doc'){
                                    $fileIcon = '📘';
                                }
                                elseif($ext == 'xlsx' || $ext == 'xls'){
                                    $fileIcon = '📗';
                                }
                                else{
                                    $fileIcon = '📄';
                                }

                            @endphp

                            <tr class="border-bottom">

                                <!-- User -->
                                <td class="px-4 py-4">

                                    <div class="d-flex align-items-center gap-3">

                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                             style="width:60px; height:60px; font-size:24px;">

                                            👤

                                        </div>

                                        <div>

                                            <div class="fw-bold fs-5">

                                                {{ $log->user?->name ?? '-' }}

                                            </div>

                                            <div class="text-muted">

                                                Administrator

                                            </div>

                                        </div>

                                    </div>

                                </td>

                                <!-- Aktivitas -->
                                <td class="px-4 py-4">

                                    <div class="d-inline-flex align-items-center gap-3 px-4 py-3 rounded-4 {{ $badge }}">

                                        <div style="font-size:24px;">

                                            {{ $icon }}

                                        </div>

                                        <div>

                                            <div class="fw-bold">

                                                {{ $title }}

                                            </div>

                                            <small>

                                                {{ $subtitle }}

                                            </small>

                                        </div>

                                    </div>

                                </td>

                                <!-- Dokumen -->
                                <td class="px-4 py-4">

                                    <div class="d-flex align-items-center gap-3">

                                        <div style="font-size:34px;">

                                            {{ $fileIcon }}

                                        </div>

                                        <div>

                                            <div class="fw-bold fs-5">

                                                {{ $fileName }}

                                            </div>

                                            <div class="text-muted">

                                                {{ $log->document->file_size ?? '-' }}

                                            </div>

                                        </div>

                                    </div>

                                </td>

                                <!-- Waktu -->
                                <td class="px-4 py-4">

                                    <div class="fw-semibold fs-5">

                                        {{ $log->created_at->diffForHumans() }}

                                    </div>

                                    <div class="text-muted">

                                        {{ $log->created_at->format('d M Y, H:i') }}

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4"
                                    class="text-center py-5 text-muted fs-5">

                                    Belum ada aktivitas.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</div>
</x-app-layout>