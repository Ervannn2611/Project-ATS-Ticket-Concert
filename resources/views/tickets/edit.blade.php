@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="my-4 text-center">Edit Tiket Konser</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update', $data_konser->id) }}" method="POST" class="shadow p-4 rounded bg-light" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="concert_name" class="form-label">Nama Konser</label>
            <input type="text" class="form-control" id="concert_name" name="nama_konser" value="{{ old('nama_konser', $data_konser->nama_konser) }}" placeholder="Masukkan nama konser" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga (Rp)</label>
            <input type="number" step="0.01" class="form-control" id="price" name="harga" value="{{ old('harga', $data_konser->harga) }}" placeholder="Masukkan harga tiket" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah Tiket</label>
            <input type="number" class="form-control" id="quantity" name="jumlah_tiket" value="{{ old('jumlah_tiket', $data_konser->jumlah_tiket) }}" placeholder="Masukkan jumlah tiket" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Konser</label>
            <input type="date" class="form-control" id="date" name="tanggal" value="{{ old('tanggal', $data_konser->tanggal) }}" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="location" name="lokasi" value="{{ old('lokasi', $data_konser->lokasi) }}" placeholder="Masukkan lokasi konser" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="deskripsi" placeholder="Masukkan deskripsi konser" required>{{ old('deskripsi', $data_konser->deskripsi) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Gambar <i class="bx bx-image-add"></i></label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success btn-lg">Perbarui Tiket</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-lg">Kembali</a>
    </form>
</div>
@endsection
