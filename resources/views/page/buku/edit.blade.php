@extends('layout.dashboard')
@section('content')
<div class="main" id="main">
    <div class="container-fluid">
        <div class="card px-3">
            <div class="card-title">
                <h3>Edit Data Buku</h3>
            </div>
        </div>
        <div class="card px-3">
            <div class="card-title">
                <form action="{{ route('update-buku', $buku->buku_id) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="file" class="form-control" id="cover" placeholder="Cover" name="cover"
                            value="{{ $buku->cover }}">
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" placeholder="Judul" name="title"
                            value="{{ $buku->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" placeholder="Penulis" name="author"
                            value="{{ $buku->author }}">
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" placeholder="Penerbit" name="publisher"
                            value="{{ $buku->publisher }}">
                    </div>
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="text" class="form-control" id="tahun_terbit" placeholder="Tahun Terbit"
                            name="publication_year" value="{{ $buku->publication_year }}">
                    </div>
                    <select class="form-select mb-3" aria-label="Default select example" name="category_buku">
                        <option selected hidden value="{{ $buku->category_buku }}">{{ $buku->category_buku }}</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
