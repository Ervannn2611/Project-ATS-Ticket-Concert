@extends('layouts.layout')

@section('content')
<style>
    .description-column {
        max-width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<div class="container mt-5">
    <h4 class="my-2 text-center">Daftar Tiket Konser</h4>

    <a href="{{ route('admin.create') }}" class="btn btn-success mb-4">Tambah Tiket Baru</a>
    <form action="{{ route('admin.dashboard') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari nama konser" value="{{ request()->input('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    @if (session('created'))
        <div class="alert alert-success">
            {{ session::get('created') }}
        </div>
    @endif

    @if (session('deleted'))
        <div class="alert alert-danger">
            {{ session::get('deleted') }}
        </div>
    @endif

    @if (session('updated'))
        <div class="alert alert-success">
            {{ session::get('updated') }}
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Konser</th>
                <th>Harga</th>
                <th>Jumlah Tiket</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_konser as $ticket)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ticket->nama_konser }}</td>
                    <td>Rp {{ number_format($ticket->harga, 0, ',', '.') }}</td>
                    <td>{{ $ticket->jumlah_tiket }}</td>
                    <td>{{ $ticket->tanggal }}</td>
                    <td>{{ $ticket->lokasi }}</td>
                    <td class="description-column">{{ Str::limit($ticket->deskripsi, 100) }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('admin.show', $ticket->id) }}" class="btn btn-info btn-sm me-2">Detail</a>
                        <a href="{{ route('admin.edit', $ticket->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                        <form action="{{ route('admin.destroy',$ticket->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

