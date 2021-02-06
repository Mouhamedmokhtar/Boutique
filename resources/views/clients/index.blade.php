@extends('layouts.app')
 
@section('content')
<div class="container">

   
                   <h1> <center> Clients </center> </h1>

<center>
 <div class="row">
<div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Créer un nouveau client</a>
            </div>
        </div>
</div>

    </div>
       </div>
</center>
  <br />

 <div class="row">
 
            <div class="col-md-4 offset-md-4">
                <center>
                    <form action="/clients" method="POST">
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
            <th>Num</th>
            <th>Nom et Prénom</th>
            <th>Commande</th>
            <th>Télephone</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($clients as $i => $client)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->commande }}</td>
            <td>{{ $client->phone }}</td>
            <td>
                <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">Voir</a>
    
                    <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Éditer</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection