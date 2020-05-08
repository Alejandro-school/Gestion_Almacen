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

                    <form action="{{ url('/Providers') }}" method="post" id="success-contact-form-2" enctype="mulitpart/form-data">

                    {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="name">{{'Nombre'}}</label>
                            <input  class="form-control" type="text" name="name" value="">
                        </div>


                        <div class="form-group">

                            <label for="nif">{{'Nif'}}</label>
                            <input  class="form-control" type="text" name="nif" value="">
                        </div>
                        

                        <div class="form-group">
                            <label for="logo">{{'Logo'}}</label>
                            <input class="form-control" type="file" name="logo" value="">
                        </div>


                        <input type="submit" class="btn bg-orange" value="Agregar">

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

</div>
@endsection
