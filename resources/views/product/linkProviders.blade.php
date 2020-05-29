@extends('layouts.app')

@section('titulo','Vincular Productos con Proveedores')
@section('content')

<h2 class="mb-3">Vincular Productos y Proveedores</h2>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Buscar
                </div>
                <div class="card-body">
                    <form action="{{ action('ProductController@update') }}" method="POST" id="form-search">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col">
                                <label style="margin-right:10px;" for="usr">Codigo Interno:</label>
                                <input type="text" name="internal_number" class="form-control internal_number">
                            </div>

                            <div class="col">
                                <label style="margin-right:10px;" for="usr">Codigo Producto:</label>
                                <div class="input-group">
                                    <input type="text" name="id_prodfab" class="form-control id_prodfab"
                                        id="scanner_input" placeholder="Haga clic en el botón para escanear" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-toggle="modal"
                                            data-target="#livestream_scanner">
                                            <img class="size-bar" src="{{ asset('images/barcode.svg') }}" alt="">

                                        </button>
                                    </span>
                                </div><!-- /input-group -->
                                <div class="modal" role="dialog" id="livestream_scanner">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Escáner de código de barras</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="position: static">
                                                <div id="interactive" class="viewport"></div>
                                                <div class="error"></div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <p id="countProducts" class="text-center font-weight-bold mt-4"></p>
                    </form>

                </div>
            </div>

            <form method="POST" action="{{ action('LinkProviderController@save') }}" class="mt-4">
                {{ csrf_field() }}
                @if (Session::has('success_prov'))
                <p class="alert-success text-center">{{Session::get('success_prov')}}</p>
                @endif

                @if (Session::has('failed'))
                <p class="alert-warning text-center">{{Session::get('failed')}}</p>
                @endif
                <label for="">Resultado de productos</label>
                <select class="custom-select my-1 mr-sm-2 products" name="id_product">
                </select>

                <label for="">Elegir proveedor</label>
                <select class="custom-select my-1 mr-sm-2 providers mb-3 inline-block" name="id_provider">
                </select>



                <label for="example-number-input">Precio</label>

                <input class="form-control" type="number" name="price">

                <button type="submit" class="btn bg-orange mt-3 font-weight-bold">Vincular Proveedor</button>
            </form>


        </div>


        @endsection