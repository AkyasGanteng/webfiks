@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto; padding: 40px; font-family: sans-serif;">
    <h2 style="font-size: 24px; margin-bottom: 20px;">➕ Tambah Barang</h2>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf

        @foreach(['nama_barang', 'kategori', 'stok', 'harga_beli', 'harga_jual'] as $field)
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 6px; text-transform: capitalize;">
                    {{ str_replace('_', ' ', $field) }}
                </label>
                <input 
                    type="{{ in_array($field, ['stok','harga_beli','harga_jual']) ? 'number' : 'text' }}" 
                    name="{{ $field }}" 
                    value="{{ old($field) }}" 
                    required 
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;"
                >
            </div>
        @endforeach

        <button 
            type="submit" 
            style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer;">
            Simpan
        </button>
    </form>
</div>
@endsection
