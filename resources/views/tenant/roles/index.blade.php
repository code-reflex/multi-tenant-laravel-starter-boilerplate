{{-- \resources\views\tenant\roles\index.blade.php --}}
@extends('tenant.app')

@section('title', '| Roles')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h3><i class="fa fa-users float-left"></i>Roles</h3> 
        </div>
        <div class="col">
            <a href="{{ route('tenant.users.index') }}" class="btn btn-outline-primary btn-sm float-right">Users</a>
            <a href="{{ route('tenant.permissions.index') }}" class="btn btn-outline-primary btn-sm float-right">Permissions</a>
        </div>
    </div>

    <hr>
    <div class="card" style="margin-bottom: 10px; ">
    <div class="table-responsive">
        <table class="table table-bordered table-striped" style="margin-bottom: 0px;">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>

                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>
                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info btn-sm float-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['tenant.roles.destroy', $role->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    </div>

    <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>

</div>

@endsection