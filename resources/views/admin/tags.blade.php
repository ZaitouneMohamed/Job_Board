@extends('admin.master.master')

@section('content')
    <h1>tags List</h1>
    <div class="table-responsive" x-show="!open">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>posts count</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->annonces->count() }}</td>
                        <td>
                            @if ($item->annonces->count() === 0)
                                <button class="btn btn-danger">delete</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container">
            {{ $tags->links() }}
        </div>
    </div>
@endsection
