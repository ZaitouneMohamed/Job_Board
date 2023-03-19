@extends("admin.master.master")

@section("content")

    {{-- <form action="{{route('admin.roles.update',$id)}}" method="post">
        @csrf
        @method('put')
        <input type="text" name="name" class="form-controle" value="{{$role->name}}" id="">
        <input type="submit" value="update" class="btn btn-primary">
    </form> --}}
    {{-- <h1>permissions de role : {{$role->name}} </h1> --}}
    <div>
        <h1 class="text text-center">{{$user->name}}</h1>
        <h1 class="text text-center">{{$user->email}}</h1>
    </div>
    <div>
        @if ($user->roles)
            <h1>Roles List</h1>
            <div class="d-flex">
                @foreach ($user->roles as $role)
                    <div>
                        <form action="{{route('admin.remove_role_from_user',$user->id)}}" method="post">
                            @csrf
                            @method("delete")
                            <input type="hidden" name="role_name" value="{{$role->name}}">
                            <button type="submit" class="btn btn-danger">{{$role->name}}</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
        <form action="{{route('admin.assign_role_to_user',$user->id)}}" method="POST">
            @csrf
            @method('POST')
            <label for="" class="for-controle">Add Role To {{$user->name}}</label>
            <select class="form-select" aria-label="Default select example" name="role_name">
                <option selected>Open this select menu</option>
                @error('message')
                    <span>{{$message}}</span>
                @enderror
                @foreach (Spatie\Permission\Models\role::all() as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
                <input type="submit" value="assign" class="btn btn-primary">
            </select>
        </form>
    </div>
    <div>
        @if ($user->permissions)
            <h1>Permissions List</h1>
            <div class="d-flex">
                @foreach ($user->permissions as $permission)
                    <form action="{{route('admin.remove_permission_from_user',$user->id)}}" method="post">
                        @csrf
                        @method("delete")
                        <input type="hidden" name="permission_name" value="{{$permission->name}}">
                        <button type="submit" class="btn btn-danger">{{$permission->name}}</button>
                    </form>
                @endforeach
            </div>
        @endif
        <form action="{{route('admin.assign_permission_to_user',$user->id)}}" method="POST">
            @csrf
            @method('POST')
            <label for="" class="for-controle">Permissions List</label>
            <select class="form-select" aria-label="Default select example" name="permission_name">
                <option selected>Open this select menu</option>
                @error('message')
                    <span>{{$message}}</span>
                @enderror
                @foreach (Spatie\Permission\Models\permission::all() as $permission)
                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                @endforeach
                <input type="submit" value="assign" class="btn btn-primary">
            </select>
        </form>
    </div>
@endsection
