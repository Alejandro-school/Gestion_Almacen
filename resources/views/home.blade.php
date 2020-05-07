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
                    <div class="form-row">
                      <div class="col">
                        <label style="margin-right:10px;" for="usr">Codigo Interno:</label>
                        <input type="text" class="form-control" id="usr">
                        </div>

                        <div class="col">
                        <label style="margin-right:10px;" for="usr">Codigo Producto:</label>
                        <input type="text" class="form-control" id="usr">
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-secondary mt-3">Buscar</button>
                    
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id_producto</th>
                                <th scope="col">Id_interno</th>
                                <th scope="col">Proveedor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>prueba1</td>
                                <td>prueba2</td>
                               
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>prueba3</td>
                                <td>prueba4</td>
                           
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>prueba5</td>
                                <td>prueba6</td>
                            
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>



        </div>


    </div>
</div>


</div>
@endsection