@extends('layout.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">
                Kategori Buku
            </h4>
        </div>
    </div>

    <div class="card">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6">
                    <a href="" class="btn btn-primary">Export Excel</a>
                </div>
                <div class="col-md-6 text-end">
                    <a href="/create-kategori" class="btn btn-info">Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @foreach ($kategori as $item)
                <tbody>
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $item->category_name }}</td>
                      <td>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-secondary" href="/kategori-buku/{{ $item->id_category }}/edit-kategori">Edit</a>
                            <form action="{{ route('deletekategori', $item->id_category) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                @endforeach
              </table>
        </div>
    </div>
@endsection
