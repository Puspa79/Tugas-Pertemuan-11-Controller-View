<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Perpustakaan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
        }
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.06);
        }
        .btn {
            border-radius: 10px;
            font-weight: 500;
        }
        .table {
            border-radius: 12px;
            overflow: hidden;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-gradient fs-4 d-flex align-items-center" href="/perpustakaan">
                <span class="text-info">Perpus</span><span class="text-white">Core</span>
            </a>
            <button class="navbar-collapse-target navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2">
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ Request::is('perpustakaan') ? 'active text-info fw-bold' : '' }}" href="/perpustakaan">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ Request::is('anggota*') ? 'active text-info fw-bold' : '' }}" href="/anggota">Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ Request::is('kategori*') ? 'active text-info fw-bold' : '' }}" href="/kategori">Kategori</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5 flex-grow-1">
        @yield('content')
    </div>

    <footer class="bg-white text-center py-4 mt-auto border-top text-muted">
        <div class="container">
            <small>&copy; 2026 PerpusCore. Dibuat dengan ❤️ untuk Tugas Pemrograman Web.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>