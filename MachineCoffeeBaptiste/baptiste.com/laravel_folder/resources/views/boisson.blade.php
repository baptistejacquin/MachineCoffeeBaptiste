@extends('template')



@section("title")
Boissons
@endsection

@section("titrePage")
 Liste des Boissons
@endsection

@section('bouton')
<a href="/boisson" class="btn btn-info">A-Z</a>
<a href="boissonZA" class="btn btn-danger">Z-A</a>
<a href="prixUp" class="btn btn-success">Prix croissant</a>
<a href="prixDown" class="btn btn-warning">Prix décroissant</a>
@endsection

@section('ajout')
    <a href="{{route('formAjoutBoisson')}}" class="btn btn-success">Ajouter Boisson</a>
@endsection

{{-- Liste des boissons --}}
@section('liste')
	    <table class="table-striped col-md-12 table-hover">
        @foreach ($test as $key)

        <tr><td><h2>{{$key->nom}}</h2> <h5><a href="boisson/{{$key->id}}">Détail</a></h5></td></tr>

        @endforeach
    </table><br>
@endsection


