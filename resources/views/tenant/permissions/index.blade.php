{{-- \resources\views\tenant\permissions\index.blade.php --}}
@extends('tenant.app')

@section('title', '| Permissions')

@section('content')
<div class="container">
    <div class="row">
        <div class="col float-left">
        <h3><i class="fa fa-key"></i>Available Permissions</h3>
        </div>
        <div class="col float-right">
        <a href="{{ route('tenant.users.index') }}" class="btn btn-outline-primary btn-sm float-right">Users</a>
        <a href="{{ route('tenant.roles.index') }}" class="btn btn-outline-primary btn-sm float-right">Roles</a>
        </div>
    </div>
    <hr>
    <div class="card" style="margin-bottom: 10px; ">
    <div class="table-responsive">
        <table class="table table-bordered table-striped" style="margin-bottom: 0px;">

            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info btn-sm float-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['tenant.permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success btn-md">Add Permission</a>

</div>

@endsection