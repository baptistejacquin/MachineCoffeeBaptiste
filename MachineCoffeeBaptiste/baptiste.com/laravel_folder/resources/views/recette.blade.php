@extends('template')

@section("title")
    Recette*
@endsection

@section("titrePage")
    Liste des Recettes
@endsection

@section('liste')
    <table class="table-striped col-md-12 table-hover">
        @foreach ($nomBois as $key)

            <tr>
                <td><h2>{{$key->nom}}</h2> <h5><a href="recette/{{$key->id}}">Détail</a></h5></td>
            </tr>

        @endforeach
    </table><br>
@endsection

