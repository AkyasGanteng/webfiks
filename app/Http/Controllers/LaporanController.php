<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\PemasukanStok;   // Ubah ini
use App\Models\PengeluaranStok; // Ubah ini
use Carbon\Carbon;

class LaporanController extends Controller
{
    // Tampilkan dashboard laporan utama
    public function index(Request $request)
    {
        // Filter periode dari request, default bulan ini
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));

        // Stok tersedia per barang
        $items = Item::select('id', 'nama_barang', 'stok', 'tanggal_kadaluarsa')
            ->orderBy('stok', 'asc')
            ->get();

        // Barang masuk per periode
        $pemasukans = PemasukanStok::whereBetween('tanggal_masuk', [$startDate, $endDate])
            ->with('item')
            ->get();

        // Barang keluar per periode
        $pengeluarans = PengeluaranStok::whereBetween('tanggal_keluar', [$startDate, $endDate])
            ->with('item')
            ->get();

        // Barang hampir kadaluarsa (misal: kurang dari 30 hari)
        $nearExpireItems = Item::where('tanggal_kadaluarsa', '<=', Carbon::now()->addDays(30))
            ->where('stok', '>', 0)
            ->get();

        // Barang habis (stok 0 atau kurang)
        $outOfStockItems = Item::where('stok', '<=', 0)->get();

        return view('laporan.index', compact(
            'items', 'pemasukans', 'pengeluarans', 'nearExpireItems', 'outOfStockItems', 'startDate', 'endDate'
        ));
    }
}
