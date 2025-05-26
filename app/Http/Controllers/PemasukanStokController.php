<?php

namespace App\Http\Controllers;

use App\Models\PemasukanStok;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemasukanStokController extends Controller
{
    // Tampilkan daftar pemasukan stok
    public function index()
    {
        $pemasukan = PemasukanStok::with('item')->latest()->paginate(10);
        return view('pemasukan.index', compact('pemasukan'));
    }

    // Tampilkan form tambah pemasukan stok baru
    public function create()
    {
        $items = Item::all();
        return view('pemasukan.create', compact('items'));
    }

    // Simpan data pemasukan stok baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'jumlah_masuk' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        DB::transaction(function() use ($validated) {
            // Simpan pemasukan stok
            $pemasukan = PemasukanStok::create($validated);

            // Update stok item otomatis
            $item = Item::findOrFail($validated['item_id']);
            $item->stok += $validated['jumlah_masuk'];
            $item->save();
        });

        return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan stok berhasil ditambahkan');
    }

    // Tampilkan form edit data pemasukan stok
    public function edit($id)
    {
        $pemasukan = PemasukanStok::findOrFail($id);
        $items = Item::all();
        return view('pemasukan.edit', compact('pemasukan', 'items'));
    }

    // Update data pemasukan stok
    public function update(Request $request, $id)
    {
        $pemasukan = PemasukanStok::findOrFail($id);

        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'jumlah_masuk' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        DB::transaction(function() use ($pemasukan, $validated) {
            $oldJumlah = $pemasukan->jumlah_masuk;
            $oldItemId = $pemasukan->item_id;

            // Cek stok barang lama jika item diganti
            if ($oldItemId != $validated['item_id']) {
                $oldItem = Item::findOrFail($oldItemId);
                if ($oldItem->stok < $oldJumlah) {
                    throw new \Exception('Stok barang lama tidak cukup untuk dikurangi.');
                }
            } else {
                // Cek jika pengurangan stok akan menyebabkan negatif
                $selisih = $validated['jumlah_masuk'] - $oldJumlah;
                $item = Item::findOrFail($validated['item_id']);
                if ($selisih < 0 && $item->stok < abs($selisih)) {
                    throw new \Exception('Stok barang tidak cukup untuk dikurangi.');
                }
            }

            // Update pemasukan stok
            $pemasukan->update($validated);

            // Update stok item
            if ($oldItemId != $validated['item_id']) {
                // Kurangi stok item lama
                $oldItem->stok -= $oldJumlah;
                $oldItem->save();

                // Tambah stok item baru
                $newItem = Item::findOrFail($validated['item_id']);
                $newItem->stok += $validated['jumlah_masuk'];
                $newItem->save();
            } else {
                // Update stok item yang sama dengan selisih jumlah
                $selisih = $validated['jumlah_masuk'] - $oldJumlah;
                $item = Item::findOrFail($validated['item_id']);
                $item->stok += $selisih;
                $item->save();
            }
        });

        return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan stok berhasil diperbarui');
    }

    // Hapus data pemasukan stok
    public function destroy($id)
    {
        $pemasukan = PemasukanStok::findOrFail($id);

        DB::transaction(function() use ($pemasukan) {
            $item = Item::findOrFail($pemasukan->item_id);

            if ($item->stok < $pemasukan->jumlah_masuk) {
                throw new \Exception('Gagal menghapus karena stok barang akan negatif.');
            }

            $item->stok -= $pemasukan->jumlah_masuk;
            $item->save();

            $pemasukan->delete();
        });

        return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan stok berhasil dihapus');
    }
}
