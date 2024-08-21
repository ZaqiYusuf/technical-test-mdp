@extends('layout.dashboard')
@section('content')
<div class="main" id="main">
    <div class="container-fluid">
        <div class="card px-3">
            <div class="card-title">
                <h2 class="text-center">Tambah Komentar</h2>
            </div>
        </div>
        <div class="card py-3">
            <div class="card-body">
                <form action="{{ route('auth-komentar') }}" method="post">
                    @csrf
                    <div class="col">
                        <div class="mb-3">
                            <label for="ulasan" class="form-label">Ulasan</label>
                            <input type="text" class="form-control" id="reviews" name="reviews"
                                placeholder="Ulasan">
                        </div>
                    </div>
                    <div class="col">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Rating
                        </label>
                        <input name="user_id" value="{{ Auth::user()->id }}" hidden>
                        <input name="buku_id" value="{{ $buku->buku_id }}" hidden>
                        <input class="form-control" type="number" name="reting">
                        {{-- <div class="row">
                            <input class="form-check-input" type="radio" name="reting" id="reting" value="1">
                            <input class="form-check-input" type="radio" name="reting" id="reting" value="2">
                            <input class="form-check-input" type="radio" name="reting" id="reting" value="3">
                            <input class="form-check-input" type="radio" name="reting" id="reting" value="4">
                            <input class="form-check-input" type="radio" name="reting" id="reting" value="5">
                        </div> --}}
                    </div>
                    <button type="submit" class="btn btn-primary my-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
