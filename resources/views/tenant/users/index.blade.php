{{-- \resources\views\tenant\users\index.blade.php --}}
@extends('tenant.app')

@section('title', '| Users')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h3><i class="fa fa-users float-left"></i> User Administration</h3> 
        </div>
        <div class="col">
            <a href="{{ route('tenant.roles.index') }}" class="btn btn-outline-primary btn-sm float-right">Roles</a>
            <a href="{{ route('tenant.permissions.index') }}" class="btn btn-outline-primary btn-sm float-right">Permissions</a>
        </div>
    </div>

    <div class="card" style="margin-bottom:10px;">
    <div class="table-responsive">
        <table class="table table-bordered table-striped"  style="margin-bottom: 0px;">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                    <a href="{{ route('tenant.users.edit', $user->id) }}" class="btn btn-info btn-sm float-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['tenant.users.destroy', $user->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    </div>
    <a href="{{ route('tenant.users.create') }}" class="btn btn-success">Add User</a>

</div>
@endsection