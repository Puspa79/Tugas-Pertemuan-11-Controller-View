@extends('layouts.app')
@section('title', 'Daftar Anggota Perpustakaan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-dark mb-1">Manajemen Anggota</h2>
        <p class="text-muted mb-0">Kelola dan lihat informasi keanggotaan aktif perpustakaan.</p>
    </div>
</div>

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 text-nowrap">
            <thead class="table-light">
                <tr class="text-uppercase tracking-wider text-muted small">
                    <th class="ps-4">No</th>
                    <th>Kode Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggota_list as $index => $agt)
                <tr>
                    <td class="ps-4 fw-medium text-muted">{{ $index + 1 }}</td>
                    <td><span class="badge bg-light text-dark border px-2.5 py-2">{{ $agt['kode'] }}</span></td>
                    <td>
                        <div class="fw-bold text-dark">{{ $agt['nama'] }}</div>
                    </td>
                    <td class="text-muted">{{ $agt['email'] }}</td>
                    <td>
                        <span class="badge rounded-pill px-3 py-2 {{ $agt['status'] == 'Aktif' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                            ● {{ $agt['status'] }}
                        </span>
                    </td>
                    <td class="text-end pe-4">
                        <a href="{{ route('anggota.show', $agt['id']) }}" class="btn btn-sm btn-outline-primary px-3 shadow-sm">
                            Lihat Profil
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection