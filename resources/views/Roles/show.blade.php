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
                    <p><strong>Nombre: </strong> {{$role->name}}</p>
                    <p><strong>Slug: </strong> {{$role->slug}}</p>
                    <p><strong>Descripción </strong> {{$role->description}}</p>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
