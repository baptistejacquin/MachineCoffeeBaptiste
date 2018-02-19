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

@section('search')
    <div class="container">
        <div class="row">
            <a href="{{route('listeIng')}}" class="btn btn-info col-lg-1">Sans Tri</a>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{route('triNomIngredient')}}" class="search-form">
                    {{csrf_field()}}
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" name="searchIngredient" id="search" placeholder="search Ingredient">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('liste')
    <div>
        <div class="content scrollboisson">
            <table class="table-striped col-md-12 table-hover">
                @foreach ($ordre as $key)

                    <tr>
                        <td><h2>{{$key->nom}}</h2> <h5><a href="ingredients/{{$key->id}}">Détail</a></h5></td>
                    </tr>

                @endforeach
            </table>
            <br>
        </div>
    </div>
@endsection


@section('form')
    <a href="{{route('FormAjout')}}" class="btn btn-success">Ajouter Ingrédient</a>
@endsection



