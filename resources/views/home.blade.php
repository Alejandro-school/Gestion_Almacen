@extends('layouts.app')

@section('titulo','Gestión Principal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Buscar
                </div>
                <div class="card-body">
                    @can('product.index')
                    <form action="{{ action('HomeController@search') }}" method="POST">
                      {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col">
                                <label style="margin-right:10px;" for="usr">Codigo Interno:</label>
                                <input type="text" name="internal_number" class="form-control" id="usr">
                            </div>

                            <div class="col">
                                <label style="margin-right:10px;" for="usr">Codigo Producto:</label>
                                <div class="input-group">
                                    <input type="text" name="id_prodfab" class="form-control" id="scanner_input" placeholder="Haga clic en el botón para escanear" />
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
                        <button type="submit" class="btn btn-secondary mt-3 mb-3">Buscar</button>

                        

                        @if (Session::has('success'))
                                <p class="alert-success text-center">{{Session::get('success')}}</p>
                        @endif
                    </form>
                    @endcan
                </div>
            </div>
        </div>

       
       

        @include('product.products')

    </div>
</div>

</div>
@endsection