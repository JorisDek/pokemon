@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <button type="button" class="btn btn-success" onclick="location.href='/pokemon'">My Pokemon</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
