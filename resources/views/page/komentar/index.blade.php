@extends('layout.dashboard')
@section('content')
<div class="main" id="main">
    <div class="container-fluid">
        {{-- <div class="card"> --}}
        <div class="row g-0">
            <div class="col-6 col-md-4">
                <div class="card" style="width: 20rem;">
                    <img src="{{ asset('storage/image/' . $buku->cover) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $buku->title }}</h5>
                        <p>{{ $buku->author }}</p>
                        <p>{{ $buku->publisher }}</p>
                        <p>{{ $buku->publication_year }}</p>
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-8 px-4">
                @foreach ($komentar as $item)
                    @if ($buku->buku_id == $item->buku_id)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->user->name }}</h5>
                                <p class="card-text fs-4">{{ $item->reviews }}</p>
                                {{-- <p class="card-text">{{ $item->reting }}</p> --}}
                                <div class="rating">
                                    @for ($i = 0; $i < $item->reting; $i++)
                                        <span class="fa fa-star checked"></span>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
