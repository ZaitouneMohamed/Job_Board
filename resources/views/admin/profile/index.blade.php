@extends("admin.master.master")

@section("content")
<h1>update info</h1>
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
@endsection