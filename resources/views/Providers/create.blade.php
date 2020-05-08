@extends('layouts.app')

@section('titulo','Gestión Principal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                   Create
                </div>
                <div class="card-body">

                    <form action="{{ url('/Providers') }}" method="post" enctype="mulitpart/form-data">

                    {{ csrf_field() }}

                        <label for="name">{{'Nombre'}}</label>
                        <input type="text" name="name" value="">
                        </br>
                        <label for="nif">{{'Nif'}}</label>
                        <input type="text" name="nif" value="">
                        </br>
                        <label for="logo">{{'Logo'}}</label>
                        <input type="file" name="logo" value="">

                        </br>

                        <input type="submit" value="Agregar">

                    </form>

                </div>
            </div>
        </div>

        @include('products')

    </div>
</div>

</div>
@endsection
