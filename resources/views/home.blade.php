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
                    <form action="{{ action('HomeController@search') }}" method="POST">
                      {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col">
                                <label style="margin-right:10px;" for="usr">Codigo Interno:</label>
                                <input type="text" name="internal_number" class="form-control" id="usr">
                            </div>

                            <div class="col">
                                <label style="margin-right:10px;" for="usr">Codigo Producto:</label>
                                <input type="text" class="form-control" name="id_prodfab" id="usr">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-secondary mt-3">Buscar</button>
                    </form>

                </div>
            </div>
        </div>

        @include('products')

    </div>
</div>

</div>
@endsection