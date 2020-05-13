@extends('layouts.app')

@section('titulo','Crear Producto')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    Crear Producto
                </div>
                <div class="card-body">

                    <form action="{{ url('/saveProduct') }}" method="post" id="success-contact-form-2"
                        enctype="multipart/form-data">

                        {{ csrf_field() }}


                        <input class="form-control" type="hidden" name="id_user" value="{{ Auth::user()->id }}">


                        <div class="form-group">
                            <label for="name">{{'Nombre'}}</label>
                            <input class="form-control" type="text" name="name" value="">
                            <p class="alert-warning">{{$errors->first('name')}}</p>
                        </div>


                        <div class="form-group">

                            <label for="nif">{{'Codigo Producto'}}</label>
                            <input class="form-control" type="text" name="id_prodfab" value="">
                            <p class="alert-warning">{{$errors->first('id_prodfab')}}</p>
                        </div>


                        <div class="form-group">
                            <label for="logo">{{'Codigo Interno'}}</label>
                            <input class="form-control" type="text" name="internal_number" value="">
                            <p class="alert-warning">{{$errors->first('internal_number')}}</p>
                        </div>


                        <div class="form-group">
                            <label for="logo">{{'Imagen'}}</label>
                            <input class="form-control" type="file" name="imagen" value="">
                            <p class="alert-warning">{{$errors->first('imagen')}}</p>
                        </div>

                        @foreach($providers as $prov)
                        <div class="form-check">
                            <input class="form-check-input checkProv" type="checkbox" value="{{$prov->id}}">
                            <label class="form-check-label mr-4" for="defaultCheck1">
                                {{$prov->name}}
                            </label>

                            <div class="displayProv">
            
                            </div>
                            
                            <br><br>
                        </div>
                        @endforeach


                        <input type="submit" class="btn bg-orange" value="Crear Producto">

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

</div>



@endsection