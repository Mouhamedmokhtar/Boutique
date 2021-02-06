@extends('layouts.app')
 
@section('content')
    
 <h1> <center> Produits </center> </h1>

<center>
 <div class="row">
<div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Créer un nouveau produit</a>
            </div>
        </div>
</div>

    </div>
       </div>
</center>
<p>             

</p>
<center>
<div class="row">
    
            <div class="col-md-4 offset-md-4">
                <center>
                    <form action="/products" method="POST">
                    @csrf
                    <input type="text" name="q" id="q" class="form-control">
                    <button type="submit" class="btn btn-primary mt-3"> Rechercher</button>
                </form>
                </center>
                
            </div>
          
</div>
</center>
<p>             

</p>
<div class="col-md-6 offset-md-2">
                    @if( session('status'))
                        <div class="alert alert-info">
                            {{ session('status')}}
                        </div>
                    @endif
                    </div>
    @if ($message = Session::get('success'))
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nom de produit </th>
            <th>Détails</th>
            <th>Prix (Dinar Tunisien)</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($products as $i => $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->prix }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Voir</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Éditer</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    


@endsection