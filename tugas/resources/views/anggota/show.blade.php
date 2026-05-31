@extends('layouts.app')
@section('title', 'Profil Anggota - ' . $anggota['nama'])

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6col-lg-5">
        <div class="card p-0 shadow-lg border-0 overflow-hidden mb-5">
            <div class="bg-primary" style="height: 100px;"></div>
            
            <div class="card-body p-4 text-center position-relative">
                <div class="mb-3 position-relative d-inline-block" style="margin-top: -50px; z-index: 2;">
                    <div class="bg-white rounded-circle p-2 shadow">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" 
                             style="width: 80px; height: 80px; font-size: 32px; border: 4px solid #fff;">
                            {{ strtoupper(substr($anggota['nama'], 0, 1)) }}
                        </div>
                    </div>
                </div>
                
                <h3 class="fw-bold mb-1 mt-2">{{ $anggota['nama'] }}</h3>
                <span class="badge bg-secondary mb-4 px-3 py-2 fw-medium">{{ $anggota['kode'] }}</span>
                
                <hr class="text-muted opacity-25 mb-4">
                
                <div class="text-start px-2">
                    <div class="mb-3 p-3 bg-light rounded-3 border">
                        <small class="text-muted d-block text-uppercase fw-semibold tracking-wider" style="font-size: 11px;">Alamat Email</small>
                        <span class="fw-medium text-dark fs-6">{{ $anggota['email'] }}</span>
                    </div>
                    <div class="mb-3 p-3 bg-light rounded-3 border">
                        <small class="text-muted d-block text-uppercase fw-semibold tracking-wider" style="font-size: 11px;">Nomor Telepon</small>
                        <span class="fw-medium text-dark fs-6">{{ $anggota['telepon'] }}</span>
                    </div>
                    <div class="mb-3 p-3 bg-light rounded-3 border">
                        <small class="text-muted d-block text-uppercase fw-semibold tracking-wider" style="font-size: 11px;">Kota Domisili</small>
                        <span class="fw-medium text-dark fs-6">{{ $anggota['alamat'] }}</span>
                    </div>
                    <div class="mb-3 p-3 bg-light rounded-3 border d-flex align-items-center justify-content-between">
                        <small class="text-muted text-uppercase fw-semibold tracking-wider mb-0" style="font-size: 11px;">Status Keanggotaan</small>
                        <span class="badge rounded-pill px-3 py-2 fw-bold {{ $anggota['status'] == 'Aktif' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                            ● {{ $anggota['status'] }}
                        </span>
                    </div>
                </div>
                
                <div class="d-grid mt-5">
                    <a href="{{ route('anggota.index') }}" class="btn btn-light border py-2.5 text-muted fw-medium shadow-sm hover-elevate">
                        ← Kembali ke Daftar Anggota</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection