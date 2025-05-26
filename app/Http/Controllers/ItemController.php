<?php

// app/Http/Controllers/ItemController.php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Tampil semua barang
    public function index()
    {
        $items = Item::orderBy('nama_barang')->paginate(10);
        return view('items.index', compact('items'));
    }

    // Form tambah barang baru
    public function create()
    {
        return view('items.create');
    }

    // Simpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'stok' => 'required|integer|min:0',
            'harga_beli' => 'nullable|numeric|min:0',
            'harga_jual' => 'nullable|numeric|min:0',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_kadaluarsa' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan');
    }

    // Form edit barang
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    // Update barang
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'stok' => 'required|integer|min:0',
            'harga_beli' => 'nullable|numeric|min:0',
            'harga_jual' => 'nullable|numeric|min:0',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_kadaluarsa' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Barang berhasil diperbarui');
    }

    // Hapus barang
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus');
    }
}
