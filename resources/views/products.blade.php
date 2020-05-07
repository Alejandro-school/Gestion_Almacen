<div class="col-md-8">
    <div class="card">
        @if(isset($products))
        <div class="card-body">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">Id_producto</th>
                        <th scope="col">Nombre Producto</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$products->id_prodfab}}</td>
                        <td>{{$products->name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="card mt-4">

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Proveedores</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=0; $i< sizeof($products->providers);$i++)

                        <tr>
                            <td>{{$products->providers[$i]->name}}</td>
                            <td>{{$products->providers[$i]['pivot']->price}}</td>

                        </tr>
                        @endfor


                </tbody>
            </table>
        </div>

    </div>
    @endif

</div>