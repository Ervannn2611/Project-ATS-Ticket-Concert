@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-info text-white text-center">
            <h5 class="mb-0">Details</h5>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="{{ asset("storage/images/tickets/{$ticket->image}") }}" alt="Concert Image" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-primary">Informasi Konser</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nama Konser:</strong> {{ $ticket->nama_konser }}</li>
                        <li class="list-group-item"><strong>Harga:</strong> Rp {{ number_format($ticket->harga, 0, ',', '.') }}</li>
                        <li class="list-group-item"><strong>Jumlah Tiket:</strong> {{ $ticket->jumlah_tiket }}</li>
                        <li class="list-group-item"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($ticket->tanggal)->format('d M Y') }}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6 class="text-primary">Vanue</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Lokasi:</strong> {{ $ticket->lokasi }}</li>
                        <li class="list-group-item"><strong>Deskripsi:</strong> {{ $ticket->deskripsi }}</li>
                    </ul>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
