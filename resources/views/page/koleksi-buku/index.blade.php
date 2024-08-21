@extends('layout.dashboard')
@section('content')
<div class="main" id="main">
    <div class="container-fluid">
        <div class="row">
            @foreach ($koleksi as $item)
                <div class="col-mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="storage/image/{{ $item->buku->cover }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{ $item->buku->author }}</p>
                            <p class="card-text">{{ $item->buku->publisher }}</p>
                            <p class="card-text">{{ $item->buku->publication_year }}</p>
                            <p class="card-text">{{ $item->buku->status }}</p>
                            <form action="{{ route('delete-koleksi-buku', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-secondary">Return</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
