@extends('layouts.app')

@section('titulo','Gestionar Producto')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Gestión Productos
                </div>
                <div class="card-body">
                @can ('product.create')
                <a href="{{ route('product.create') }}" class="btn btn-success" >Añadir producto</a>
                @endcan
                </br>
                </br>

                <table class="table table-hover table-light text-center">
                    <thead class="bg-orange">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Codigo Producto</th>
                            <th scope="col">Codigo interno</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                       @foreach($products as $prod)
                        <tr>
                            <td>{{$prod->id}}</td>
                            <td>{{$prod->name}}</td>
                            <td>{{$prod->id_prodfab}}</td>
                            <td>{{$prod->internal_number}}</td>
                            <td>{{$prod->image}}</td>
                            <td>
                            @can('product.details')
                            <a href="{{ route('product.details', $prod->id) }}" class="btn btn-warning" >Detalles</a>
                            @endcan
                            <a href="" class="btn btn-warning" >Editar</a>

                                <form method="post" action="" style="display:inline">
                                {{ csrf_field() }}
                               

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

@endsection