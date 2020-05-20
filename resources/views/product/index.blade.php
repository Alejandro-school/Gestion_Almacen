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
                @can('product.create')
                <a href="{{ url('/createProduct') }}" class="btn btn-success" >Añadir producto</a>
                @endcan
                <a href="{{ url('/linkProvider') }}" class="btn btn-info font-weight-bold" >Vincular Proveedor</a>
                
                </br>
                </br>

                <form action="{{ action('HomeController@search') }}" class="mt-2 mb-4" method="POST" id="form-search-products">
                      {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col">
                                <label style="margin-right:10px;" for="usr">Codigo Interno:</label>
                                <input type="text" name="internal_number" class="form-control internal_number" id="internal_number">
                            </div>

                            <div class="col">
                                <label style="margin-right:10px;" for="usr">Codigo Producto:</label>
                                <div class="input-group">
                                    <input type="text" name="id_prodfab" class="form-control" id="id_prodfab" placeholder="Haga clic en el botón para escanear" />
                                    <span class="input-group-btn"> 
                                        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#livestream_scanner">
                                        <img class="size-bar" src="{{ asset('images/barcode.svg') }}" alt="">

                                        </button> 
                                    </span>
                                </div><!-- /input-group -->

                                

                                <div class="modal" role="dialog" id="livestream_scanner">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title">Escáner de código de barras</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body" style="position: static">
                                                <div id="interactive" class="viewport"></div>
                                                <div class="error"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                    </form>

                    <div id="countProducts" class="mt-3 mb-4 text-center font-weight-bold"></div>

                <table class="table table-hover table-light text-center parent-table">
                
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

                    <tbody class="printSearch">
                       @foreach($products as $prod)
                        <tr>
                            <td>{{$prod->id}}</td>
                            <td>{{$prod->name}}</td>
                            <td>{{$prod->id_prodfab}}</td>
                            <td>{{$prod->internal_number}}</td>
                            <td><img src="{{ asset('/images').'/'.$prod->image}}" alt=""></td>
                            <td>
                            @can('product.modify')
                            <a href="{{ route('modify.product',$prod->id)}}"><img class="" src="{{ asset('images/pencil.svg') }}" alt=""></a>
                            @endcan
                           
                            @can('product.destroy')
                                <form method="post" action="{{ action('ProductController@delete') }}" style="display:inline">
                                {{ csrf_field() }}
                               
                                <input type="hidden" name="id_product" value="{{$prod->id}}">
                                <button class="btn btn-danger" type="submit">Borrar</button>
                                
                                </form>
                            @endcan

                            </td>
                        </tr>

                        @endforeach
                        
                    </tbody>
                   
                </table>
                {{ $products->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection