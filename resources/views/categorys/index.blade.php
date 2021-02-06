@extends('layouts.app')
        
@section('content')
<div class="container">
                <h1> <center> Catégories </center> </h1>       

<div class="row">
       
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                     </div>
            <div class="pull-right">
              <center>   <a    
 class="btn btn-success" href="{{ route('categorys.create') }}">
Créer de nouvelles catégories </a>  </center>
            </div>
        </div>
    </center>
    </div>
  <br />

 <div class="row">
 
            <div class="col-md-4 offset-md-4">
                <center>
                    <form action="/categorys" method="POST">
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
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($categorys as $i => $categorys)
        <tr>
            <td>{{ $categorys->name }}</td>
            <td>{{ $categorys->detail }}</td>
            <td>
                <form action="{{ route('categorys.destroy',$categorys->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('categorys.show',$categorys->id) }}">Voir</a>
    
                    <a class="btn btn-primary" href="{{ route('categorys.edit',$categorys->id) }}">Éditer</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection