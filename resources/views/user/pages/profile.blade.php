@extends('user.master.master')

@section('content')
    <h1>mon compte</h1>
    <H2>mes information</H2>
    <br>
    <form action="{{route('update_profile')}}" method="post">
        @csrf
        @method("post")
        <input type="text" name="name" value="{{auth()->user()->name}}" id="" ><br>
        <input type="email" name="email" value="{{auth()->user()->email}}" id=""><br>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
    <h1>update password</h1>
    <form action="{{route('update_password')}}" method="post">
        @csrf
        @method("post")
        <input type="password" name="old_password" id=""><br>
        <input type="password" name="password1" id=""><br>
        <input type="password" name="password2" id=""><br>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
    @if (auth()->user()->info)
        ville : {{ auth()->user()->info->ville }} <br>
        telephone : {{ auth()->user()->info->telephone }} <br>
        sexe : {{ auth()->user()->info->sexe }} <br>
        fonction : {{ auth()->user()->info->Fonction }} <br>
        experience : {{ auth()->user()->info->experience }} <br>
    @else
        <a href="{{ route('user.profile.edit') }}" class="btn btn-danger">add info</a>
    @endif
@endsection
