@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f8;
        color: #333;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        background: white;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h2 {
        font-size: 1.8rem;
        margin-bottom: 25px;
        color: #2c3e50;
        font-weight: 700;
        text-align: center;
    }
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }
    input[type="text"], input[type="number"], input[type="date"], select, textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1.5px solid #ccc;
        border-radius: 8px;
        font-size: 1rem;
        margin-bottom: 20px;
        transition: border-color 0.3s;
        box-sizing: border-box;
    }
    input[type="text"]:focus, input[type="number"]:focus, input[type="date"]:focus, select:focus, textarea:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 5px rgba(52,152,219,0.5);
    }
    button {
        background-color: #3498db;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
        font-size: 1.1rem;
    }
    button:hover {
        background-color: #2980b9;
    }
    .btn-secondary {
        background-color: #7f8c8d;
        margin-top: 10px;
        text-align: center;
        display: inline-block;
        width: auto;
        padding: 10px 20px;
        border-radius: 8px;
        color: white;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s;
    }
    .btn-secondary:hover {
        background-color: #636e72;
    }
    .error-list {
        background-color: #fdecea;
        color: #d93025;
        border: 1px solid #d93025;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        font-weight: 600;
        list-style-type: disc;
        list-style-position: inside;
    }
</style>

<div class="container">
    <h2>Edit Barang</h2>

    @if($errors->any())
    <ul class="error-list">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama_barang">Nama Barang</label>
        <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $item->nama_barang) }}" required>

        <label for="kategori">Kategori</label>
        <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $item->kategori) }}" required>

        <label for="stok">Stok</label>
        <input type="number" id="stok" name="stok" value="{{ old('stok', $item->stok) }}" required min="0">

        <label for="harga_beli">Harga Beli</label>
        <input type="number" id="harga_beli" name="harga_beli" value="{{ old('harga_beli', $item->harga_beli) }}" required min="0">

        <label for="harga_jual">Harga Jual</label>
        <input type="number" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $item->harga_jual) }}" required min="0">

        <label for="tanggal_masuk">Tanggal Masuk</label>
        <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk', $item->tanggal_masuk?->format('Y-m-d')) }}">

        <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
        <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="{{ old('tanggal_kadaluarsa', $item->tanggal_kadaluarsa?->format('Y-m-d')) }}">

        <button type="submit">Update Barang</button>
    </form>

    <a href="{{ route('items.index') }}" class="btn-secondary">Batal</a>
</div>
@endsection
