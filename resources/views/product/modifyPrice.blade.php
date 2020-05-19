@extends('layouts.app')

@section('titulo','Modificar Precio Proveedor')
@section('content')

<h2 class="mb-4">Gestionar Proveedor y Precio de Producto</h2>

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-6">
            <form method="post" action="{{ action('ProductController@updatePriceProviders') }}">
            {{ csrf_field() }}
                <div class="form-group">

                   
                    <input type="hidden" value="{{$id_prod_prov['id_product']}}" name="id_product">
                    <input type="hidden" value="{{$id_prod_prov['id_provider']}}" name="id_prov_actual">

                    <label for="">Producto</label>
                    <input type="text" class="form-control mb-3" value="{{$product->name}}" disabled>
                    <label for="">Proveedor Actual</label>
                    <input type="text" class="form-control" value="{{$provider->name}}" disabled>
                </div>

                <label for="">Elegir Proveedor</label>
                <select class="browser-default custom-select mb-3" name="id_new_provider">
                    @foreach($providers as $prov)
                    <option value="{{$prov->id}}">{{$prov->name}}</option>
                    @endforeach
                </select>

                <div class="form-group">
                    <label for="">Precio</label>
                    <input type="number" class="form-control" name="price">
                </div>
                @if (Session::has('success'))
                                <p class="alert-success text-center">{{Session::get('success')}}</p>
                @endif

                @if (Session::has('failed'))
                                <p class="alert-warning text-center">{{Session::get('failed')}}</p>
                @endif
                <input type="submit" class="btn bg-orange font-weight-bold mb-3" value="Actualizar">
            </form>
        </div>
    </div>
</div>


@endsection