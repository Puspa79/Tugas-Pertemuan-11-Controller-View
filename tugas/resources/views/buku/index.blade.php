<form action="/buku/search" method="GET" class="bg-gray-100 p-4 rounded-lg mb-6 grid grid-cols-1 md:grid-cols-5 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Keyword</label>
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Judul, pengarang, penerbit..." class="w-full p-2 border rounded">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Kategori</label>
        <select name="kategori" class="w-full p-2 border rounded">
            <option value="">Semua Kategori</option>
            <option value="Novel" {{ request('kategori') == 'Novel' ? 'selected' : '' }}>Novel</option>
            <option value="Sains" {{ request('kategori') == 'Sains' ? 'selected' : '' }}>Sains</option>
            <option value="Komputer" {{ request('kategori') == 'Komputer' ? 'selected' : '' }}>Komputer</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Tahun</label>
        <select name="tahun" class="w-full p-2 border rounded">
            <option value="">Semua Tahun</option>
            @for($year = date('Y'); $year >= 2010; $year--)
                <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endfor
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Ketersediaan</label>
        <select name="ketersediaan" class="w-full p-2 border rounded">
            <option value="Semua" {{ request('ketersediaan') == 'Semua' ? 'selected' : '' }}>Semua</option>
            <option value="Tersedia" {{ request('ketersediaan') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="Habis" {{ request('ketersediaan') == 'Habis' ? 'selected' : '' }}>Habis</option>
        </select>
    </div>

    <div class="flex items-end">
        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Cari & Filter</button>
    </div>
</form>