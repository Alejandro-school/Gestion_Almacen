@extends('layouts.app')

@section('titulo','Gestión Principal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                   Edit rol
                </div>
                <div class="card-body">

                    {!! Form::open(['route' => 'Roles.store']) !!}

                        @include('Roles.partials.form')
                    
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>
</div>

</div>
@endsection