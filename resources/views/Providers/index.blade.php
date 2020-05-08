@extends('layouts.app')

@section('titulo','Gestión Principal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Index
                </div>
                <div class="card-body">
                
                <table class="table table-hover text-center">
                    <thead class="bg-orange">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($providers as $provider) 
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$provider->name}}</td>
                            <td>{{$provider->nif}}</td>
                            <td>{{$provider->logo}}</td>
                            <td>Editar |

                    

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection