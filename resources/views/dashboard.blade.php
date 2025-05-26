@extends('layouts.app')

@section('title', 'halaman utama')

@section('content')
<h1>Selamat datang, {{ auth()->user()->name }}!</h1>
<p>kerja kerja kerja jangan ada yang kelewat</p>

<div style="display: flex; gap: 20px; margin-top: 20px; flex-wrap: wrap;">
    <div style="background: #1abc9c; color: white; padding: 20px; border-radius: 8px; flex: 1; min-width: 200px;">
        <h2>Stock</h2>
      
    </div>
    <div style="background: #3498db; color: white; padding: 20px; border-radius: 8px; flex: 1; min-width: 200px;">
        <h2>Penjualan</h2>
        
    </div>
    <div style="background: #e67e22; color: white; padding: 20px; border-radius: 8px; flex: 1; min-width: 200px;">
        <h2></h2>
        
    </div>
</div>

<div style="margin-top: 30px;">
    <a href="{{ route('items.index') }}" 
       style="display: inline-block; background-color: #1abc9c; color: white; padding: 12px 25px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background-color 0.3s;">
        Kelola Data Barang &rarr;
    </a>
</div>
@endsection
