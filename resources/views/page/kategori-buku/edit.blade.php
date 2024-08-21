@extends('layout.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Edit Kategori</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('update-kategori', $kategori->id_category) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" name="category_name" value="{{ $kategori->category_name }}" placeholder="Name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

@endsection
