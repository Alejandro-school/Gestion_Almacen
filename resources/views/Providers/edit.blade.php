@extends('layouts.app')

@section('titulo','Gestión Principal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                   Edit
                </div>
                <div class="card-body">

                    <form action="{{url('/Providers/' . $provider->id) }}" method="post" id="success-contact-form-2" enctype="mulitpart/form-data">

                    {{ csrf_field() }}

                    {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="name">{{'Nombre'}}</label>
                            <input  class="form-control" type="text" name="name" value="{{$provider->name}}">
                        </div>


                        <div class="form-group">

                            <label for="nif">{{'Nif'}}</label>
                            <input  class="form-control" type="text" name="nif" value="{{$provider->nif}}">
                        </div>


                        <div class="form-group">
                            <label for="logo">{{'Logo'}}</label>

                        </br>
                            {{$provider->logo}}
                        </br>

                            <input class="form-control" type="file" name="logo" value="">
                        </div>


                        <input type="submit" class="btn bg-orange" value="Editar">

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

</div>
@endsection
