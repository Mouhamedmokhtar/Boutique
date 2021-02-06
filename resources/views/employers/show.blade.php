@extends('layouts.app')
@section('content')
<center>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1> Show Employers</h1>
            </div>
            
        </div>
    </div>
   

  

     <img src="/picto_user.png" width="200" height="200">
  <p> 

  </p>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group" >
                <strong>Name:</strong>
                {{ $employers->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Embauchement:</strong>
                {{ $employers->embauchement }}
            </div>
        </div>
 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Commentaire:</strong>
                {{ $employers->commentaire }}
            </div>
        </div>

    </div>

    <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employers') }}"> Back</a>
            </div>
        </center>
@endsection