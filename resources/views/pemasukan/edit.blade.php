@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto; padding: 40px; font-family: sans-serif;">
    <h2 style="font-size: 24px; margin-bottom: 20px;">✏️ Edit Pemasukan Stok</h2>

    @if($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="item_id">Barang</label>
            <select name="item_id" id="item_id" required
                style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
                <option value="">-- Pilih Barang --</option>
                @foreach($items as $item)
                    <option value="{{ $item->id }}" {{ (old('item_id', $pemasukan->item_id) == $item->id) ? 'selected' : '' }}>
                        {{ $item->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="jumlah_masuk">Jumlah Masuk</label>
            <input type="number" id="jumlah_masuk" name="jumlah_masuk" value="{{ old('jumlah_masuk', $pemasukan->jumlah_masuk) }}" min="1" required
                style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk', $pemasukan->tanggal_masuk->format('Y-m-d')) }}" required
                style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="keterangan">Keterangan (optional)</label>
            <textarea id="keterangan" name="keterangan" rows="3"
                style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">{{ old('keterangan', $pemasukan->keterangan) }}</textarea>
        </div>

        <button type="submit" style="background-color: #2196F3; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer;">
            Update
        </button>
    </form>
</div>
@endsection
