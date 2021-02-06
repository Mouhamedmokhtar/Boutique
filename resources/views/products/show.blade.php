@extends('layouts.app')
@section('content')
<center> 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
                <br />
            </div>
            
        </div>
    </div>
   <br />

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix:</strong>
                {{ $product->prix }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categories:</strong>
                {{ $product->category->name }}
            </div>
        </div>

    </div>
    <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products') }}"> Retour </a>
            </div>
    </center>
</center>
@endsection