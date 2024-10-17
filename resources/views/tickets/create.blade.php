@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Tambah Tiket Konser</h4>
        </div>
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="concert_name" class="form-label">Nama Konser <i class="fas fa-music"></i></label>
                    <input type="text" class="form-control" id="concert_name" name="nama_konser" placeholder="Masukkan nama konser" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga (Rp) <i class="fas fa-money-bill-wave"></i></label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Masukkan harga tiket" required>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Jumlah Tiket <i class="fas fa-ticket-alt"></i></label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Masukkan jumlah tiket" required>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal Konser <i class="fas fa-calendar-alt"></i></label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Lokasi <i class="fas fa-map-marker-alt"></i></label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Masukkan lokasi konser" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi <i class="fas fa-info-circle"></i></label>
                    <textarea class="form-control" id="description" name="description" placeholder="Masukkan deskripsi konser" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Gambar <i class="bx bx-image-add"></i></label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>


                <button type="submit" class="btn btn-primary btn-sm w-100 mt-3">Simpan Tiket <i class="fas fa-save"></i></button> <!-- Mengubah tombol menjadi lebih kecil -->
                <a href="{{ route('landing') }}" class="btn btn-outline-secondary btn-sm w-100 mt-2">Kembali <i class="fas fa-arrow-left"></i></a> <!-- Mengubah tombol kembali menjadi lebih kecil -->
            </form>
        </div>
    </div>
</div>
@endsection
