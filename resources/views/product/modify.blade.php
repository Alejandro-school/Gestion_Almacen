@extends('layouts.app')

@section('titulo','Modificar Producto')
@section('content')

<h2>Modificar Producto {{$product->name}}</h2>

<div class="row justify-content-center mt-3">
            <div class="col-xl-5">
                <form action="" id="success-contact-form-2">
                    <div class="form-group border-services">
                        <label for="name">Nombre</label>
                      
                        <input type="hidden" class="form-control"  name="id" value="{{$product->id}}">
                        <input type="text" class="form-control"  name="name" value="{{$product->name}}">
                    </div>

                    <div class="form-group">
                        <label for="internal_numer">Numero interno</label>
                      
                        <input type="text" class="form-control"  name="internal_number" value="{{$product->internal_number}}">
                    </div>
                    <div class="form-group">
                    <label for="id_prodfab">Numero interno</label>
                        <input type="text" class="form-control"  name="id_prodfab" value="{{$product->id_prodfab}}">
                    </div>
                    <div class="form-group">
                    <label for="id_prodfab">Imagen Producto</label>
                    <input type="file" class="form-control"  name="id_prodfab" value="{{$product->id_prodfab}}">
                    </div>
                  

                    

                    <button class="btn bg-orange" type="submit">Enviar</button>
                </form>
            </div>

        </div>

@endsection