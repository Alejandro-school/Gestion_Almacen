<div class="col-md-8">
    <div class="card">
        @if(isset($countProduct) && $countProduct==0)
            <p>No se ha encontrado el producto</p>
        @endif

        @if(isset($products))

        <div class="card-body">
            <table class="table table-hover text-center">
                <thead class="bg-orange">
                    <tr>
                        <th scope="col">Codigo Producto</th>
                        <th scope="col">Nombre Producto</th>
                        <th scope="col">Codigo Interno</th>
                        <th scope="col">Editar</th>
                        

                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        
                        <td>{{$products->id_prodfab}}</td>
                        <td>{{$products->name}}</td>
                        <td>{{$products->internal_number}}</td>
                        <td><a href="{{ route('modify.product',$products->id)}}"><img class="" src="{{ asset('images/pencil.svg') }}" alt=""></a></td>
                        
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
                        <th scope="col">Numero Proveedor</th>
                        <th scope="col">Proveedores</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        
                    </tr>
                </thead >
                <tbody>
                   
                    @for($i=0; $i< sizeof($products->providers);$i++)

                        <tr>
                            
                            <input type="hidden" value="{{$products->id}}">
                            <input type="hidden" value="{{$products->providers[$i]->id}}">
                            <td>{{$products->providers[$i]->nif}}</td>
                            <td>{{$products->providers[$i]->name}}</td>
                            <td>{{$products->providers[$i]['pivot']->price}}€</td>
                            <td><a href="{{ route('modify.priceproviders', array($products->id, $products->providers[$i]->id))}}"><img class="" src="{{ asset('images/pencil.svg') }}" alt=""></a></td>
                            <td><a href="{{ route('delete.priceproviders', array($products->id, $products->providers[$i]->id))}}" class="btn btn-danger"href="">Borrar</a></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
   
    @endif
        
    

</div>