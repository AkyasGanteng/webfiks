@extends('layouts.app')

@section('title', 'Edit Pengeluaran Stok')

@section('content')
<div class="container">
    <h2 class="page-title">Edit Pengeluaran Stok</h2>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengeluaran.update', $pengeluaran) }}" method="POST" class="form-custom">
        @csrf
        @method('PUT')

        <label for="item_id">Pilih Barang</label>
        <select name="item_id" id="item_id" required>
            <option value="" disabled>-- Pilih Barang --</option>
            @foreach($items as $item)
                <option value="{{ $item->id }}" {{ (old('item_id', $pengeluaran->item_id) == $item->id) ? 'selected' : '' }}>
                    {{ $item->nama_barang }}
                </option>
            @endforeach
        </select>

        <label for="jumlah_keluar">Jumlah Keluar</label>
        <input type="number" name="jumlah_keluar" id="jumlah_keluar" min="1" value="{{ old('jumlah_keluar', $pengeluaran->jumlah_keluar) }}" required>

        <label for="tanggal_keluar">Tanggal Keluar</label>
        <input type="date" name="tanggal_keluar" id="tanggal_keluar" value="{{ old('tanggal_keluar', $pengeluaran->tanggal_keluar?->format('Y-m-d')) }}" required>

        <label for="keterangan">Keterangan (opsional)</label>
        <textarea name="keterangan" id="keterangan" rows="3">{{ old('keterangan', $pengeluaran->keterangan) }}</textarea>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('pengeluaran.index') }}" class="btn btn-cancel">Batal</a>
    </form>
</div>

<style>
    /* Sama persis seperti create.blade.php */
    .container {
        max-width: 600px;
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

    .alert-error {
        background-color: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
        padding: 1rem;
        border-radius: 5px;
        margin-bottom: 1.5rem;
    }

    ul {
        margin-left: 1.25rem;
    }

    form.form-custom {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    label {
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    input[type="number"],
    input[type="date"],
    select,
    textarea {
        padding: 0.5rem 0.75rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
        width: 100%;
        box-sizing: border-box;
    }

    input[type="number"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus {
        border-color: #27ae60;
        outline: none;
    }

    textarea {
        resize: vertical;
    }

    .btn {
        display: inline-block;
        padding: 0.6rem 1.2rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
        user-select: none;
        border: none;
        color: #fff;
        text-align: center;
        transition: background-color 0.3s ease;
        text-decoration: none;
        margin-top: 1rem;
        width: fit-content;
    }

    .btn-success {
        background-color: #27ae60;
    }
    .btn-success:hover {
        background-color: #219150;
    }

    .btn-cancel {
        background-color: #95a5a6;
        margin-left: 1rem;
        color: #fff;
        text-decoration: none;
        padding: 0.6rem 1.2rem;
        border-radius: 5px;
    }
    .btn-cancel:hover {
        background-color: #7f8c8d;
    }

    /* Responsive */
    @media (max-width: 480px) {
        .btn-cancel {
            display: block;
            margin-left: 0;
            margin-top: 0.5rem;
        }
    }
</style>
@endsection
