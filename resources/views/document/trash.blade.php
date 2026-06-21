<x-app-layout>

<div class="d-flex bg-light min-vh-100">

    @include('components.sidebar')

    <div class="flex-grow-1 p-4">

        <h1 class="fw-bold mb-4">
            Sampah Dokumen
        </h1>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>Nama Dokumen</th>

                            @if(Auth::user()->role === 'admin')
                                <th>Dihapus Oleh</th>
                            @endif

                            <th>Dihapus Pada</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>

                    <tbody>

                    @forelse($documents as $document)

                      <tr>

                        <td>
                            {{ $document->nama_dokumen }}
                        </td>

                        @if(Auth::user()->role === 'admin')
                        <td>
                            {{ $document->user->name ?? '-' }}
                        </td>
                        @endif

                        <td>
                            {{ $document->deleted_at->format('d M Y H:i') }}
                        </td>

                        <td>

                            <div class="d-flex gap-2">

                                <form
                                    action="{{ route('document.restore',$document->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('PUT')

                                    <button
                                        class="btn btn-success btn-sm">

                                        Restore

                                    </button>

                                </form>

                                <form
                                    action="{{ route('document.forceDelete',$document->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus permanen?')">

                                        Hapus Permanen

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                Sampah kosong
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