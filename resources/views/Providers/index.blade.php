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

                @can ('Providers.create')
                <a href="{{ route ('Providers.create') }}" class="btn btn-success" >Añadir Proveedor</a>
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

               
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
        <table class="table table-hover table-light text-center">
                    <thead class="bg-orange">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">DNI</th>
                            <th scope="col" class="d-none d-md-block">Logo</th>
                            <th scope="col" COLSPAN="2">Acciones</th>


                            
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($providers as $provider)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$provider->name}}</td>
                            <td>{{$provider->nif}}</td>
                            <td class="d-none d-md-block">
                                <img class="size-img" src="{{ asset('/images').'/'.$provider->logo }}" alt="Logo empresa proveedor">
                            </td>
                            <td>

                            @can ('Providers.edit')
                            <a href="{{ route ('Providers.edit', $provider->id) }}"><img src="{{ asset('images/pencil.svg') }}" alt="editar"></a>
                            @endcan

                            </td>
                            <td>

                            @can ('Providers.destroy')
                                {!! Form::open(['route' => ['Providers.destroy', $provider->id],
                                'method' =>'DELETE']) !!}

                                <button class="btn btn-danger" type="submit">Borrar</button>

                            {!! Form::close() !!}
                            @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $providers->render() }}

        </div>
    </div>
</div>



</div>
@endsection
