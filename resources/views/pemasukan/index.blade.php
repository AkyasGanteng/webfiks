@extends('layouts.app')

@section('title', 'Data Pemasukan Stok Gudang Kantin')

@section('content')
<div style="padding: 20px; max-width: 1000px; margin: auto;">

    <h2 style="margin-bottom: 20px; font-weight: 700; color: #2c3e50;">
        Data Pemasukan Stok Gudang Kantin
    </h2>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 12px 20px; border-radius: 6px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pemasukan.create') }}" 
       style="background-color: #27ae60; color: white; padding: 10px 18px; border-radius: 6px; text-decoration: none; font-weight: 600; display: inline-block; margin-bottom: 20px;">
       + Tambah Pemasukan Stok
    </a>

    <table style="width: 100%; border-collapse: collapse; box-shadow: 0 0 8px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background-color: #16a085; color: white; text-align: left;">
                <th style="padding: 12px;">#</th>
                <th style="padding: 12px;">Nama Barang</th>
                <th style="padding: 12px;">Jumlah</th>
                <th style="padding: 12px;">Tanggal Pemasukan</th>
                <th style="padding: 12px;">Keterangan</th>
                <th style="padding: 12px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pemasukan as $data)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px;">
                        {{ $loop->iteration + ($pemasukan->currentPage() - 1) * $pemasukan->perPage() }}
                    </td>
                    <td style="padding: 10px;">{{ $data->item->nama_barang ?? '-' }}</td>
                    <td style="padding: 10px;">{{ $data->jumlah_masuk }}</td>
                    <td style="padding: 10px;">{{ $data->tanggal_masuk?->format('d-m-Y') ?? '-' }}</td>
                    <td style="padding: 10px;">{{ $data->keterangan ?? '-' }}</td>
                    <td style="padding: 10px;">
                        <a href="{{ route('pemasukan.edit', $data) }}" 
                           style="color: #2980b9; font-weight: 600; margin-right: 10px;">Edit</a>
                        <form action="{{ route('pemasukan.destroy', $data) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin hapus data pemasukan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    style="background: none; border: none; color: #c0392b; cursor: pointer; font-weight: 600;">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding: 15px; color: #7f8c8d;">
                        Data pemasukan stok masih kosong.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px; display: flex; justify-content: center;">
        {{ $pemasukan->links() }}
    </div>
</div>
@endsection
