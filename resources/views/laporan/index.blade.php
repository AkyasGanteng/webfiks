@extends('layouts.app')

@section('title', 'Laporan Stok')

@section('content')
<div class="container">
    <h2>Laporan Stok</h2>

    <form method="GET" action="{{ route('laporan.index') }}" class="filter-form">
        <label>Periode: </label>
        <input type="date" name="start_date" value="{{ $startDate }}" required>
        <input type="date" name="end_date" value="{{ $endDate }}" required>
        <button type="submit">Filter</button>
    </form>

    <h3>Stok Tersedia</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Tanggal Kadaluarsa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr @if($item->stok <= 0) style="background:#f8d7da;" @endif>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->tanggal_kadaluarsa ? $item->tanggal_kadaluarsa->format('d-m-Y') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Barang Masuk Periode {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah Masuk</th>
                <th>Tanggal Masuk</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pemasukans as $p)
            <tr>
                <td>{{ $p->item->nama_barang ?? '-' }}</td>
                <td>{{ $p->jumlah_masuk }}</td>
                <td>{{ $p->tanggal_masuk->format('d-m-Y') }}</td>
                <td>{{ $p->keterangan ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Tidak ada data pemasukan pada periode ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <h3>Barang Keluar Periode {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah Keluar</th>
                <th>Tanggal Keluar</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengeluarans as $p)
            <tr>
                <td>{{ $p->item->nama_barang ?? '-' }}</td>
                <td>{{ $p->jumlah_keluar }}</td>
                <td>{{ $p->tanggal_keluar->format('d-m-Y') }}</td>
                <td>{{ $p->keterangan ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Tidak ada data pengeluaran pada periode ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <h3>Barang Hampir Kadaluarsa (kurang dari 30 hari)</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Tanggal Kadaluarsa</th>
            </tr>
        </thead>
        <tbody>
            @forelse($nearExpireItems as $item)
            <tr style="background:#fff3cd;">
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->tanggal_kadaluarsa->format('d-m-Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Tidak ada barang hampir kadaluarsa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <h3>Barang Habis</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @forelse($outOfStockItems as $item)
            <tr style="background:#f8d7da;">
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->stok }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2">Tidak ada barang habis.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    .container {
        max-width: 900px;
        margin: 2rem auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }
    h2, h3 {
        margin-bottom: 1rem;
        color: #2c3e50;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 2rem;
    }
    table, th, td {
        border: 1px solid #ccc;
    }
    th, td {
        padding: 0.5rem 0.75rem;
        text-align: left;
    }
    .filter-form {
        margin-bottom: 1.5rem;
    }
    .filter-form input[type="date"] {
        padding: 0.3rem 0.5rem;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-right: 0.5rem;
    }
    .filter-form button {
        padding: 0.4rem 0.8rem;
        background: #27ae60;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    .filter-form button:hover {
        background: #219150;
    }
</style>
@endsection
