@extends('user.master.master')

@section('content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">change password</a></li>
                    <li class="nav-item"><a class="nav-link" href="#info" data-toggle="tab">information</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <form class="form-horizontal" action="{{ route('update_profile') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ auth()->user()->name }}" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" value="{{ auth()->user()->email }}"
                                        class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.post -->
                    </div>

                    <div class="tab-pane" id="info">
                        <h4>Username : {{ auth()->user()->name }} </h4>
                        <h4>email : {{ auth()->user()->email }} </h4>
                        @if (!auth()->user()->info)
                            <a href="{{ route('user.profile.edit') }}" class="btn btn-warning">set up your profile</a>
                        @else
                            <h4>ville : {{ auth()->user()->info->ville }} </h4>
                            <h4>telephone : {{ auth()->user()->info->telephone }} </h4>
                            <h4>fonction : {{ auth()->user()->info->fonction }} </h4>
                            <h4>experience : {{ auth()->user()->info->experience }} </h4>
                            <h4>niveau d'etudes : {{ auth()->user()->info->niveau_etudes }} </h4>
                        @endif
                    </div>
                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">old password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="old_password" class="form-control" id="inputName"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">new password</label>
                                <div class="col-sm-10">
                                    <input type="email" name="password1" class="form-control" id="inputEmail"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">repeat password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password2" class="form-control" id="inputEmail"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    {{-- <h1>mon compte</h1>
    <div>
        <h4>Username : {{ auth()->user()->name }} </h4>
        <h4>email : {{ auth()->user()->email }} </h4>
        @if (!auth()->user()->info)
            <a href="{{ route('user.profile.edit') }}" class="btn btn-warning">set up your profile</a>
        @else
            <h4>ville : {{ auth()->user()->info->ville }} </h4>
            <h4>telephone : {{ auth()->user()->info->telephone }} </h4>
            <h4>fonction : {{ auth()->user()->info->fonction }} </h4>
            <h4>experience : {{ auth()->user()->info->experience }} </h4>
            <h4>niveau d'etudes : {{ auth()->user()->info->niveau_etudes }} </h4>
        @endif
    </div>
    <H2>mes information</H2>
    <br>
    <form action="{{ route('update_profile') }}" method="post">
        @csrf
        @method('post')
        <input type="text" name="name" value="{{ auth()->user()->name }}" id=""><br>
        <input type="email" name="email" value="{{ auth()->user()->email }}" id=""><br>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
    <h1>update password</h1>
    <form action="{{ route('update_password') }}" method="post">
        @csrf
        @method('post')
        <input type="password" name="old_password" id=""><br>
        <input type="password" name="password1" id=""><br>
        <input type="password" name="password2" id=""><br>
        <button type="submit" class="btn btn-primary">submit</button>
    </form> --}}
@endsection
