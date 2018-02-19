@extends('template')

@section("title")
    Recette*
@endsection

@section("titrePage")
    Liste des Recettes
@endsection

@section('search')
    <div class="container">
        <div class="row">
            <a href="{{route('listeRecettes')}}" class="btn btn-info col-lg-1">Sans Tri</a>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{route("TriNomRecette")}}" class="search-form">
                    {{csrf_field()}}
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" name="searchRecette" id="search"
                               placeholder="search Drinks">
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
                @foreach ($nomBois as $key)

                    <tr>
                        <td><h2>{{$key->nom}}</h2> <h5><a href="recette/{{$key->id}}">Détail</a></h5></td>
                    </tr>

                @endforeach
            </table>
            <br>
        </div>
    </div>
@endsection

