<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranStok;
use App\Models\Item;
use Illuminate\Http\Request;

class PengeluaranStokController extends Controller
{
    public function index()
    {
        $pengeluarans = PengeluaranStok::with('item')->latest()->get();
        return view('pengeluaran.index', compact('pengeluarans'));
    }

    public function create()
    {
        $items = Item::all();
        return view('pengeluaran.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        $item = Item::findOrFail($request->item_id);

        if ($item->stok < $request->jumlah_keluar) {
            return back()->with('error', 'Stok tidak mencukupi.');
        }

        PengeluaranStok::create($request->all());

        $item->decrement('stok', $request->jumlah_keluar);

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil ditambahkan.');
    }

    public function edit(PengeluaranStok $pengeluaran)
    {
        $items = Item::all();
        return view('pengeluaran.edit', compact('pengeluaran', 'items'));
    }

    public function update(Request $request, PengeluaranStok $pengeluaran)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'jumlah_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        $item = Item::findOrFail($request->item_id);
        $selisih = $request->jumlah_keluar - $pengeluaran->jumlah_keluar;

        if ($selisih > 0 && $item->stok < $selisih) {
            return back()->with('error', 'Stok tidak mencukupi.');
        }

        $pengeluaran->update($request->all());
        $item->decrement('stok', $selisih);

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran diperbarui.');
    }

    public function destroy(PengeluaranStok $pengeluaran)
    {
        $pengeluaran->item->increment('stok', $pengeluaran->jumlah_keluar);
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran dihapus.');
    }
}
