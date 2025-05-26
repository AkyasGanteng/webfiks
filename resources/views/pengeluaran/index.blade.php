@extends('layouts.app')

@section('title', 'Data Pengeluaran Stok')

@section('content')
<div class="container">
    <h2 class="page-title">Data Pengeluaran Stok</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pengeluaran.create') }}" class="btn btn-success">+ Tambah Pengeluaran Stok</a>

    <div class="table-wrapper">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal Keluar</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Keluar</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengeluarans as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->tanggal_keluar?->format('d-m-Y') }}</td>
                    <td>{{ $data->item->nama_barang ?? '-' }}</td>
                    <td>{{ $data->jumlah_keluar }}</td>
                    <td>{{ $data->keterangan ?? '-' }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('pengeluaran.edit', $data) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('pengeluaran.destroy', $data) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data pengeluaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Container */
    .container {
        max-width: 960px;
        margin: 2rem auto;
        padding: 0 1rem;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }

    .page-title {
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c3e50;
    }

    /* Button */
    .btn {
        display: inline-block;
        padding: 0.45rem 1rem;
        font-size: 0.9rem;
        font-weight: 600;
        border-radius: 4px;
        text-decoration: none;
        cursor: pointer;
        user-select: none;
        transition: background-color 0.3s ease;
        border: none;
        color: #fff;
    }

    .btn-success {
        background-color: #27ae60;
    }
    .btn-success:hover {
        background-color: #219150;
    }

    /* Table wrapper */
    .table-wrapper {
        overflow-x: auto;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        border-radius: 6px;
        background-color: #fff;
    }

    /* Table */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 600px;
    }

    .custom-table thead tr {
        background-color: #34495e;
        color: #ecf0f1;
        text-align: left;
        font-weight: 700;
    }

    .custom-table th, 
    .custom-table td {
        padding: 0.75rem 1rem;
        border-bottom: 1px solid #ddd;
        vertical-align: middle;
    }

    .custom-table tbody tr:hover {
        background-color: #f0f3f7;
    }

    /* Text center */
    .text-center {
        text-align: center;
        padding: 1.5rem 0;
        color: #888;
        font-style: italic;
    }

    /* Action buttons */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .btn-edit {
        background-color: #2980b9;
        padding: 0.35rem 0.75rem;
        font-size: 0.85rem;
        border-radius: 4px;
        color: #fff;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    .btn-edit:hover {
        background-color: #1c5985;
    }

    .btn-delete {
        background-color: #c0392b;
        padding: 0.35rem 0.75rem;
        font-size: 0.85rem;
        border-radius: 4px;
        border: none;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn-delete:hover {
        background-color: #922b21;
    }

    .inline-form {
        margin: 0;
    }

    /* Responsive table scroll on small screens */
    @media (max-width: 600px) {
        .custom-table {
            min-width: 100%;
        }
        .action-buttons {
            flex-direction: column;
            gap: 0.25rem;
        }
        .btn-edit, .btn-delete {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endsection
