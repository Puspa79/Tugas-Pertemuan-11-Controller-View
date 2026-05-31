<?php

use Illuminate\Support\Facades\Route;
use App\Models\Buku;
use App\Models\Anggota;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;

Route::get('/buku/search', [BukuController::class, 'search']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Kode Route Anda yang baru di bawah silakan dilanjutkan dari sini...
Route::get('/test-accessor-scope', function () {
   // Memuat CSS Bootstrap & FontAwesome untuk icon yang lebih interaktif
    $html = '
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Testing Accessor & Scope - Pertemuan 10</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            body { background-color: #f4f6f9; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; }
            .main-title { font-weight: 700; letter-spacing: 1px; }
            .card { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); margin-bottom: 25px; }
            .card-header { font-weight: 600; border-top-left-radius: 12px !important; border-top-right-radius: 12px !important; }
            .table { margin-bottom: 0; }
            .badge { padding: 6px 12px; font-weight: 600; }
            .list-group-item { border-left: 4px solid #6c757d; }
            .list-buku-baru { border-left-color: #0d6efd; }
            .list-stok-tipis { border-left-color: #dc3545; }
            .list-anggota-baru { border-left-color: #198754; }
        </style>
    </head>
    <body>
    <div class="container py-5">
        
        <div class="p-4 mb-5 bg-white text-dark rounded-4 shadow-sm d-flex align-items-center justify-content-between">
            <div>
                <h1 class="main-title text-primary m-0"><i class="fa-solid fa-gauge-high me-2"></i> Dashboard Testing</h1>
                <p class="text-muted m-0 mt-1">Implementasi Eloquent Accessor & Query Scopes Tugas Pertemuan 10</p>
            </div>
            <span class="badge bg-primary fs-6 rounded-pill">Puspa Dwi Setyorini</span>
        </div>

        <div class="row">
            
            <div class="col-lg-6">
                
                <div class="card">
                    <div class="card-header bg-dark text-white d-flex align-items-center">
                        <i class="fa-solid fa-book me-2"></i> 1. Data Buku & Accessor Status Stok
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul Buku</th>
                                    <th class="text-center">Stok</th>
                                    <th>Status Badge</th>
                                    <th>Label</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach (Buku::all() as $buku) {
                                $html .= '<tr>
                                            <td class="fw-semibold text-secondary">' . $buku->judul . '</td>
                                            <td class="text-center"><span class="badge bg-secondary rounded-pill">' . $buku->stok . '</span></td>
                                            <td>' . $buku->status_stok_badge . '</td>
                                            <td><span class="badge bg-dark"><i class="fa-solid fa-tag me-1 small"></i> ' . $buku->tahun_label . '</span></td>
                                          </tr>';
                            }
    $html .= '              </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <i class="fa-solid fa-fire me-2"></i> 2. Buku Terbaru (Scope Terbaru &ge; 2024)
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">';
                        foreach (Buku::terbaru()->get() as $buku) {
                            $html .= '<div class="list-group-item list-buku-baru d-flex justify-content-between align-items-center">
                                        <span>' . $buku->judul . '</span>
                                        <span class="text-muted small"><i class="fa-regular fa-calendar me-1"></i> ' . $buku->tahun_terbit . '</span>
                                      </div>';
                        }
    $html .= '          </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i> 3. Buku Stok Menipis (Scope Stok &lt; 5)
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">';
                        foreach (Buku::stokMenipis()->get() as $buku) {
                            $html .= '<div class="list-group-item list-stok-tipis d-flex justify-content-between align-items-center">
                                        <span>' . $buku->judul . '</span>
                                        <span class="badge bg-danger-subtle text-danger">Sisa: ' . $buku->stok . '</span>
                                      </div>';
                        }
    $html .= '          </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                
                <div class="card">
                    <div class="card-header bg-dark text-white d-flex align-items-center">
                        <i class="fa-solid fa-users me-2"></i> 4. Data Anggota, Status & Kategori Usia
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Anggota</th>
                                    <th>Umur</th>
                                    <th>Kategori Usia</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach (Anggota::all() as $agt) {
                                $html .= '<tr>
                                            <td class="fw-semibold text-secondary">' . $agt->nama . '</td>
                                            <td>' . $agt->umur . ' Tahun</td>
                                            <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle"><i class="fa-solid fa-user-clock me-1 small"></i> ' . $agt->kategori_usia . '</span></td>
                                            <td>' . $agt->status_badge . '</td>
                                          </tr>';
                            }
    $html .= '              </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-success text-white">
                        <i class="fa-solid fa-user-plus me-2"></i> 5. Anggota Baru (Scope Terdaftar Bulan Ini)
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">';
                        $anggotaBulanIni = Anggota::terdaftarBulanIni()->get();
                        if($anggotaBulanIni->isEmpty()){
                            $html .= '<div class="list-group-item text-center text-muted py-3"><em>Tidak ada anggota baru terdaftar bulan ini.</em></div>';
                        } else {
                            foreach ($anggotaBulanIni as $agt) {
                                $html .= '<div class="list-group-item list-anggota-baru d-flex justify-content-between align-items-center">
                                            <span>' . $agt->nama . '</span>
                                            <span class="text-muted small"><i class="fa-regular fa-clock me-1"></i> ' . $agt->created_at->format('d M Y') . '</span>
                                          </div>';
                            }
                        }
    $html .= '          </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>';

    return $html;
});