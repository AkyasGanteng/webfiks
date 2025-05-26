@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-lg">
    <h1 class="text-2xl font-bold mb-6">Tambah Pengeluaran Stok</h1>

    @if(session('error'))
    <div class="mb-4 p-3 bg-red-200 text-red-800 rounded">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('pengeluaran.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="item_id" class="block font-medium mb-1">Pilih Barang</label>
            <select name="item_id" id="item_id" class="w-full border border-gray-300 rounded px-3 py-2 @error('item_id') border-red-500 @enderror">
                <option value="">-- Pilih Barang --</option>
                @foreach($items as $item)
                <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->nama_barang }} (Stok: {{ $item->stok }})
                </option>
                @endforeach
            </select>
            @error('item_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="jumlah_keluar" class="block font-medium mb-1">Jumlah Keluar</label>
            <input type="number" name="jumlah_keluar" id="jumlah_keluar" min="1" value="{{ old('jumlah_keluar') }}" class="w-full border border-gray-300 rounded px-3 py-2 @error('jumlah_keluar') border-red-500 @enderror" />
            @error('jumlah_keluar')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="tanggal_keluar" class="block font-medium mb-1">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" id="tanggal_keluar" value="{{ old('tanggal_keluar') ?? date('Y-m-d') }}" class="w-full border border-gray-300 rounded px-3 py-2 @error('tanggal_keluar') border-red-500 @enderror" />
            @error('tanggal_keluar')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-4">
            <button type="submit" class="px-5 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
            <a href="{{ route('pengeluaran.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
