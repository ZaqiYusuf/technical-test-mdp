@extends('layout.dashboard')

@section('content')
<div class="main" id="main">
    <div class="container-fluid">
        <div class="card px-3">
            <div class="card-title">
                <h3 class="text-center">Data Peminjaman Buku</h3>
            </div>
        </div>
        <div class="card px-3">
            <div class="card-title">
                {{-- hanya bisa di akses oleh role admin --}}
                @if (Auth::user()->role == 'admin')
                    <div class="row">
                        <div class="col-12">
                            <a href="/export-peminjam" class="btn btn-success">Export Excel</a>
                        </div>
                    </div>
                @endif
            </div>
            <table class="table px-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Peminjaman</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Dikembalikan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- mengechek apakah role admin atau bukan jika bukan variable $peminjam digunakan --}}
                    @foreach (Auth::user()->role == 'admin' ? $admin : $peminjam as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->buku->title }}</td>
                            <td>{{ $item->lending_date }}</td>
                            <td>{{ $item->return_date }}</td>
                            <td>{{ $item->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
