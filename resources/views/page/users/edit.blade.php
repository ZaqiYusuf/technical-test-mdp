@extends('layout.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Edit User</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('update-user', $user->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $user->username }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $user->address }}">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->email }}" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Role</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option selected hidden>{{ $user->role }}</option>
                        <option value="admin">admin</option>
                        <option value="staff">staff</option>
                        <option value="user">user</option>
                      </select>
                </div>
                {{-- <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
