@extends('template')

@section("title")
    Ingredients
@endsection

@section("titrePage")
    Stock des Ingrédients
@endsection

@section('bouton')
    <a href="/ingredients" class="btn btn-info">A-Z</a>
    <a href="/ingredientsZA" class="btn btn-danger">Z-A</a>
    <a href="/IngPrixUp" class="btn btn-success">Stock croissant</a>
    <a href="/IngPrixDown" class="btn btn-warning">Stock décroissant</a>
@endsection

@section('liste')
    <table class="table-striped col-md-12 table-hover">
        @foreach ($ordre as $key)

            <tr>
                <td><h2>{{$key->nom}}</h2> <h5><a href="ingredients/{{$key->id}}">Détail</a></h5></td>
            </tr>

        @endforeach
    </table><br>
@endsection


@section('form')
    <a href="{{route('FormAjout')}}" class="btn btn-success">Ajouter Ingrédient</a>
@endsection



