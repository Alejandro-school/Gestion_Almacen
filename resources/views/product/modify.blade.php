@extends('layouts.app')

@section('titulo','Modificar Producto')
@section('content')

<h2>Modificar Producto {{$product->name}}</h2>

<div class="row justify-content-center mt-3">
            <div class="col-xl-5">
                <form method="POST" action="{{ action('ProductController@update') }}" id="success-contact-form-2" enctype="multipart/form-data">
                    <div class="form-group border-services">
                        <label for="name">Nombre</label>
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control"  name="id_product" value="{{$product->id}}">
                        <input type="hidden" class="form-control"  name="id_user" value="{{ Auth::User()->id }}">

                        <input type="text" class="form-control"  name="name" value="{{$product->name}}">
                        <p class="alert-warning">{{$errors->first('name')}}</p>
                    </div>

                    <div class="form-group">
                        <label for="internal_numer">Codigo interno</label>
                      
                        <input type="text" class="form-control"  name="internal_number" value="{{$product->internal_number}}">
                        <p class="alert-warning">{{$errors->first('internal_number')}}</p>
                    </div>
                    <div class="form-group">
                    <label for="id_prodfab">Codigo Producto</label>
                        <input type="text" class="form-control"  name="id_prodfab" value="{{$product->id_prodfab}}">
                        <p class="alert-warning">{{$errors->first('id_prodfab')}}</p>
                    </div>

                    </br>
                            <img class="size-img" src="{{ asset('/images').'/'.$product->image }}" alt="Imagen_producto">
                    </br>

                    <div class="form-group">
                    <label for="imagen">Imagen Producto</label>
                    <input type="file" class="form-control"  name="imagen">
                    <p class="alert-warning">{{$errors->first('imagen')}}</p>
                    </div>
                  

                    

                    <button class="btn bg-orange" type="submit">Enviar</button>
                </form>
            </div>

        </div>

@endsection