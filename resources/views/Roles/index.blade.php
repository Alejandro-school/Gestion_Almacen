@extends('layouts.app')

@section('titulo','Gestión Principal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Gestión Roles
                </div>
                <div class="card-body">
                @can ('Roles.create')
                <a href="{{ route ('Roles.create') }}" class="btn btn-success" >Añadir Rol</a>
                @endcan
                </br>
                </br>

                @if (Session::has('success'))
                    <p class="alert-success text-center">{{Session::get('success')}}</p>
                @endif

                @if (Session::has('edit'))
                    <p class="alert-success text-center">{{Session::get('edit')}}</p>
                @endif

                @if (Session::has('delete'))
                    <p class="alert-success text-center">{{Session::get('delete')}}</p>
                @endif

                <table class="table table-hover table-light text-center">
                    <thead class="bg-orange">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Rol</th>
                            <th scope="col"></th>
                            <th scope="col">Acciones</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$role->name}}</td>
                            <td>
                            @can ('Roles.edit')
                            <a href="{{ route ('Roles.edit', $role->id) }}" class="btn btn-warning" >Editar</a>
                            @endcan
                            </td>
                            <td>
                            @can ('Roles.show')
                            <a href="{{ route ('Roles.show', $role->id) }}" class="btn btn-info" >Detalles</a>
                            @endcan
                            </td>
                            <td>
                            @can ('Roles.destroy')
                                {!! Form::open(['route' => ['Roles.destroy', $role->id],
                                'method' =>'DELETE']) !!}

                                <button class="btn btn-danger" type="submit">Borrar</button>

                            {!! Form::close() !!}
                            @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
