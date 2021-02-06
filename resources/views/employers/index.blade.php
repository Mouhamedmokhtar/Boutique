@extends('layouts.app')
        
@section('content')
    <div class="container">

    <h1> <center> Employer </center> </h1>

<center>

  <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employers.create') }}"> Créer un nouveau employer </a>
            </div>
        </div>
    </div>
</center>
  <br />
<div class="row">
 
            <div class="col-md-4 offset-md-4">
                <center>
                    <form action="/employers" method="POST">
                    @csrf
                    <input type="text" name="q" id="q" class="form-control">
                    <button type="submit" class="btn btn-primary mt-3"> Rechercher</button>
                </form>
                </center>
                
            </div>
          
</div>
  <br />
@if( session('status'))
                        <div class="alert alert-info">
                            {{ session('status')}}
                        </div>
                    @endif
    @if ($message = Session::get('success'))
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Nom et Prénom </th>
            <th>Date d'embauchement</th>
            <th>Commentaire</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($employers as $employers)
        <tr>
            <td>{{ $employers->name }}</td>
            <td>{{ $employers->embauchement }}</td>
            <td>{{ $employers->commentaire }}</td>

            <td>
                <form action="{{ route('employers.destroy',$employers->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('employers.show',$employers->id) }}">Voir</a>
    
                    <a class="btn btn-primary" href="{{ route('employers.edit',$employers->id) }}">Éditer</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  

      
@endsection