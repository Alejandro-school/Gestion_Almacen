@extends('layouts.app')

@section('titulo','Gestión Principal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Gestión Usuarios
                </div>
                <div class="card-body">

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
                            <th scope="col">Nombre</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Detalles</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                            @can ('Users.edit')
                            <a href="{{ route ('Users.edit', $user->id) }}" class="btn btn-warning" >Editar</a>
                            @endcan
                            </td>
                            <td>
                            @can ('Users.show')
                            <a href="{{ route ('Users.show', $user->id) }}" class="btn btn-info" >Detalles</a>
                            @endcan
                            </td>
                            <td>
                            @can ('Users.destroy')
                                {!! Form::open(['route' => ['Users.destroy', $user->id],
                                'method' =>'DELETE']) !!}

                                <button class="btn btn-danger" type="submit">Borrar</button>

                            {!! Form::close() !!}
                            @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
