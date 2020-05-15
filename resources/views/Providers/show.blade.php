@extends('layouts.app')

@section('titulo','Gestión Principal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Detalles Proveedores
                </div>
                <div class="card-body">
                    <p><strong>Nombre</strong>{{$provider->name}}</p>
                    <p><strong>DNI</strong>{{$provider->nif}}</p>   
                    <p><strong>Logo</strong><img class="size-img" src="{{ asset('/images').'/'.$provider->logo }}" alt="Logo empresa proveedor"></p>   
                    <p><strong>Creado el</strong>{{$provider->created_at}}</p>   

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
