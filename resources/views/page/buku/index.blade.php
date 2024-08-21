@extends('layout.dashboard')
@section('content')
@if (Auth::user()->role != 'user')
<div class="main" id="main">
    <div class="container-fluid">
        <div class="card px-3">
            <div class="card-title">
                <h3 class="text-center">Pendataan Buku</h3>
            </div>
        </div>
        <div class="card px-3">
            <div class="card-body">
                <div class="row py-4 mb-2">
                    <div class="col-md-6">
                        <a href="{{ route('export-users') }}" class="btn btn-success">Export Excel</a>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="/create-buku" class="btn btn-primary">Tambah Buku</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><img src="storage/image/{{ $item->cover }}" alt="book" height="100"></td>
                                <td>{{ $item->title }} <br>{{ $item->publisher }}</td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->publication_year }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        <form action="{{ route('edit-buku', $item->buku_id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary mx-1">Edit</button>
                                        </form>
                                        <form action="{{ route('delete-buku', $item->buku_id) }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger mx-1">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endif

@if (Auth::user()->role == 'user')
        <div class="main" id="main">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($buku as $item)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="storage/image/{{ $item->cover }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{{ $item->author }}</p>
                                    <p class="card-text">{{ $item->publisher }}</p>
                                    <p class="card-text">{{ $item->publication_year }}</p>
                                    <form action="{{ route('review', $item->buku_id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-link">Review</button>
                                    </form>
                                    <div class="row g-0 text-center d-flex justify-content-between mb-2">
                                        <div class="col-6 col-md-4">
                                            {{-- @dd(Auth::user()->id) --}}
                                            <form action="{{ route('auth-peminjaman-buku') }}" method="POST">
                                                @csrf
                                                <input hidden name="buku_id" value="{{ $item->buku_id }}">
                                                <input hidden name="user_id" value="{{ Auth::user()->id }}">
                                                <input hidden name="lending_date" value="{{ date('Y-m-d') }}">
                                                <input hidden name="return_date" value="-">
                                                <input hidden name="status" value="lending">
                                                {{-- @dd($item->pinjam) --}}
                                                @if ($item->peminjam->where('status', 'lending')->where('user_id', Auth::user()->id)->count() == 0)
                                                    <button type="submit" class="btn btn-primary">Pinjam</button>
                                                @else
                                                    <button type="submit" class="btn btn-primary" disabled>Pinjam</button>
                                                @endif
                                            </form>
                                        </div>
                                        <div class="col-sm-6 col-md-8">
                                            <form action="{{ route('auth-koleksi-buku') }}" method="post">
                                                @csrf
                                                <input hidden name="buku_id" value="{{ $item->buku_id }}">
                                                <input hidden name="user_id" value="{{ Auth::user()->id }}">
                                                <button type="submit" class="btn btn-success">Tambah
                                                    Koleksi</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row g-0 text-center d-flex justify-content-between">
                                        <div class="col-6 col-md-4">
                                            @foreach ($item->peminjam as $item)
                                                {{-- @dd($item->id) --}}
                                                <form action="{{ route('update-koleksi-buku', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input hidden name="return_date" value="{{ date('Y-m-d') }}">
                                                    <input hidden name="status" value="return">
                                                    {{-- @dd($item) --}}
                                                    @if ($item->status != 'return' && $item->user_id == Auth::user()->id)
                                                        <button type="submit" class="btn btn-secondary">Return</button>
                                                    @else
                                                        <button type="button" class="btn btn-secondary"
                                                            hidden>Return</button>
                                                    @endif
                                                </form>
                                            @endforeach
                                        </div>
                                        <div class="col-sm-6 col-md-8">
                                            <form action="{{ route('komentar', $item->buku_id) }}" method="GET">
                                                {{-- @csrf --}}
                                                {{-- @dd($item->id_user == Auth::user()->id) --}}
                                                @if ($item->status == 'return' || ($item->status == 'dipinjam' && $item->user_id == Auth::user()->id))
                                                    <button type="submit" class="btn btn-primary">Tambah
                                                        Ulasan</button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
