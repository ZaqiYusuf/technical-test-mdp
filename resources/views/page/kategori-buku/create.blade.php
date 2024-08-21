@extends('layout.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Tambah Kategori</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('createkategori') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" name="category_name" placeholder="Name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

@endsection
