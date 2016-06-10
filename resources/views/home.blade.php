@extends('layouts.app')

@section('content')

@if ( count($errors) > 0 )
    <section class="alert alert-danger" role="alert">
        That survey doesn't exist
    </section>
@endif


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
