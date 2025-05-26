@extends('layouts.app')

@section('title', 'Detail Pemasukan Stok')

@section('content')
<div style="padding: 20px; max-width: 700px; margin: auto; background: #f9f9f9; border-radius: 10px; box-shadow: 0 0 8px rgba(0,0,0,0.1);">
    <h2 style="margin-bottom: 20px; font-weight: 700; color: #2c3e50;">
        Detail Pemasukan Stok: {{ $pemasukan->item->nama_barang }}
    </h2>

    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 12px; font-weight: 600; width: 180px; color: #34495e;">Nama Barang</td>
            <td style="padding: 12px;">{{ $pemasukan->item->nama_barang }}</td>
        </tr>
        <tr style="background-color: #ecf0f1;">
            <td style="padding: 12px; font-weight: 600; color: #34495e;">Kategori</td>
            <td style="padding: 12px;">{{ $pemasukan->item->kategori ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding: 12px; font-weight: 600; color: #34495e;">Jumlah Masuk</td>
            <td style="padding: 12px;">{{ $pemasukan->jumlah }}</td>
        </tr>
        <tr style="background-color: #ecf0f1;">
            <td style="padding: 12px; font-weight: 600; color: #34495e;">Tanggal Masuk</td>
            <td style="padding: 12px;">{{ $pemasukan->tanggal_masuk?->format('d-m-Y') ?? '-' }}</td>
        </tr>
        <tr>
            <td style="padding: 12px; font-weight: 600; color: #34495e;">Harga Beli</td>
            <td style="padding: 12px;">Rp {{ number_format($pemasukan->item->harga_beli ?? 0, 0, ',', '.') }}</td>
        </tr>
        <tr style="background-color: #ecf0f1;">
            <td style="padding: 12px; font-weight: 600; color: #34495e;">Total Harga</td>
            <td style="padding: 12px;">Rp {{ number_format(($pemasukan->jumlah * ($pemasukan->item->harga_beli ?? 0)), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td style="padding: 12px; font-weight: 600; color: #34495e;">Keterangan</td>
            <td style="padding: 12px;">{{ $pemasukan->deskripsi ?? '-' }}</td>
        </tr>
    </table>

    <div style="margin-top: 25px;">
        <a href="{{ route('pemasukan.edit', $pemasukan) }}" 
           style="background-color: #2980b9; color: white; padding: 10px 18px; border-radius: 6px; text-decoration: none; font-weight: 600; margin-right: 10px;">
           Edit
        </a>
        <a href="{{ route('pemasukan.index') }}" 
           style="background-color: #7f8c8d; color: white; padding: 10px 18px; border-radius: 6px; text-decoration: none; font-weight: 600;">
           Kembali
        </a>
    </div>
</div>
@endsection
