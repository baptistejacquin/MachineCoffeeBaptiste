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

@section('search')
        <div class="container">
            <div class="row">
                <a href="{{route('boissonBdd')}}" class="btn btn-info col-lg-1">Sans Tri</a>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" action="{{route('triNom')}}" class="search-form">
                        {{csrf_field()}}
                        <div class="form-group has-feedback">
                            <label for="search" class="sr-only">Search</label>
                            <input type="text" class="form-control" name="searchBoisson" id="search"
                                   placeholder="search Drinks">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('ajout')
    <a href="{{route('formAjoutBoisson')}}" class="btn btn-success">Ajouter Boisson</a>
@endsection

{{-- Liste des boissons --}}
@section('liste')
    <div>
        <div class="content scrollboisson">
            <table class="table-striped col-md-12 table-hover">
                @foreach ($boissons as $key)

                    <tr>
                        <td><h2>{{$key->nom}}</h2> <h5><a href="boisson/{{$key->id}}">Détail</a></h5></td>
                    </tr>

                @endforeach
            </table>
            <br>
        </div>
    </div>
@endsection


