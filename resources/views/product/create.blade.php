@extends('layouts.app')

@section('titulo','Crear Producto')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Crear Producto
                </div>
                <div class="card-body">

                    <div class="row justify-content-center mb-4 p-3">

                        <form action="{{ url('/saveProduct') }}" method="post" id="success-contact-form-2"
                            enctype="multipart/form-data" >
                            @if (Session::has('success_prov'))
                                <span class="alert-success text-center">{{Session::get('success_prov')}}</span>
                                @endif
                            {{ csrf_field() }}

                            <div class="form-group row text-center">

                                <div class="col-12 col-md-3">
                                    <input type="hidden" class="form-control" name="id_user"
                                        value="{{ Auth::User()->id }}">
                                    <label for="nombre">Nombre</label>
                                    <!--"form-control" añadir esta clase para que el input abarque el 100% de la columna-->
                                    <input type="text" class="form-control" placeholder="Nombre" name="name">
                                    <p class="alert-warning">{{$errors->first('name')}}</p>
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="nombre">Codigo Interno</label>
                                    <!--"form-control" añadir esta clase para que el input abarque el 100% de la columna-->
                                    <input type="text" class="form-control" placeholder="Ponga aqui su numero interno"
                                        name="internal_number">
                                        <p class="alert-warning">{{$errors->first('internal_number')}}</p>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label for="nombre">Codigo Producto</label>
                                    <!--"form-control" añadir esta clase para que el input abarque el 100% de la columna-->
                                    <input type="text" class="form-control"
                                        placeholder="Ponga aqui el numero del producto" name="id_prodfab">
                                        <p class="alert-warning">{{$errors->first('id_prodfab')}}</p>
                                </div>

                                <div class="col-12 col-md-3">
                                    <label for="imagen">Imagen Producto</label>
                                    <input type="file" class="form-control" name="imagen">
                                    <p class="alert-warning">{{$errors->first('imagen')}}</p>
                                </div>


                            </div>



                            <input type="submit" class="btn bg-primary" value="Crear Producto">
                            @if (Session::has('success'))
                            <span class="alert-success text-center">{{Session::get('success')}}</span>
                            @endif

                        </form>

                    </div>

                    
                    @if(isset($providers))

                    <div class="row border border-1 p-2">
                        <div class="col ">

                            <h2 class="pb-3 pt-3">Añadir Proveedores</h2>

                            <form action="" method="post" id="form-createProvider">

                                {{ csrf_field() }}
                            
                                <div class="form-group row text-center">

                                    <div class="col-12 col-md-4">
                                        <label for="nombre">Nombre Producto</label>
                                        <input type="hidden" value="{{$product->id}}" name="id_product" id="id_product">
                                        <!--"form-control" añadir esta clase para que el input abarque el 100% de la columna-->
                                        <input type="text" class="form-control" placeholder="Nombre Producto"
                                             value="{{$product->name}}" disabled>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="nombre">Nombre Proveedor</label>
                                        <!--"form-control" añadir esta clase para que el input abarque el 100% de la columna-->

                                        <select class="browser-default custom-select" name="id_provider" id="id_provider">
                                            @foreach($providers as $prov)
                                            <option value="{{$prov->id}}">{{$prov->name}}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="nombre">Precio</label>
                                        <!--"form-control" añadir esta clase para que el input abarque el 100% de la columna-->
                                        <input type="number" class="form-control" name="price" id="price">
                                    </div>

                                </div>


                                <input type="submit" class="btn bg-primary font-weight-bold mb-3" value="Vincular Proveedor">
                                
                                <div class="success-create text-center">
                                
                                </div>
                               

                            </form>

                           

                        </div>
                    </div>
                </div>
              
                <h2 class="py-3">Ultimos 10 Productos Creados</h2>

                <table class="table table-hover table-light text-center">

                    <thead class="bg-primary">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Codigo Interno</th>
                            <th scope="col">Codigo Producto</th>
                            <th scope="col">Fecha de Alta</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $prod)
                        <tr>
                            <td>{{$prod->name}}</td>
                            <td>{{$prod->internal_number}}</td>
                            <td>{{$prod->id_prodfab}}</td>
                            <td>{{$prod->created_at}}</td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

</div>

@endif

@endsection