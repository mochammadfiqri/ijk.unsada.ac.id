@extends('front.layout.app')  
@section('main_content')


<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                
                <img src="{{ asset('uploads/not-found.png') }}" width="600" height="300" />
                <h4>{{NOT_FOUND}}</h4>
            </div>
        </div>
    </div>
</div>
@endsection