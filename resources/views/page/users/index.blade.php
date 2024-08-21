@extends('layout.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Data Pengguna</h4>
        </div>
    </div>

    <div class="card">
        <div class="container">
            <div class="row py-3">
            <div class="col-md-6">
                <a href="{{ route('export-users') }}" class="btn btn-primary">Export Excel</a>
            </div>
            <div class="col-md-6 text-end">
                <a href="/create-user" class="btn btn-info">Tambah</a>
            </div>
        </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach ($users as $item)
                <tbody>
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->role }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            {{-- <form action="{{ route('edit-user', $item->id) }}" method="">
                            </form> --}}
                            <a class="btn btn-secondary" href="/data-user/{{ $item->id }}/edit-user">Edit</a>
                            <form action="{{ route('delete-user', $item->id) }}" method="POST">
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
