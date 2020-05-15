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
                
                <a href="{{ url('/createProduct') }}" class="btn btn-success" >Añadir producto</a>
                <a href="{{ url('/linkProvider') }}" class="btn btn-info font-weight-bold" >Vincular Proveedor</a>
                
                </br>
                </br>

                <table class="table table-hover table-light text-center">
                @if (Session::has('success'))
                <p class="alert-success text-center">{{Session::get('success')}}</p>
                @endif
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
                            <td><img src="{{ asset('/images').'/'.$prod->image}}" alt=""></td>
                            <td>

                            <a href="{{ route('modify.product',$prod->id)}}"><img class="" src="{{ asset('images/pencil.svg') }}" alt=""></a>

                                <form method="post" action="{{ action('ProductController@delete') }}" style="display:inline">
                                {{ csrf_field() }}
                               
                                <input type="hidden" name="id_product" value="{{$prod->id}}">
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