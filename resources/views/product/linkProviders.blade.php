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
                    <form action="" method="POST" id="form-search">
                      {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col">
                                <label style="margin-right:10px;" for="usr">Codigo Interno:</label>
                                <input type="text" name="internal_number" class="form-control internal_number">
                            </div>

                            <div class="col">
                                <label style="margin-right:10px;" for="usr">Codigo Producto:</label>
                                <div class="input-group">
                                    <input type="text" name="id_prodfab" class="form-control id_prodfab" id="scanner_input" placeholder="Haga clic en el botón para escanear" />
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
                        <button type="submit" class="btn btn-secondary mt-3">Buscar</button>
                        <p id="countProducts" class="text-center font-weight-bold"></p>
                    </form>

                </div>
            </div>

            <form action="" class="mt-4">

            <label for="">Resultado de productos</label>
            <select class="custom-select my-1 mr-sm-2 products" id="inlineFormCustomSelectPref">
            </select>

            <label for="">Elegir proveedor</label>
            <select class="custom-select my-1 mr-sm-2 providers mb-3 inline-block" id="inlineFormCustomSelectPref">
            </select>

         
            </form>

            <button type="submit" class="btn bg-orange mt-3">Vincular Proveedor</button>
        </div>
        

@endsection
