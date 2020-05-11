@extends('layouts.app')

@section('titulo','Gestión Principal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Gestión Proveedores
                </div>
                <div class="card-body">
                
                <a href="{{ url ('/Providers/create') }}" class="btn btn-success" >Añadir Proveedor</a>
                
                </br>
                </br>

                <table class="table table-hover table-light text-center">
                    <thead class="bg-orange">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($providers as $provider) 
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$provider->name}}</td>
                            <td>{{$provider->nif}}</td>
                            <td>{{$provider->logo}}</td>
                            <td>

                            <a href="{{ url ('/Providers/'.$provider->id).'/edit' }}" class="btn btn-warning" >Editar</a>

                                <form method="post" action="{{ url ('/Providers/'.$provider->id) }}" style="display:inline">
                                {{ csrf_field() }}
                                {{method_field ('DELETE') }}

                                <button class="btn btn-danger" type="submit">Borrar</button>
                                
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection