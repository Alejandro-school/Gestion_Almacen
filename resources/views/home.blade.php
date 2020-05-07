@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Información
                </div>
                <div class="card-body">
                    <div class="form-inline">
                        <label style="margin-right:10px;" for="usr">Numero Interno:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection