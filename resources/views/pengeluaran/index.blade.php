@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Data Pengeluaran Stok</h1>

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('pengeluaran.create') }}" class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah Pengeluaran</a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4 border-b">No</th>
                    <th class="py-2 px-4 border-b">Tanggal Keluar</th>
                    <th class="py-2 px-4 border-b">Nama Barang</th>
                    <th class="py-2 px-4 border-b">Jumlah Keluar</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengeluarans as $item)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($item->tanggal_keluar)->format('d-m-Y') }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->item->nama_barang }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->jumlah_keluar }}</td>
                    <td class="py-2 px-4 border-b space-x-2">
                        <a href="{{ route('pengeluaran.edit', $item->id) }}" class="text-yellow-600 hover:text-yellow-800">Edit</a>
                        <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data pengeluaran stok.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
