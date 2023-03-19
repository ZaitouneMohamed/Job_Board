@extends('fournisseur.layouts.master')

@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">

        @foreach ($annonce->users as $item)
            <div class="col-4">
                <div class="card h-100">
                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                        alt="Hollywood Sign on The Hill" width="150px" height="150px" />
                    <div class="card-body text-center">
                        <center>
                            <h5 class="card-title">name : {{ $item->name }}</h5><br>
                            <h5 class="card-title">email : {{ $item->email }}</h5><br>
                            <h5 class="card-title">ville : {{ $item->info->ville }}</h5><br>
                            <h5 class="card-title">ville : {{ $item->info->telephone }}</h5><br>
                            <h5 class="card-title">sexe : {{ $item->info->sexe }}</h5><br>
                            <h5 class="card-title">experience : {{ $item->info->experience }}</h5><br>
                            <h5 class="card-title">niveau d'etudes : {{ $item->info->niveau_etudes }}</h5><br>
                        </center>
                        <a target="_blank" href="/worker/cv/{{ $item->info->cv }}" class="btn btn-primary">view cv</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
