use Illuminate\Http\Request;
use App\Models\Buku;

public function search(Request $request)
{
    $query = Buku::query();
    
    // 1. Filter berdasarkan Keyword (Judul, Pengarang, Penerbit)
    if ($request->has('keyword') && $request->keyword != '') {
        $query->where(function($q) use ($request) {
            $q->where('judul', 'like', '%' . $request->keyword . '%')
              ->orWhere('pengarang', 'like', '%' . $request->keyword . '%')
              ->orWhere('penerbit', 'like', '%' . $request->keyword . '%');
        });
    }

    // 2. Filter berdasarkan Kategori
    if ($request->has('kategori') && $request->kategori != '') {
        $query->where('kategori', $request->kategori);
    }

    // 3. Filter berdasarkan Tahun
    if ($request->has('tahun') && $request->tahun != '') {
        $query->where('tahun', $request->tahun);
    }

    // 4. Filter berdasarkan Ketersediaan
    if ($request->has('ketersediaan') && $request->ketersediaan != '') {
        if ($request->ketersediaan == 'Tersedia') {
            $query->where('stok', '>', 0);
        } elseif ($request->ketersediaan == 'Habis') {
            $query->where('stok', 0);
        }
    }
    
    $bukus = $query->latest()->get();
    return view('buku.index', compact('bukus'));
}