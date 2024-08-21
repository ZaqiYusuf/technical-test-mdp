@extends('layout.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Tambah User</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('createuser') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Role</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option selected hidden>Choose Role</option>
                        <option value="admin">admin</option>
                        <option value="staff">staff</option>
                        <option value="user">user</option>
                      </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>

@endsection
