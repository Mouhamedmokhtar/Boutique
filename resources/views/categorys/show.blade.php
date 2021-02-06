@extends('layouts.app') 
@section('content')
<center> 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1> Voir Categorie  : </h1>
            </div>
           
        </div>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name :</strong>
                {{ $category->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details :</strong>
                {{ $category->detail }}
            </div>
        </div>
        
    </div>

    <br />

<table class="table table-bordered">
        <tr>
            <th>Nom de produit  </th>
            <th>Detail</th>
        </tr>

    @foreach ($category->products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
        </tr>
    @endforeach
</table>
<br />
<div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categorys') }}"> Retour</a>
    </div>
</center>   
@endsection 