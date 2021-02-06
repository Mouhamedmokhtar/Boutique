@extends('layouts.app')
@section('content')
<center> 
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1> Voir le Client</h1>
            </div>
            
        </div>
    </div>  
        <img src="/picto_user.png" width="200" height="200">
<br /> 
<br /> 

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom et Prénom :</strong>
                {{ $client->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Commande :</strong>
                {{ $client->commande }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone :</strong>
                {{ $client->phone }}
            </div>
        </div>
    </div>
    <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients') }}"> Back</a>
            </div>
    </center>
@endsection