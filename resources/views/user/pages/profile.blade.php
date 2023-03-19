@extends("user.master.master")

@section("content")
<h1>mon compte</h1>
<H2>mes information</H2>
<br>
name : {{auth()->user()->name}} <br>
email : {{auth()->user()->email}} <br>
@if (auth()->user()->info)
ville : {{auth()->user()->info->ville}} <br>
    telephone : {{auth()->user()->info->telephone}} <br>
    sexe : {{auth()->user()->info->sexe}} <br>
    fonction : {{auth()->user()->info->Fonction}} <br>
    experience : {{auth()->user()->info->experience}} <br>

@else
    <a href="{{route('user.profile.edit')}}" class="btn btn-danger">add info</a>
@endif
@endsection
