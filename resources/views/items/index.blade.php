@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')
<div style="padding: 40px; max-width: 1100px; margin: auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <h2 style="margin-bottom: 20px; font-size: 26px; font-weight: 700; color: #2c3e50;">📦 Data Barang</h2>

    @if(session('success'))
        <div style="background: #eafaf1; color: #2e7d32; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-weight: 600;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('items.create') }}" 
       style="display: inline-block; background: #3498db; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; margin-bottom: 20px; transition: background-color 0.3s;">
       + Tambah Barang
    </a>

    <table style="width: 100%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background: #2980b9; color: white; font-weight: 600;">
                <th style="padding: 12px;">#</th>
                <th style="padding: 12px;">Nama</th>
                <th style="padding: 12px;">Kategori</th>
                <th style="padding: 12px;">Stok</th>
                <th style="padding: 12px;">Harga Beli</th>
                <th style="padding: 12px;">Harga Jual</th>
                <th style="padding: 12px;">Masuk</th>
                <th style="padding: 12px;">Kadaluarsa</th>
                <th style="padding: 12px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr style="text-align: center; background: #f9f9f9; border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px;">{{ $loop->iteration + ($items->currentPage() -1)*$items->perPage() }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                    <td>{{ $item->tanggal_masuk?->format('d-m-Y') }}</td>
                    <td>{{ $item->tanggal_kadaluarsa?->format('d-m-Y') }}</td>
                    <td style="display: flex; justify-content: center; gap: 8px;">

                        <!-- Tombol Edit -->
                        <a href="{{ route('items.edit', $item) }}"
                           style="
                                background-color: #3498db; 
                                color: white; 
                                padding: 6px 14px; 
                                border-radius: 6px; 
                                font-weight: 600; 
                                text-decoration: none; 
                                font-size: 0.9rem;
                                transition: background-color 0.3s;
                                display: inline-block;
                                ">
                            Edit
                        </a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="
                                    background-color: #e74c3c; 
                                    color: white; 
                                    border: none; 
                                    padding: 6px 14px; 
                                    border-radius: 6px; 
                                    font-weight: 600; 
                                    cursor: pointer;
                                    font-size: 0.9rem;
                                    transition: background-color 0.3s;
                                "
                                onmouseover="this.style.backgroundColor='#c0392b';"
                                onmouseout="this.style.backgroundColor='#e74c3c';"
                            >Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="9" style="padding: 20px; text-align: center; color: #777;">Tidak ada data tersedia.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 30px;">{{ $items->links() }}</div>
</div>
@endsection
